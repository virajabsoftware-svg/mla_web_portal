<?php

namespace App\Models\user;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'voters';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'voter_id',
        'full_name',
        'dob',
        'gender',
        'email',
        'password',
        'state',
        'district',
        'constituency',
        'locality',
        'pincode',
        'profile_photo',
        'mla_name',
        'mla_party',
        'mla_id',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'full_name'     => 'required',
        'dob'           => 'required',
        'gender'        => 'required',
        'email'         => 'required|valid_email|is_unique[voters.email]',
        'password'      => 'required|min_length[6]',
        'state'         => 'required',
        'district'      => 'required',
        'constituency'  => 'required',
        'locality'      => 'required',
        'pincode'       => 'required|numeric|exact_length[6]',
    ];
}