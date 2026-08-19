<?php

namespace App\Models;

use CodeIgniter\Model;

class MlaModel extends Model
{
    protected $table = 'mlas';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'mla_code',
        'profile_photo',
        'mla_name',
        'email',
        'password',
        'mobile',
        'gender',
        'party',
        'state_id',
        'district_id',
        'constituency_id',
        'address',
        'pincode',
        'aadhaar',
        'joining_date',
        'status'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}