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


    // =================================================
    // GET MLA WITH LOCATION DETAILS
    // =================================================

    public function getMlaWithLocation($mlaId)
    {
        return $this
            ->select(
                'mlas.*,
                 states.state_name,
                 districts.district_name,
                 constituencies.constituency_name'
            )

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

            ->where('mlas.id', $mlaId)

            ->first();
    }
}