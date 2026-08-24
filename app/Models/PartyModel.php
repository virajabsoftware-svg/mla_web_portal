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
     public function getTotalParties(): int
    {
        return $this->countAllResults();
    }

    // National Parties
    public function getNationalParties(): int
    {
        return $this->where('party_type', 'National')
                    ->countAllResults();
    }

    // State Parties
    public function getStateParties(): int
    {
        return $this->where('party_type', 'State')
                    ->countAllResults();
    }

    // Active Parties
    public function getActiveParties(): int
    {
        return $this->where('status', 'active')
                    ->countAllResults();
    }

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
    

    
}