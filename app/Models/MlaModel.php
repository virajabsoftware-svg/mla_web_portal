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
        'status',
        'api_token',
        'token_expiry',       
        'education',
        'profession',
        'dob',
        'first_elected',
        'current_term',
        'committees',
        'biography',

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
                 constituencies.constituency_name,
                 parties.party_name'
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
            ->join('parties', 'parties.id = mlas.party', 'left')

            ->where('mlas.id', $mlaId)

            ->first();
    }

    public function getPublicMlas(): array
    {
        $mlas = $this->db
            ->table('mlas')
            ->select('mlas.*, districts.district_name, constituencies.constituency_name, parties.party_name, parties.party_logo')
            ->select('(SELECT COUNT(*) FROM mla_developmentworks dw WHERE dw.mla_id = mlas.id) AS total_works', false)
            ->select('(SELECT COUNT(*) FROM mla_developmentworks dw INNER JOIN mla_work_statuses ws ON ws.id = dw.status_id 
             WHERE dw.mla_id = mlas.id AND LOWER(ws.status_name) = "completed") AS completed_works', false)
            ->select('(SELECT COUNT(*) FROM mla_ratings mr WHERE mr.mla_id = mlas.id) AS ratings', false)
            ->select('(SELECT AVG(mr.overall_rating) FROM mla_ratings mr WHERE mr.mla_id = mlas.id) AS rating_score', false)
            ->join('districts', 'districts.id = mlas.district_id', 'left')
            ->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left')
            ->join('parties', 'parties.id = mlas.party', 'left')
            ->where('mlas.status', 'Active')
            ->orderBy('mlas.mla_name', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($mlas as &$mla) {
            $totalWorks = (int) ($mla['total_works'] ?? 0);
            $completedWorks = (int) ($mla['completed_works'] ?? 0);
            $mla['rating_score'] = round((float) ($mla['rating_score'] ?? 0), 1);
            $mla['party'] = $mla['party_name'] ?? 'Independent';
            $mla['approval'] = $totalWorks > 0
                ? round(($completedWorks / $totalWorks) * 100) . '%'
                : '0%';
            $mla['manifesto_fulfilled'] = $totalWorks > 0
                ? (int) round(($completedWorks / $totalWorks) * 100)
                : 0;
        }
        unset($mla);

        return $mlas;
    }
}
