<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyResponseModel extends Model
{
    protected $table = 'survey_responses';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
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
        'submitted_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get response count for a specific survey
     */
    public function getCountBySurvey($surveyId)
    {
        return (int) $this->where('survey_id', $surveyId)->countAllResults();
    }

    /**
     * Get responses with voter details for a survey
     */
    public function getResponsesBySurvey($surveyId)
    {
        return $this->select('survey_responses.*, voters.full_name, voters.mobile')
            ->join('voters', 'voters.voter_id = survey_responses.voter_id', 'left')
            ->where('survey_id', $surveyId)
            ->orderBy('submitted_at', 'DESC')
            ->findAll();
    }

    /**
     * Get all survey response history
     */
    public function getHistory()
    {
        return $this->select('
                survey_responses.*,
                surveys.title AS survey_title,
                mlas.mla_name
            ')
            ->join('surveys', 'surveys.id = survey_responses.survey_id', 'left')
            ->join('mlas', 'mlas.id = survey_responses.mla_id', 'left')
            ->orderBy('survey_responses.id', 'DESC')
            ->findAll();
    }

    /**
     * Get survey responses of a specific voter
     */
    public function getByVoter($voterId)
    {
        return $this->where('voter_id', $voterId)
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    /**
     * Get survey responses of a specific survey
     */
    public function getBySurvey($surveyId)
    {
        return $this->where('survey_id', $surveyId)
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    /**
     * Get single survey response with answers
     */
    public function getResponseWithAnswers($id)
    {
        $db = \Config\Database::connect();
        
        $response = $this->where('id', $id)->first();
        if (!$response) {
            return null;
        }

        // Get answers
        $answers = $db->table('survey_responses_answers sra')
            ->select('
                sra.*,
                sq.question,
                sqo.option_text
            ')
            ->join('survey_questions sq', 'sq.id = sra.question_id')
            ->join('survey_question_options sqo', 'sqo.id = sra.answers_id')
            ->where('sra.response_id', $id)
            ->get()
            ->getResultArray();

        $response['answers'] = $answers;
        return $response;
    }

    /**
     * Delete survey response
     */
    public function deleteResponse($id)
    {
        // Delete answers first
        $db = \Config\Database::connect();
        $db->table('survey_responses_answers')
            ->where('response_id', $id)
            ->delete();

        return $this->delete($id);
    }
}