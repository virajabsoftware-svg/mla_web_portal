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
        'fcm_token',
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
          ->select('(SELECT COUNT(*) FROM mla_rating_submissions mrs WHERE mrs.mla_id = mlas.id) AS ratings', false)

->select('(SELECT AVG(mrs.overall_rating) FROM mla_rating_submissions mrs WHERE mrs.mla_id = mlas.id) AS rating_score', false)

->select('(SELECT AVG(CAST(mrs.manifesto_fulfilled AS DECIMAL(10,2))) FROM mla_rating_submissions mrs WHERE mrs.mla_id = mlas.id) AS manifesto_percentage', false)
            ->join('districts', 'districts.id = mlas.district_id', 'left')
            ->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left')
            ->join('parties', 'parties.id = mlas.party', 'left')
            // ->where('mlas.status', 'Active')
            ->whereIn('mlas.status', ['Approved', 'Active'])
            ->orderBy('mlas.mla_name', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($mlas as &$mla) {
            $totalWorks = (int) ($mla['total_works'] ?? 0);
            $completedWorks = (int) ($mla['completed_works'] ?? 0);
            $mla['ratings'] = (int) ($mla['ratings'] ?? 0);

$mla['rating_score'] = round(
    (float) ($mla['rating_score'] ?? 0),
    1
);

$mla['manifesto_percentage'] = (int) round(
    (float) ($mla['manifesto_percentage'] ?? 0)
);

$mla['manifesto_fulfilled'] = $mla['manifesto_percentage'];

$mla['party'] = $mla['party_name'] ?? 'Independent';

$mla['approval'] = $totalWorks > 0
    ? round(($completedWorks / $totalWorks) * 100) . '%'
    : '0%';

            // Calculate age from DOB
            if (!empty($mla['dob'])) 
            {               
                    $dob = new \DateTime($mla['dob']);
                    $today = new \DateTime(); 
                    $mla['age'] = $today->diff($dob)->y;
                    
            } else {
                $mla['age'] = null;
            }

            
        }
         
        
        unset($mla);
        //var_dump($mlas[0]); // Debugging line to check the calculated age
           
        return $mlas;
        
    }
    
public function getAllMlasForHome(): array
{
    $mlas = $this->db
        ->table('mlas')

        ->select('
            mlas.*,
            districts.district_name,
            constituencies.constituency_name,
            parties.party_name,
            parties.party_logo
        ')

        // Total ratings from MLA rating submissions
        ->select('(
            SELECT COUNT(*)
            FROM mla_rating_submissions mrs
            WHERE mrs.mla_id = mlas.id
        ) AS ratings', false)

        // Average rating out of 5
        ->select('(
            SELECT AVG(mrs.overall_rating)
            FROM mla_rating_submissions mrs
            WHERE mrs.mla_id = mlas.id
        ) AS rating_score', false)

        // Manifesto fulfilled percentage
        ->select('(
            SELECT AVG(
                CAST(mrs.manifesto_fulfilled AS DECIMAL(10,2))
            )
            FROM mla_rating_submissions mrs
            WHERE mrs.mla_id = mlas.id
        ) AS manifesto_percentage', false)

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

        ->join(
            'parties',
            'parties.id = mlas.party',
            'left'
        )

        ->whereIn('mlas.status', ['Approved', 'Active'])

        ->orderBy('mlas.mla_name', 'ASC')

        ->get()
        ->getResultArray();

    // Format calculated values
    foreach ($mlas as &$mla) {

        $mla['ratings'] = (int) ($mla['ratings'] ?? 0);

        $mla['rating_score'] = round(
            (float) ($mla['rating_score'] ?? 0),
            1
        );

        $mla['manifesto_percentage'] = (int) round(
            (float) ($mla['manifesto_percentage'] ?? 0)
        );

        $mla['manifesto_fulfilled'] =
            $mla['manifesto_percentage'];

        $mla['party'] = $mla['party_name'] ?? 'Independent';
        $mla['district'] = $mla['district_name'] ?? '';

        // Calculate age
        if (!empty($mla['dob'])) {

            $dob = new \DateTime($mla['dob']);
            $today = new \DateTime();

            $mla['age'] = $today->diff($dob)->y;

        } else {

            $mla['age'] = null;
        }
    }

    unset($mla);

    return $mlas;
}


}
