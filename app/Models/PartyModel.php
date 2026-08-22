<?php

namespace App\Models;

use CodeIgniter\Model;

class PartyModel extends Model
{
    protected $table = 'parties';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'party_name',
        'party_code',
        'party_type',
        'state_id',
        'party_logo',
        'status'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
    

    
}