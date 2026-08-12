<?php

namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model
{
    protected $table            = 'districts';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'state_id',
        'district_name'
    ];

    protected $useTimestamps    = true;

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}