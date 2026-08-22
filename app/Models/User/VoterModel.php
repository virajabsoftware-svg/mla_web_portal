<?php

namespace App\Models\User;

use CodeIgniter\Model;


class VoterModel extends Model
{
    protected $table = 'voters';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'voter_id', 'full_name', 'dob', 'gender', 'email', 'password',
        'mobile', 'state', 'district', 'constituency', 'locality', 'pincode',
        'profile_photo', 'mla_name', 'mla_party', 'mla_id',
        'status', 'reset_token', 'reset_token_expiry'  // Added reset fields
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function getVoterWithLocation($userId)
    {
        return $this
            ->select('voters.*, districts.district_name, constituencies.constituency_name')
            ->join('districts', 'districts.id = voters.district', 'left')
            ->join('constituencies', 'constituencies.id = voters.constituency', 'left')
            ->where('voters.id', $userId)
            ->first();
    }

    // ==========================================
    // FIND VOTER BY EMAIL
    // ==========================================
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // ==========================================
    // FIND VOTER BY RESET TOKEN
    // ==========================================
    public function findByResetToken($token)
    {
        return $this
            ->where('reset_token', $token)
            ->where('reset_token_expiry >', date('Y-m-d H:i:s'))
            ->first();
    }

    // ==========================================
    // SET RESET TOKEN
    // ==========================================
    public function setResetToken($voterId, $token, $expiry)
    {
        return $this
            ->where('id', $voterId)
            ->set([
                'reset_token' => $token,
                'reset_token_expiry' => $expiry
            ])
            ->update();
    }

    // ==========================================
    // CLEAR RESET TOKEN
    // ==========================================
    public function clearResetToken($voterId)
    {
        return $this
            ->where('id', $voterId)
            ->set([
                'reset_token' => null,
                'reset_token_expiry' => null
            ])
            ->update();
    }

    // ==========================================
    // UPDATE PASSWORD
    // ==========================================
    public function updatePassword($voterId, $password)
    {
        return $this
            ->where('id', $voterId)
            ->set([
                'password' => $password,
                'reset_token' => null,
                'reset_token_expiry' => null
            ])
            ->update();
    }

    // ==========================================
    // VERIFY PASSWORD
    // ==========================================
    public function verifyPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}