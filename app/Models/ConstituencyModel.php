<?php

namespace App\Models;

use CodeIgniter\Model;

class ConstituencyModel extends Model
{
    protected $table = 'constituencies';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'state_id',
        'district_id',
        'constituency_name',
        'constituency_code',
        'total_villages',
        'total_booths',
        'status'
    ];

    protected $useTimestamps = false;
}