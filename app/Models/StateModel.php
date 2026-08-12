<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $table            = 'states';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'state_name'
    ];

    protected $useTimestamps    = true;

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}