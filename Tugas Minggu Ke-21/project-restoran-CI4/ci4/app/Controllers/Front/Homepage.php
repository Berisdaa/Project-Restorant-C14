<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\Pelanggan_M;
use App\Models\OrderDetail_M;

class Homepage extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model_kategori = new Kategori_M();
		$model_menu = new Menu_M();

		$data = [
			'judul' => 'Menu',
			'kategori' => $model_kategori->findAll(),
			'menu' => $model_menu->paginate(3, 'page'),
			'pager' => $model_menu->pager
		];

		return view('Home/produk', $data);
	}

	public function read($id = null)
	{
		$pager = \Config\Services::pager();

		if (isset($id)) {
			$model_menu = new Menu_M();
			$model_kategori = new Kategori_M();
			$jumlah = $model_menu->where('idkategori', $id)->findAll();
			$count = count($jumlah);

			$tampil = 3;
			$mulai = 0;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			$menu = $model_menu->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'judul' => 'Menu Kategori ',
				'menu' => $menu,
				'kategori' => $model_kategori->findALL(),
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count,
				'id' => $id
			];

			return view("Home/cari", $data);
		}
	}

	public function histori()
	{
		$model_kategori = new Kategori_M();
		$db = \Config\Database::connect();

		$dataa = $db->table('vorder');
		$email = session()->get('email');
		$hasil = $dataa->getWhere(['email' => $email]);

		$pager = \Config\Services::pager();
		$halaman = $hasil->getResult('array');
		$count = count($halaman);
		$mulai = 0;
		$banyak = 5;


		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($banyak * $page) - $banyak;
		}

		$hasil = $dataa->getWhere(['email' => $email], $banyak, $mulai);
		$vorder = $hasil->getResult('array');

		$data = [
			'judul' => 'Histori Pembelian',
			'kategori' => $model_kategori->findAll(),
			'vorder' => $vorder,
			'pager' => $pager,
			'mulai' => $mulai,
			'banyak' => $banyak,
			'total' => $count
		];

		return view('home/histori', $data);
	}

	public function detail($id)
	{
		$pager = \Config\Services::pager();
		$model_kategori = new Kategori_M();
		$model_orderdetail = new OrderDetail_M();

		$jumlah = $model_orderdetail->where('idorder', $id)->findAll();

		$count = count($jumlah);
		$mulai = 0;
		$banyak = 5;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($banyak * $page) - $banyak;
		}

		$detail = $model_orderdetail->where('idorder', $id)->findAll($banyak, $mulai);

		$data = [
			'judul' => 'Detail Pembelian',
			'detail' => $detail,
			'kategori' => $model_kategori->findAll(),
			'pager' => $pager,
			'banyak' => $banyak,
			'total' => $count,
			'mulai' => $mulai
		];

		return view('home/detail', $data);
	}

	public function create()
	{
		$model_kategori = new Kategori_M();
		$data = [
			'judul' => '<center>Registrasi Pelanggan</center> ',
			'kategori' => $model_kategori->findAll(),
		];
		return view("home/daftar", $data);
	}

	public function daftar()
	{

		$request = \Config\Services::request();
		$data = [
			'pelanggan' => $request->getPost('pelanggan'),
			'alamat' => $request->getPost('alamat'),
			'telp' => $request->getPost('telp'),
			'email' => $request->getPost('email'),
			'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
			'aktif' => 1
		];

		$model_pelanggan = new Pelanggan_M();

		if ($request->getPost('password')) {

			if ($model_pelanggan->insert($data) === false) {
				$error = $model_pelanggan->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(base_url("/front/homepage/create"));
			} else {
				return redirect()->to(base_url("/login"));
			}
		}
	}




	//--------------------------------------------------------------------
}
