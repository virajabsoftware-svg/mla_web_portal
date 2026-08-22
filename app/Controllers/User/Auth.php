<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\VoterModel;
use App\Models\StateModel;
use App\Models\MlaModel;

class Auth extends BaseController
{

    // =====================================================
    // LOGIN / REGISTER PAGE
    // =====================================================

    public function index()
    {
        $stateModel = new StateModel();

        return view('user/login', [
            'states' => $stateModel
                ->orderBy('state_name', 'ASC')
                ->findAll(),
        ]);
    }


    // =====================================================
    // REGISTER
    // =====================================================

    public function register()
    {
        $model = new VoterModel();


        // =========================
        // Profile Photo Upload
        // =========================

        $photoName = '';

        $photo = $this->request->getFile('profile_photo');


        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array(
                strtolower($photo->getExtension()),
                $allowed,
                true
            )) {

                $photoName = $photo->getRandomName();

                $photo->move(
                    FCPATH . 'uploads/profile/',
                    $photoName
                );

            } else {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Only JPG, PNG and WEBP images allowed'
                    );
            }
        }


        // =========================
        // Insert User Data
        // =========================

        $data = [

            'voter_id' => $this->request->getPost('voter_id'),

            'full_name' => $this->request->getPost('full_name'),

            'dob' => $this->request->getPost('dob'),

            'gender' => $this->request->getPost('gender'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'state' => $this->request->getPost('state_id'),

            'district' => $this->request->getPost('district_id'),

            'constituency' => $this->request->getPost('constituency_id'),

            'locality' => $this->request->getPost('locality'),

            'pincode' => $this->request->getPost('pincode'),

            // Photo name save in database
            'profile_photo' => $photoName,

            'mla_name' => $this->request->getPost('mla_name'),

            'mla_party' => $this->request->getPost('mla_party'),

            'mla_id' => $this->request->getPost('mla_id'),

            'status' => 'pending'

        ];


        if ($model->insert($data)) {

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Registration Successful'
                );

        } else {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        "<br>",
                        $model->errors()
                    )
                );
        }
    }


    // =====================================================
    // LOGIN
    // =====================================================

    public function login()
    {
        $model = new VoterModel();

        $email = trim(
            (string) $this->request->getPost('email')
        );

        $password = (string) $this->request->getPost('password');


        // =================================================
        // FIND USER
        // =================================================

        $user = $model
            ->where('email', $email)
            ->first();


        if ($user) {

            // =================================================
            // PASSWORD CHECK
            // =================================================

            if (password_verify(
                $password,
                $user['password']
            )) {

                // =================================================
                // LOGIN PROTECTION
                // =================================================

                // Prevent session fixation
                session()->regenerate(true);


                // =================================================
                // USER SESSION
                // =================================================

                session()->set([

                    // IMPORTANT:
                    // AuthFilter checks this value
                    'user_logged_in' => true,

                    'user_id' => $user['id'],

                    'voter_id' => $user['voter_id'],

                    'full_name' => $user['full_name'],

                    'email' => $user['email'],

                    'profile_photo' => $user['profile_photo'],

                    // Keep existing session key
                    // so old pages do not break
                    'logged_in' => true,

                ]);


                // =================================================
                // REDIRECT TO USER DASHBOARD
                // =================================================

                return redirect()
                    ->to(
                        base_url('user/dashboard')
                    )
                    ->with(
                        'success',
                        'Login Successfully'
                    );
            }
        }


        // =================================================
        // LOGIN FAILED
        // =================================================

        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                'Invalid Email or Password'
            );
    }


    // =====================================================
    // LOGOUT
    // =====================================================

    public function logout()
    {
        // =================================================
        // REMOVE USER LOGIN SESSION
        // =================================================

        session()->remove([
            'user_logged_in',
            'user_id',
            'voter_id',
            'full_name',
            'email',
            'profile_photo',
            'logged_in',
        ]);


        // =================================================
        // DESTROY SESSION
        // =================================================

        session()->destroy();


        // =================================================
        // REDIRECT TO LOGIN
        // =================================================

        return redirect()
            ->to(
                base_url('user/login')
            )
            ->with(
                'success',
                'Logout Successfully'
            );
    }


    // =====================================================
    // CHECK VOTER ID
    // =====================================================

    public function checkVoterId()
    {
        $voterId = trim(
            $this->request->getPost('voter_id')
        );


        if ($voterId === '') {

            return $this->response->setJSON([
                'exists' => false,
                'message' => 'Voter ID is required.'
            ]);
        }


        $model = new VoterModel();


        $exists = $model
            ->where('voter_id', $voterId)
            ->first();


        return $this->response->setJSON([

            'exists' => !empty($exists),

            'message' => !empty($exists)
                ? 'Voter ID is already registered.'
                : 'Voter ID is available.'
        ]);
    }


    // =====================================================
    // GET MLA
    // =====================================================

    public function getMla($constituencyId)
    {
        $mla = (new MlaModel())
            ->select(
                'mlas.*, states.state_name, districts.district_name, constituencies.constituency_name'
            )
            ->join(
                'states',
                'states.id = mlas.state_id'
            )
            ->join(
                'districts',
                'districts.id = mlas.district_id'
            )
            ->join(
                'constituencies',
                'constituencies.id = mlas.constituency_id'
            )
            ->where(
                'mlas.constituency_id',
                $constituencyId
            )
            ->where(
                'mlas.status',
                'Active'
            )
            ->first();


        return $this->response->setJSON([

            'success' => $mla !== null,

            'mla' => $mla,

        ]);
    }
}