<?php

namespace App\Controllers;

use App\Models\Pelanggan_M;
use App\Models\Kategori_M;

class Login extends BaseController
{
	public function index()
	{
		$model_kategori = new Kategori_M();
		$data = ['kategori' => $model_kategori->findAll()];

		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$model = new Pelanggan_M();
			$pelanggan = $model->where(['email' => $email, 'aktif' => 1])->first();

			if (empty($pelanggan)) {
				$data['info'] = "EMAIL SALAH";
			} else {
				if (password_verify($password, $pelanggan['password'])) {
					$this->setSession($pelanggan);
					return redirect()->to(base_url());
				} else {
					$data['info'] = "PASSWORD SALAH";
				}
			}
		} else {
		}

		return view('home/login', $data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'pelanggan' => $pelanggan['pelanggan'],
			'email' => $pelanggan['email'],
			'idpelanggan' => $pelanggan['idpelanggan'],
			'login' => true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}

	//--------------------------------------------------------------------

}
