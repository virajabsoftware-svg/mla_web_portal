<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyResponseModel extends Model
{
    protected $table = 'survey_responses';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
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
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Get responses with survey details
    public function getResponsesWithSurvey($voterId)
    {
        return $this->db->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.voter_id', $voterId)
            ->orderBy('sr.submitted_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}