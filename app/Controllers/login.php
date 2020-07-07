<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class login extends BaseController{
    
    public function index()
    {
        return view('user_form');
    }

    public function login_action()
    {
        $userm = new UserModel();
        
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $cek = $userm->getData($email, $password);

        if(($cek['email']==$email)&&($cek['pass']==$password))
        {
            session()->set('email',$cek['email']);
            session()->set('nama',$cek['nama']);
            session()->set('id',$cek['id']);
            return redirect()-> to(base_url('user'));
        }else{
            session()->setFlashdata('gagal', 'Username/password salah');
            return redirect()->to(base_url('login'));
        }
    }
    public function logout()
    {
        session()-> destroy();
        return redirect()->to(base_url('login'));
    }
}