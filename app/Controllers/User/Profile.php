<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;
use App\Models\MlaModel;


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
        $mlaModel = new MlaModel();

        // Get State
        $state = $stateModel->find($user['state']);

        // Get District
        $district = $districtModel->find($user['district']);

        // Get Constituency
        $constituency = $constituencyModel->find($user['constituency']);

        // Get MLA
        $mla = $mlaModel->getMlaWithLocation($user['mla_id']);

        // Load profile view
        return view('user/my_profile', [
            'user' => $user,
            'mla' => $mla,

            'stateName' => $state['state_name'] ?? '',

            'districtName' => $district['district_name'] ?? '',

            'constituencyName' =>
                $constituency['constituency_name'] ?? '',

            'states' => $stateModel
                ->orderBy('state_name', 'ASC')
                ->findAll(),
        ]);
    }


    protected function buildLocationLockedUpdateData(array $currentUser, array $postData): array
    {
        return [
            'full_name'    => $postData['full_name'] ?? null,
            'dob'          => $postData['dob'] ?? null,
            'gender'       => $postData['gender'] ?? null,
            'email'        => $postData['email'] ?? null,
            'mobile'       => $postData['mobile'] ?? null,
            'state'        => $currentUser['state'] ?? null,
            'district'     => $currentUser['district'] ?? null,
            'constituency' => $currentUser['constituency'] ?? null,
            'locality'     => $postData['locality'] ?? null,
            'pincode'      => $postData['pincode'] ?? null,
        ];
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

        $currentUser = $this->userModel->find($userId);

        if (!$currentUser) {
            return redirect()->to('/login')
                ->with('error', 'User not found.');
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

        $postData = $this->request->getPost();
        $postData['mobile'] = trim((string) ($postData['mobile'] ?? ''));

        if (!$this->validateData($postData, $rules)) {
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

        $data = $this->buildLocationLockedUpdateData(
            $currentUser,
            $postData
        );

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