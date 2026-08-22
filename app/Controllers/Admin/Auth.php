<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{

    public function login()
    {
        return view('admin/login');
    }


    public function loginCheck()
    {

        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');


        $adminModel = new AdminModel();


        $admin = $adminModel
            ->where('email', $email)
            ->first();



        if($admin && password_verify($password, $admin['password']))
        {


            session()->set([

                'admin_id'    => $admin['id'],

                'admin_email' => $admin['email'],

                'isLoggedIn'  => true

            ]);



            return redirect()->to(
                base_url('admin/dashboard')
            );


        }



        return redirect()
            ->back()
            ->with(
                'error',
                'Invalid Email or Password'
            );


    }
     public function logout()
{
    session()->destroy();

    return redirect()->to(base_url('admin/login'));
}

}