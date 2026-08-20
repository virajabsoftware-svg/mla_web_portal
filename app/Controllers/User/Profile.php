<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;


class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // =================================================
    // MY PROFILE
    // =================================================

    public function index()
    {
        // Get logged-in user ID
        $userId = session()->get('user_id');

        // Check login
        if (!$userId) {
            return redirect()->to('/login');
        }

        // Get user data
        $user = $this->userModel->find($userId);

        // User not found
        if (!$user) {
            return redirect()->to('/login')
                ->with('error', 'User not found.');
        }

        // Models
        $stateModel = new StateModel();
        $districtModel = new DistrictModel();
        $constituencyModel = new ConstituencyModel();

        // Get State
        $state = $stateModel->find($user['state']);

        // Get District
        $district = $districtModel->find($user['district']);

        // Get Constituency
        $constituency = $constituencyModel->find($user['constituency']);

        // Load profile view
        return view('user/my_profile', [
            'user' => $user,

            'stateName' => $state['state_name'] ?? '',

            'districtName' => $district['district_name'] ?? '',

            'constituencyName' =>
                $constituency['constituency_name'] ?? '',

            'states' => $stateModel
                ->orderBy('state_name', 'ASC')
                ->findAll(),
        ]);
    }


    // =================================================
    // UPDATE PROFILE
    // =================================================

    public function update()
    {
        // Get logged-in user ID
        $userId = session()->get('user_id');

        // Check login
        if (!$userId) {
            return redirect()->to('/login');
        }

        // ---------------------------------------------
        // Validation
        // ---------------------------------------------

        $rules = [
            'full_name' => 'required|min_length[2]',
            'dob'       => 'required',
            'gender'    => 'required',
            'email'     => 'required|valid_email',
            'mobile'    => 'permit_empty|numeric|min_length[10]|max_length[10]',
            'pincode'   => 'permit_empty|numeric|exact_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    implode('<br>', $this->validator->getErrors())
                );
        }

        // ---------------------------------------------
        // User Data
        // ---------------------------------------------

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'dob'       => $this->request->getPost('dob'),
            'gender'    => $this->request->getPost('gender'),
            'email'     => $this->request->getPost('email'),
            'mobile'    => $this->request->getPost('mobile'),
            'state'     => $this->request->getPost('state_id'),
            'district'  => $this->request->getPost('district_id'),
            'constituency' => $this->request->getPost('constituency_id'),
            'locality'  => $this->request->getPost('locality'),
            'pincode'   => $this->request->getPost('pincode'),
        ];

        // ---------------------------------------------
        // Profile Photo
        // ---------------------------------------------

        $photo = $this->request->getFile('profile_photo');

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            // Maximum 2 MB
            if ($photo->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Profile photo must be less than 2 MB.'
                    );
            }

            // Allowed extensions
            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp'
            ];

            $extension = strtolower(
                $photo->getClientExtension()
            );

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Only JPG, JPEG, PNG and WEBP images are allowed.'
                    );
            }

            // Upload directory
            $uploadPath = FCPATH . 'uploads/profile/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Generate new name
            $newName = $photo->getRandomName();

            // Move file
            if (!$photo->move($uploadPath, $newName)) {
                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Unable to upload profile photo.'
                    );
            }

            // Save filename
            $data['profile_photo'] = $newName;
        }

        // ---------------------------------------------
        // Update Database
        // ---------------------------------------------

        if ($this->userModel->update($userId, $data)) {

            return redirect()
                ->to('/user/my-profile')
                ->with(
                    'success',
                    'Profile updated successfully.'
                );
        }

        // ---------------------------------------------
        // Update Failed
        // ---------------------------------------------

        return redirect()->back()
            ->withInput()
            ->with(
                'error',
                'Profile update failed.'
            );
    }
}