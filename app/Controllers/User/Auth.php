<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{

    public function login()
    {
        return view('user/login');
    }


    public function loginCheck()
    {

        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');


        $model = new UserModel();


        $user = $model
            ->where('email',$email)
            ->first();


        if($user && password_verify($password,$user['password']))
        {

            session()->set([

                'user_id' => $user['id'],

                'mla_id' => $user['mla_id'],

                'email' => $user['email'],

                'isUserLoggedIn' => true

            ]);


            return redirect()->to(
                base_url('user/dashboard')
            );

        }


        return redirect()
            ->back()
            ->with(
                'error',
                'Invalid Email or Password'
            );

    }

}