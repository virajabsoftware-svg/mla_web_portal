<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\VoterModel;
use App\Models\StateModel;
use App\Models\MlaModel;

class Auth extends BaseController
{
    // =====================================================
    // LOGIN PAGE
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
    // LOGIN
    // =====================================================

    public function login()
    {
        $model = new VoterModel();

        $email = trim(
            (string) $this->request->getPost('email')
        );

        $password = (string)
            $this->request->getPost('password');

        // Validation
        if ($email === '' || $password === '') {
            return redirect()
                ->to(base_url('user/login'))
                ->withInput()
                ->with(
                    'error',
                    'Email and Password are required.'
                );
        }

        // Find voter
        $user = $model
            ->where('email', $email)
            ->first();

        if (!$user) {
            return redirect()
                ->to(base_url('user/login'))
                ->withInput()
                ->with(
                    'error',
                    'Invalid Email or Password.'
                );
        }

        // Password verification
        if (
            empty($user['password']) ||
            !password_verify(
                $password,
                $user['password']
            )
        ) {
            return redirect()
                ->to(base_url('user/login'))
                ->withInput()
                ->with(
                    'error',
                    'Invalid Email or Password.'
                );
        }

        // Session
        $session = session();

        $session->set([
            'user_id' => $user['id'],

            'voter_id' =>
                $user['voter_id'] ?? '',

            'full_name' =>
                $user['full_name'] ?? 'User',

            'email' =>
                $user['email'] ?? '',

            'profile_photo' =>
                $user['profile_photo'] ?? '',

            'district' =>
                $user['district'] ?? '',

            'constituency' =>
                $user['constituency'] ?? '',

            'userLoggedIn' =>
                true,

            'user_login_time' =>
                time()
        ]);

        // Verify session
        if ($session->get('userLoggedIn') !== true) {
            return redirect()
                ->to(base_url('user/login'))
                ->with(
                    'error',
                    'Unable to create login session.'
                );
        }

        return redirect()
            ->to(base_url('user/dashboard'))
            ->with(
                'success',
                'Login Successfully'
            );
    }


    // =====================================================
    // REGISTER
    // =====================================================

    public function register()
    {
        $model = new VoterModel();

        $photoName = '';

        // Profile photo
        $photo = $this->request->getFile(
            'profile_photo'
        );

        if (
            $photo &&
            $photo->isValid() &&
            !$photo->hasMoved()
        ) {
            $allowed = [
                'jpg',
                'jpeg',
                'png',
                'webp'
            ];

            $extension = strtolower(
                $photo->getExtension()
            );

            if (!in_array(
                $extension,
                $allowed,
                true
            )) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Only JPG, PNG and WEBP images allowed.'
                    );
            }

            $uploadPath =
                FCPATH . 'uploads/profile/';

            if (!is_dir($uploadPath)) {
                mkdir(
                    $uploadPath,
                    0777,
                    true
                );
            }

            $photoName =
                $photo->getRandomName();

            if (!$photo->move(
                $uploadPath,
                $photoName
            )) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Unable to upload profile photo.'
                    );
            }
        }

        // Password
        $plainPassword = (string)
            $this->request->getPost('password');

        if ($plainPassword === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Password is required.'
                );
        }

        // User data
        $data = [

            'voter_id' =>
                $this->request->getPost('voter_id'),

            'full_name' =>
                trim(
                    (string)
                    $this->request->getPost(
                        'full_name'
                    )
                ),

            'dob' =>
                $this->request->getPost('dob'),

            'gender' =>
                $this->request->getPost('gender'),

            'email' =>
                trim(
                    (string)
                    $this->request->getPost('email')
                ),

            'password' =>
                password_hash(
                    $plainPassword,
                    PASSWORD_DEFAULT
                ),

            'state' =>
                $this->request->getPost('state_id'),

            'district' =>
                $this->request->getPost('district_id'),

            'constituency' =>
                $this->request->getPost(
                    'constituency_id'
                ),

            'locality' =>
                $this->request->getPost(
                    'locality'
                ),

            'pincode' =>
                $this->request->getPost(
                    'pincode'
                ),

            'profile_photo' =>
                $photoName,

            'mla_name' =>
                $this->request->getPost(
                    'mla_name'
                ),

            'mla_party' =>
                $this->request->getPost(
                    'mla_party'
                ),

            'mla_id' =>
                $this->request->getPost(
                    'mla_id'
                ),

            'status' =>
                'pending'
        ];

        // Insert
        if ($model->insert($data)) {
            return redirect()
                ->to(base_url('user/login'))
                ->with(
                    'success',
                    'Registration Successful. Please login.'
                );
        }

        // Error
        $errors =
            $model->errors();

        $errorMessage =
            !empty($errors)
                ? implode('<br>', $errors)
                : 'Registration failed. Please try again.';

        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                $errorMessage
            );
    }


    // =====================================================
    // CHECK VOTER ID
    // =====================================================

    public function checkVoterId()
    {
        $voterId = trim(
            (string)
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
    // GET MLA BY CONSTITUENCY
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


    // =====================================================
    // LOGOUT
    // =====================================================

    public function logout()
    {
        $session = session();

        $session->remove([
            'user_id',
            'full_name',
            'email',
            'profile_photo',
            'voter_id',
            'district',
            'constituency',
            'userLoggedIn',
            'user_login_time'
        ]);

        return redirect()
            ->to(base_url('user/login'))
            ->with(
                'success',
                'Logout Successfully.'
            );
    }


    // =====================================================
    // FORGOT PASSWORD
    // =====================================================

    public function forgotPassword()
    {
        return view(
            'user/forgot_password'
        );
    }


    // =====================================================
    // SEND RESET LINK
    // =====================================================

    public function sendResetLink()
    {
        return redirect()
            ->to(base_url('user/login'))
            ->with(
                'success',
                'Password reset functionality is ready.'
            );
    }


    // =====================================================
    // RESET PASSWORD
    // =====================================================

    public function resetPassword(
        $token = null
    ) {
        return view(
            'user/reset_password',
            [
                'token' => $token
            ]
        );
    }


    // =====================================================
    // UPDATE PASSWORD
    // =====================================================

    public function updatePassword()
    {
        return redirect()
            ->to(base_url('user/login'))
            ->with(
                'success',
                'Password updated successfully.'
            );
    }
}