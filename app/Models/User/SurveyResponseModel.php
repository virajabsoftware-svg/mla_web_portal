<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyResponseModel extends Model
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

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'survey_id' => 'required|is_natural_no_zero',
        'voter_id' => 'required',
        'status' => 'in_list[Submitted,Reviewed]',
    ];

    protected $validationMessages = [
        'survey_id' => [
            'required' => 'Survey ID is required.',
            'is_natural_no_zero' => 'Survey ID must be a positive number.'
        ],
        'voter_id' => [
            'required' => 'Voter ID is required.'
        ],
        'status' => [
            'in_list' => 'Status must be either Submitted or Reviewed.'
        ]
    ];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    // ============================================================
    // Get survey responses with survey title join
    // ============================================================

    public function getResponsesWithSurveyTitle()
    {
        return $this->db->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->orderBy('sr.submitted_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ============================================================
    // Get responses for a specific voter with survey titles
    // ============================================================

    public function getVoterResponsesWithTitle($voterId)
    {
        return $this->db->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.voter_id', $voterId)
            ->orderBy('sr.submitted_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ============================================================
    // Check if voter has already submitted a survey
    // ============================================================

    public function hasSubmitted($surveyId, $voterId)
    {
        return $this->where('survey_id', $surveyId)
            ->where('voter_id', $voterId)
            ->countAllResults() > 0;
    }

    // ============================================================
    // Get response statistics for a survey
    // ============================================================

    public function getSurveyStatistics($surveyId)
    {
        return $this->db->table('survey_responses')
            ->select('
                COUNT(*) as total_responses,
                COUNT(DISTINCT voter_id) as unique_voters
            ')
            ->where('survey_id', $surveyId)
            ->get()
            ->getRowArray();
    }

    // ============================================================
    // Get all responses grouped by survey category
    // ============================================================

    public function getResponsesByCategory()
    {
        return $this->db->table('survey_responses')
            ->select('survey_category, COUNT(*) as count')
            ->groupBy('survey_category')
            ->orderBy('count', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ============================================================
    // Get recent responses with pagination
    // ============================================================

    public function getRecentResponses($limit = 10)
    {
        return $this->db->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->orderBy('sr.submitted_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}