<?php namespace App\Controllers;

class Menu extends BaseController
{
	public function index()
	{
		//return view('welcome_message');

		echo "Ini Menu";
	}

	public function select(){
		echo "<h1>Untuk Menampilkan Data</h1>";
	}

	public function update($id=null,$nama=null){
		echo "<h1>Untuk Update Data Dengan Id : $id  $nama</h1>";
	}

	//--------------------------------------------------------------------

}
