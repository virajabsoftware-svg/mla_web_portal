<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;

class Auth extends BaseController
{

    public function index()
    {
        return view('user/login');
    }


    public function register()
    {
        $model = new UserModel();


        // =========================
        // Profile Photo Upload
        // =========================

        $photoName = '';

        $photo = $this->request->getFile('profile_photo');
        


        if($photo && $photo->isValid() && !$photo->hasMoved())
        {

            $allowed = ['jpg','jpeg','png','webp'];

            if(in_array($photo->getExtension(), $allowed))
            {

                $photoName = $photo->getRandomName();


                $photo->move(
                    FCPATH.'uploads/profile/',
                    $photoName
                );

            }
            else
            {

                return redirect()
                ->back()
                ->with('error','Only JPG, PNG and WEBP images allowed');

            }

        }



        // =========================
        // Insert User Data
        // =========================


        $data = [

            'voter_id'      => 'VOT'.time(),

            'full_name'     => $this->request->getPost('full_name'),

            'dob'           => $this->request->getPost('dob'),

            'gender'        => $this->request->getPost('gender'),

            'email'         => $this->request->getPost('email'),

            'password'      => password_hash(
                                $this->request->getPost('password'),
                                PASSWORD_DEFAULT
                              ),


            'state'         => $this->request->getPost('state'),

            'district'      => $this->request->getPost('district'),

            'constituency'  => $this->request->getPost('constituency'),

            'locality'      => $this->request->getPost('locality'),

            'pincode'       => $this->request->getPost('pincode'),


            // Photo name save in database
            'profile_photo' => $photoName,


            'mla_name'      => $this->request->getPost('mla_name'),

            'mla_party'     => $this->request->getPost('mla_party'),

            'mla_id'        => $this->request->getPost('mla_id'),


            'status'        => 'pending'

        ];



        if($model->insert($data))
        {

            return redirect()
            ->back()
            ->with('success','Registration Successful');

        }
        else
        {

            return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                implode("<br>",$model->errors())
            );

        }


    }



    // =========================
    // Login
    // =========================

    public function login()
    {

        $model = new UserModel();


        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');



        $user = $model
                ->where('email',$email)
                ->first();



        if($user)
        {

            if(password_verify($password,$user['password']))
            {


                session()->set([

                    'user_id'=>$user['id'],

                    'full_name'=>$user['full_name'],

                    'email'=>$user['email'],

                    'profile_photo'=>$user['profile_photo'],

                    'logged_in'=>true

                ]);



                return redirect()
                ->to(base_url('user/dashboard'))
                ->with(
                    'success',
                    'Login Successfully'
                );


            }

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


        return redirect()
        ->to(base_url('user/login'))
        ->with(
            'success',
            'Logout Successfully'
        );

    }


}