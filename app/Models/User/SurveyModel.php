<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'survey_responses';
    protected $primaryKey = 'id';

  protected $allowedFields = [
    'survey_id',
    'voter_id',
    'mla_id',
    'district',
    'constituency',
    'village',
    'survey_category',
    'answers',
    'status',
    'submitted_at',
    'created_at',
    'updated_at'
];


    // Dashboard statistics
public function getSurveyStats()
{
    return $this->db->query("
        SELECT 
            COUNT(*) as total_surveys
        FROM survey_responses
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
            ON sr.mla_id = m.mla_code

            GROUP BY m.id,m.mla_name

            ORDER BY total_surveys DESC

        ")->getResultArray();
    }

  public function getMLAResponseWiseCount()
{
    return $this->db->query("
        SELECT
            m.mla_name,
            COUNT(sr.id) AS total_surveys

        FROM survey_responses sr

        LEFT JOIN mlas m
        ON sr.mla_id = m.mla_code

        GROUP BY m.mla_code, m.mla_name

        ORDER BY total_surveys DESC

    ")->getResultArray();
}
}