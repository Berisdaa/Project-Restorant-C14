<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class Login extends BaseController
{
	public function index()
	{
        $data=[];

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $model = new User_M();
            $user = $model->where(['email'=>$email,'aktif'=>1])->first();

            if (empty($user)) {
                $data['info'] = "EMAIL SALAH";
            } else {
                if (password_verify($password,$user['password'])) {
                    $this->setSession($user);
                    return redirect()->to(base_url("/Admin"));
                } else {
                    $data['info'] = "PASSWORD SALAH";
                }
                
            }
            
            // 'password'=>$password,
        
            // if (empty($user)) {
            //     $data['info'] = "EMAIL ATAU PASSWORD SALAH";
            // } else {
            //     $this->setSession($user);
            //     return redirect()->to(base_url("/Admin"));
            // }
            
        } else {
            # code...
        }
        
		return view('template/login',$data);
    }
    
    public function setSession($user)
    {
        $data = [
            'user' => $user['user'],
            'email' => $user['email'],
            'level' => $user['level'],
            'loggedin' => true
        ];

        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url("/dashboard"));

    }

	//--------------------------------------------------------------------

}
