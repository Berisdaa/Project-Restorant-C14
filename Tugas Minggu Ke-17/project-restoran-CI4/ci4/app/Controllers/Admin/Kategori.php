<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;


class Kategori extends BaseController
{
	public function index()
	{
		//return view('welcome_message');

		echo '<h2>Belajar Code Igniter 4</h2>';
	}

	public function select()
	{
		$model = new Kategori_M();
		$kategori = $model -> findALL();

		$data = [
			'judul' => 'SELECT DATA DARI CONTROLLER',
			'kategori' => $kategori
		];

		
		echo view ("kategori/select",$data);
		
	}

	public function selectWhere($id = null)
	{
		echo "<h1>Menampilkan Data Yang Dipilih $id</h1>";
	}

	public function formInsert()
	{
		return view ("kategori/form-insert");	
	}

	public function formUpdate($id=null)
	{
		echo view ("template/header");
		echo view ("kategori/update");
		echo view ("template/footer");
	}

	public function update($id = null)
	{
		echo "Proses Update Data $id";
	}

	public function delete($id = null)
	{
		echo "Proses Delete Data";
	}

	//--------------------------------------------------------------------

}
