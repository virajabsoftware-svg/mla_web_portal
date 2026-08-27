<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User\VoterModel;
use App\Models\MlaModel;

class AuthApi extends ResourceController
{
    protected $voterModel;
    protected $mlaModel;

    public function __construct()
    {
        $this->voterModel = new VoterModel();
        $this->mlaModel   = new MlaModel();
    }


    // =====================================================
    // TEST API
    // =====================================================

    public function test()
    {
        return $this->respond([
            'status'  => true,
            'message' => 'API working'
        ]);
    }
    // =====================================================
    // VOTER LOGIN API
    // =====================================================
    public function voterlogin()
    {
        $data = $this->request->getJSON(true);

        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        // Validation
        if (empty($email) || empty($password)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Email and password are required'
            ], 400);
        }

        // Find voter
        $voter = $this->voterModel
        ->select('voters.*, districts.district_name, constituencies.constituency_name')
        ->join('districts', 'districts.id = voters.district', 'left')
        ->join('constituencies', 'constituencies.id = voters.constituency', 'left')
        ->where('voters.email', $email)
        ->first();



        if (!$voter) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Check account status
        /*
        if (isset($voter['status']) && $voter['status'] != 1) {
            return $this->respond([
                'status'  => false,
                'message' => 'Your account is inactive'
            ], 403);
        }
        */

        // Check password
        if (!password_verify($password, $voter['password'])) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Generate token
        $token = bin2hex(random_bytes(32));

        // Save hashed token
        $this->voterModel->update($voter['id'], [
            'api_token' => hash('sha256', $token),
            'token_expiry' => date(
                'Y-m-d H:i:s',
                strtotime('+7 days')
            )
        ]);

        // Remove sensitive data
        unset($voter['password']);
        unset($voter['api_token']);
        unset($voter['token_expiry']);

        return $this->respond([
            'status'     => true,
            'message'    => 'Login successful',
            'token'      => $token,
            'token_type' => 'Bearer',
            'expires_in' => '7 days',
            'data'       => $voter
        ], 200);
    }

    // =====================================================
    // VOTER PROFILE API
    // =====================================================
    public function voterprofile()
    {
        $voter = $this->request->voter;

        // Remove sensitive data
        unset($voter['password']);
        unset($voter['api_token']);
        unset($voter['token_expiry']);

        return $this->respond([
            'status'  => true,
            'message' => 'Profile fetched successfully',
            'data'    => $voter
        ], 200);
    }
    // =====================================================
    // VOTER LOGOUT API
    // =====================================================

    public function voterlogout()
    {
        $voter = $this->request->voter;

        // Remove token
        $this->voterModel->update($voter['id'], [
            'api_token'    => null,
            'token_expiry' => null
        ]);

        return $this->respond([
            'status'  => true,
            'message' => 'Logout successful'
        ], 200);
    }

    public function voterRegister()
    {
        $data = $this->request->getJSON(true);

        if (!$data) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid JSON data'
            ], 400);
        }

        // =========================
        // Get Data
        // =========================

        $voterId      = trim($data['voter_id'] ?? '');
        $fullName     = trim($data['full_name'] ?? '');
        $dob          = $data['dob'] ?? '';
        $gender       = trim($data['gender'] ?? '');
        $email        = trim($data['email'] ?? '');
        $password     = $data['password'] ?? '';

        $stateId      = $data['state_id'] ?? null;
        $districtId   = $data['district_id'] ?? null;
        $constituency = $data['constituency_id'] ?? null;

        $locality     = trim($data['locality'] ?? '');
        $pincode      = trim($data['pincode'] ?? '');
        $mlaId        = $data['mla_id'] ?? null;

        // =========================
        // Validation
        // =========================

        if (
            empty($voterId) ||
            empty($fullName) ||
            empty($dob) ||
            empty($gender) ||
            empty($email) ||
            empty($password) ||
            empty($stateId) ||
            empty($districtId) ||
            empty($constituency) ||
            empty($locality) ||
            empty($pincode)
        ) {
            return $this->respond([
                'status'  => false,
                'message' => 'Required fields are missing'
            ], 400);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid email address'
            ], 400);
        }

        if (strlen($password) < 8) {
            return $this->respond([
                'status'  => false,
                'message' => 'Password must be at least 8 characters'
            ], 400);
        }

        // =========================
        // Check Email
        // =========================

        if ($this->voterModel->where('email', $email)->first()) {
            return $this->respond([
                'status'  => false,
                'message' => 'Email already registered'
            ], 409);
        }

        // =========================
        // Check Voter ID
        // =========================

        if ($this->voterModel->where('voter_id', $voterId)->first()) {
            return $this->respond([
                'status'  => false,
                'message' => 'Voter ID already registered'
            ], 409);
        }

        // =========================
        // Insert
        // =========================

        $insertData = [
            'voter_id'     => $voterId,
            'full_name'    => $fullName,
            'dob'          => $dob,
            'gender'       => $gender,
            'email'        => $email,
            'password'     => password_hash(
                $password,
                PASSWORD_DEFAULT
            ),
            'state'        => $stateId,
            'district'     => $districtId,
            'constituency' => $constituency,
            'locality'     => $locality,
            'pincode'      => $pincode,
            'mla_id'       => $mlaId,
            'status'       => 'pending'
        ];

        $userId = $this->voterModel->insert($insertData);

        if (!$userId) {
            return $this->respond([
                'status'  => false,
                'message' => 'Registration failed',
                'errors'  => $this->voterModel->errors()
            ], 500);
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Registration successful',
            'data'    => [
                'id'       => $userId,
                'voter_id' => $voterId,
                'full_name'=> $fullName,
                'email'    => $email,
                'status'   => 'pending'
            ]
        ], 201);
    }

    public function voterProfilePhoto()
    {
        $voter = $this->request->voter;

        if (!$voter) {
            return $this->failUnauthorized('Unauthorized');
        }

        $photo = $this->request->getFile('profile_photo');
        if (!$photo) {
            return $this->respond([
                'status'  => false,
                'message' => 'Profile photo is required'
            ], 400);
        }

        if (!$photo->isValid()) {
            return $this->respond([
                'status'  => false,
                'message' => $photo->getErrorString()
            ], 400);
        }

        if ($photo->hasMoved()) {
            return $this->respond([
                'status'  => false,
                'message' => 'Photo already uploaded'
            ], 400);
        }

        $allowed = ['jpg','jpeg','png','webp'];

        $extension = strtolower(
            $photo->getExtension()
        );

        if (!in_array($extension, $allowed, true)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Only JPG, JPEG, PNG and WEBP images allowed'
            ], 400);
        }

        $uploadPath = FCPATH . 'uploads/profile/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // =========================
        // Delete Old Photo
        // =========================
        if (!empty($voter['profile_photo'])) {

            $oldPhoto = $uploadPath . $voter['profile_photo'];

            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }
        }

        // =========================
        // New Photo Name
        // =========================
        $photoName = $photo->getRandomName();
        $photo->move($uploadPath,$photoName);
        // =========================
        // Update Database
        // =========================
        $updated = $this->voterModel->update(
            $voter['id'],
            [
                'profile_photo' => $photoName
            ]
        );

        if (!$updated) {

            // Delete newly uploaded photo
            if (file_exists($uploadPath . $photoName)) {
                unlink($uploadPath . $photoName);
            }

            return $this->respond([
                'status'  => false,
                'message' => 'Failed to update profile photo'
            ], 500);
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Profile photo uploaded successfully',
            'data'    => [
                'profile_photo' => $photoName
            ]
        ], 200);
    }


    // =====================================================
    // MLA LOGIN API
    // =====================================================

    public function login()
    {
        $data = $this->request->getJSON(true);

        $email    = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        // Validation
        if (empty($email) || empty($password)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Email and password are required'
            ], 400);
        }

        // Find MLA
        $mla = $this->mlaModel
            ->where('email', $email)
            ->first();

        if (!$mla) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Check password
        if (!password_verify($password, $mla['password'])) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Generate token
        $token = bin2hex(random_bytes(32));

        $hashedToken = hash('sha256', $token);

        $tokenExpiry = date(
            'Y-m-d H:i:s',
            strtotime('+7 days')
        );

        // Update token
        $updated = $this->mlaModel->update(
            $mla['id'],
            [
                'api_token'    => $hashedToken,
                'token_expiry' => $tokenExpiry
            ]
        );

        if (!$updated) {
            return $this->respond([
                'status'  => false,
                'message' => 'Failed to generate login token'
            ], 500);
        }

        // Fetch complete MLA data with location names
        $mla = $this->mlaModel
            ->select('
                mlas.*,
                states.state_name,
                districts.district_name,
                constituencies.constituency_name
            ')
            ->join(
                'states',
                'states.id = mlas.state_id',
                'left'
            )
            ->join(
                'districts',
                'districts.id = mlas.district_id',
                'left'
            )
            ->join(
                'constituencies',
                'constituencies.id = mlas.constituency_id',
                'left'
            )
            ->where('mlas.id', $mla['id'])
            ->first();

        // Remove sensitive data
        unset($mla['password']);
        unset($mla['api_token']);
        unset($mla['token_expiry']);

        return $this->respond([
            'status'     => true,
            'message'    => 'MLA login successful',
            'token'      => $token,
            'token_type' => 'Bearer',
            'expires_in' => '7 days',
            'data'       => $mla
        ], 200);
    }


    // =====================================================
    // MLA PROFILE API
    // =====================================================

    public function profile()
    {
        $mla = $this->request->mla;

        // Remove sensitive data
        unset($mla['password']);
        unset($mla['api_token']);
        unset($mla['token_expiry']);

        return $this->respond([
            'status'  => true,
            'message' => 'MLA profile fetched successfully',
            'data'    => $mla
        ], 200);
    }


    // =====================================================
    // MLA LOGOUT API
    // =====================================================

    public function logout()
    {
        $mla = $this->request->mla;

        // Remove token
        $this->mlaModel->update($mla['id'], [
            'api_token'    => null,
            'token_expiry' => null
        ]);

        return $this->respond([
            'status'  => true,
            'message' => 'MLA logout successful'
        ], 200);
    }
}