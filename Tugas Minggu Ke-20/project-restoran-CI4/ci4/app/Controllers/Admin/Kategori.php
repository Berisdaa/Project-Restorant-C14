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

	public function read()
	{
		$pager = \config\Services::pager();
		$model = new Kategori_M();
		//$kategori = $model -> findALL();

		$data = [
			'judul' => 'DATA KATEGORI',
			//'kategori' => $kategori,
			'kategori' => $model->paginate(3,'page'),
			'pager' => $model->pager

		];

		
		return view ("kategori/select",$data);
		
	}

	public function create()
	{
		return view ("kategori/insert");	
	}

	public function insert()
	{

		$model = new Kategori_M();
		
		if ($model -> insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info',$error['kategori']);
			return redirect()->to(base_url("/Admin/Kategori/create"));
		} else {
			return redirect()->to(base_url("/Admin/Kategori"));
		}
		
	}

	public function find($id=null)
	{
		$model = new Kategori_M();
		$kategori = $model -> find($id);

		$data = [
			'judul' => 'UPDATE DATA',
			'kategori' => $kategori
		];

		//print_r($kategori);

		return view ("kategori/update",$data);
	}

	public function update()
	{
		
		$model = new Kategori_M();
		$id = $_POST['idkategori'];

		if($model -> save($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info',$error['kategori']);
			return redirect()->to(base_url("/Admin/Kategori/find/$id"));
		} else {
			return redirect()->to(base_url("/Admin/Kategori"));
		}
		
	}

	public function delete($id = null)
	{

		$model = new Kategori_M();
		$model -> delete($id);

		return redirect()->to(base_url("/Admin/Kategori"));
	}

	//--------------------------------------------------------------------

}
