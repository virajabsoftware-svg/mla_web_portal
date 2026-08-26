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