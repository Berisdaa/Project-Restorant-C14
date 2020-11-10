<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class user extends BaseController
{

    protected $session=null;

    public function __construct()
    {
        $this->session = \config\Services::session();
    }

	public function index()
	{
		echo 'user';
    }
    
    public function create()
    {
        
        $tbluser = [
            'user' => 'Chef',
            'email' => 'chef@gmail.com',
            'level' => 'chef'
        ];

        $this->session->set($tbluser);
    }

    public function read()
    {
        echo $this->session->get('user');
        echo '<br>';
        echo $this->session->get('email');
        echo '<br>';
        echo $this->session->get('level');
    }

    public function delete()
    {
        $this->session->remove('email');
    }

    public function destroy()
    {
        $this->session->destroy('email');
    }

	

	

	//--------------------------------------------------------------------

}
