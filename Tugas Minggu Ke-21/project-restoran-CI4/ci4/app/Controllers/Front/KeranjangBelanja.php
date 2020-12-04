<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail2_M;


class KeranjangBelanja extends BaseController
{

    public function index($id = null)
    {
        $model_kategori = new Kategori_M();
        $model_menu = new Menu_M();
        $total = 0;

        if (isset($id)) {
            $this->isi($id);
            return redirect()->to(base_url('/front/KeranjangBelanja'));
        } else {
            foreach (session()->get() as $key => $value) {
                if (
                    $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                    && $key <> 'email' && $key <> 'idpelanggan'
                ) {
                    $id = substr($key, 1);
                    $menu[] = $model_menu->where('idmenu', $id)->findAll();
                    $jumlah[] = $value;
                }
            }
        }

        if (!isset($menu)) {
            $menu = [];
            $jumlah = [];
        }

        $data = [
            'judul' => 'Keranjang Belanja',
            'kategori' => $model_kategori->findAll(),
            'menu' => $menu,
            'jumlah' => $jumlah,
            'total' => $total,
        ];

        return view('Home/beli', $data);
    }


    public function isi($id)
    {
        if (session()->has('_' . $id)) {
            session()->set('_' . $id, session()->get('_' . $id) + 1);
        } else {
            session()->set('_' . $id, 1);
        }
    }

    public function delete($id = null)
    {
        $hapus = '_' . $id;
        session()->remove($hapus);
        return redirect()->to(base_url('/front/KeranjangBelanja'));
    }

    public function tambah($id = null)
    {
        session()->set('_' . $id, session()->get('_' . $id) + 1);
        return redirect()->to(base_url('/front/KeranjangBelanja'));
    }

    public function kurang($id = null)
    {
        $kur = '_' . $id;
        session()->set($kur, session()->get($kur) - 1);
        if (session()->get($kur) == 0) {
            session()->remove($kur);
        }
        return redirect()->to(base_url('/front/KeranjangBelanja'));
    }

    public function checkout($total = null)
    {

        $db = \Config\Database::connect();
        if (isset($total)) {
            $idorder = $this->idOrder();
            $idpelanggan = session()->get('idpelanggan');
            $tgl = date('Y-m-d');
            $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";
            $hasil = $db->query($sql);
            $detail = $hasil->getResult('array');
            $count = count($detail);

            if ($count == 0) {
                $this->insertOrder($idorder, $idpelanggan, $tgl, $total);
                $this->insertOrderDetail($idorder);
            } else {
                $this->insertOrderDetail($idorder);
            }


            $this->kosongkanSession();

            return redirect()->to(base_url('/front/KeranjangBelanja/checkout/'));
        } else {

            $id = $this->idOrder() - 1;
            $model_kategori = new Kategori_M();


            $data = [
                'judul' => 'Terima Kasih Telah Berbelanja Di Tempat Kami',
                'kategori' => $model_kategori->findAll(),
                'id' => $id
            ];

            return view('home/info', $data);
        }
    }


    public function idOrder()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $hasil = $db->query($sql);
        $detail = $hasil->getResult('array');
        $count = count($detail);

        if ($count == 0) {
            $id = 1;
        } else {
            $id = $count + 1;
        }

        return $id;
    }

    public function insertOrder($idorder, $idpelanggan, $tgl, $total)
    {
        $db = \Config\Database::connect();
        $sql = "INSERT INTO tblorder VALUES ($idorder,$idpelanggan,'$tgl',$total,0,0,0)";
        $db->query($sql);
    }

    public function insertOrderDetail($idorder = 1)
    {
        $model_menu = new Menu_M();
        $model_order = new OrderDetail2_M();

        foreach (session()->get() as $key => $value) {
            if (
                $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                && $key <> 'email' && $key <> 'idpelanggan' && $key <> 'login'
            ) {
                $id = substr($key, 1);
                $produk = $model_menu->where('idmenu', $id)->findAll();
                foreach ($produk as $key) {
                    $idmenu = $key['idmenu'];
                    $harga = $key['harga'];
                    $data = [
                        'idorder' => $idorder,
                        'idmenu' => $idmenu,
                        'jumlah' => $value,
                        'hargajual' => $harga

                    ];
                    $model_order->insert($data);
                }
            }
        }
    }

    public function kosongkanSession()
    {

        foreach (session()->get() as $key => $value) {

            if (
                $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                && $key <> 'email' && $key <> 'idpelanggan'  && $key <> 'password' && $key <> 'login'
            ) {
                session()->remove($key);
            };
        }
    }
}

   
    //--------------------------------------------------------------------
