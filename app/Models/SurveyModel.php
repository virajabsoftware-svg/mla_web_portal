<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'surveys';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'mla_id',
        'title',
        'responses',
        'sentiment',
        'participation',
        'status'
    ];


    // Dashboard statistics

    public function getSurveyStats()
    {
        return $this->db->query("
            SELECT 
                COUNT(*) as total_surveys,
                SUM(responses) as total_responses,
                AVG(participation) as avg_participation,
                SUM(sentiment='Positive') as positive_count
            FROM surveys
        ")->getRow();
    }



    // MLA wise count only

    public function getMLAWiseSurveyCount()
    {
        return $this->db->query("
            SELECT 
                m.id,
                m.mla_name,
                COUNT(s.id) as total_surveys,
                SUM(s.responses) as total_responses,
                AVG(s.participation) as avg_participation

            FROM mlas m

            LEFT JOIN surveys s
            ON s.mla_id = m.id

            GROUP BY m.id,m.mla_name

            ORDER BY total_surveys DESC

        ")->getResultArray();
    }

}