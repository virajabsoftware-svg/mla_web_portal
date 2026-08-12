<?php

namespace App\Models\User;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'voters';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'full_name',
        'dob',
        'gender',
        'profile_photo',
        // 'mobile',
        'email',
        'state',
        'district',
        'constituency',
        'ward_booth',
        'locality',
        'pincode',
        'gps_location',
        'epic_no',
        'aadhaar',
        'address1',
        'address2',
        'mla_name',
        'mla_party',
        'mla_display_status',
        'registration_source',
        'login_status',
        'password'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}