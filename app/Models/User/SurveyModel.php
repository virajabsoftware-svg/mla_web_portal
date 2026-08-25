<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'survey_code',
        'title',
        'survey_category',
        'description',
        'mla_id',
        'constituency',
        'responses',
        'sentiment',
        'participation',
        'status',
        'start_date',
        'end_date',
        'created_by'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get overall survey statistics
     */
    public function getSurveyStats()
    {
        $db = \Config\Database::connect();

        $totalSurveys = $db->table('surveys')
            ->countAllResults();

        $totalResponses = $db->table('survey_responses')
            ->countAllResults();

        $activeSurveys = $db->table('surveys')
            ->where('status', 'Active')
            ->countAllResults();

        // Calculate participation rate based on total possible responses
        // For now, use active surveys as denominator
        $participationRate = 0;
        if ($totalSurveys > 0) {
            $participationRate = round(($totalResponses / ($totalSurveys * 100)) * 100, 2);
            if ($participationRate > 100) $participationRate = 100;
        }

        // Calculate satisfaction from survey sentiment
        $sentimentStats = $db->table('surveys')
            ->select('sentiment, COUNT(*) as count')
            ->where('sentiment !=', '')
            ->groupBy('sentiment')
            ->get()
            ->getResultArray();

        $satisfaction = 0;
        $positiveCount = 0;
        $totalWithSentiment = 0;

        foreach ($sentimentStats as $row) {
            $totalWithSentiment += $row['count'];
            if ($row['sentiment'] === 'Positive') {
                $positiveCount = $row['count'];
            }
        }

        if ($totalWithSentiment > 0) {
            $satisfaction = round(($positiveCount / $totalWithSentiment) * 100, 2);
        }

        // Get MLA response count
        $mlaCount = $this->getMLAResponseWiseCount();

        return [
            'total_surveys'     => (int) $totalSurveys,
            'total_responses'   => (int) $totalResponses,
            'active_surveys'    => (int) $activeSurveys,
            'satisfaction_rate' => $satisfaction,
            'participation_rate' => $participationRate,
            'mla_stats'         => $mlaCount
        ];
    }

    /**
     * Get all surveys with MLA names and response counts
     */
    public function getAllSurveys()
    {
        $db = \Config\Database::connect();

        return $db->table('surveys s')
            ->select('
                s.*,
                m.mla_name,
                m.mla_code,
                COUNT(DISTINCT sr.id) as actual_responses,
                COUNT(DISTINCT sq.id) as question_count
            ')
            ->join('mlas m', 'm.id = s.mla_id', 'left')
            ->join('survey_responses sr', 'sr.survey_id = s.id', 'left')
            ->join('survey_questions sq', 'sq.survey_id = s.id', 'left')
            ->groupBy('s.id')
            ->orderBy('s.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Get a single survey with questions and options
     */
    public function getSurveyWithQuestions($surveyId)
    {
        $db = \Config\Database::connect();

        $survey = $db->table('surveys s')
            ->select('
                s.*,
                m.mla_name,
                m.mla_code,
                COUNT(DISTINCT sr.id) as actual_responses
            ')
            ->join('mlas m', 'm.id = s.mla_id', 'left')
            ->join('survey_responses sr', 'sr.survey_id = s.id', 'left')
            ->where('s.id', $surveyId)
            ->groupBy('s.id')
            ->get()
            ->getRowArray();

        if (!$survey) {
            return null;
        }

        // Get questions
        $questions = $db->table('survey_questions')
            ->where('survey_id', $surveyId)
            ->orderBy('sort_order', 'ASC')
            ->get()
            ->getResultArray();

        // Get options for each question
        foreach ($questions as &$question) {
            $options = $db->table('survey_question_options')
                ->where('question_id', $question['id'])
                ->where('is_active', 1)
                ->orderBy('sort_order', 'ASC')
                ->get()
                ->getResultArray();
            $question['options'] = $options;
        }

        $survey['questions'] = $questions;
        return $survey;
    }

    /**
     * Get MLA-wise survey and response statistics
     */
    public function getMLAResponseWiseCount()
    {
        $db = \Config\Database::connect();

        // Get all MLAs
        $mlas = $db->table('mlas')
            ->select('id, mla_name, mla_code, constituency_id')
            ->where('status', 'active')
            ->orderBy('mla_name', 'ASC')
            ->get()
            ->getResultArray();

        $result = [];

        foreach ($mlas as $mla) {
            // Count surveys for this MLA
            $totalSurveys = $db->table('surveys')
                ->where('mla_id', $mla['id'])
                ->countAllResults();

            // Count responses for this MLA
            $totalResponses = $db->table('survey_responses')
                ->where('mla_id', $mla['id'])
                ->countAllResults();

            // Calculate average participation
            $avgParticipation = 0;
            if ($totalSurveys > 0) {
                $avgParticipation = round(($totalResponses / ($totalSurveys * 50)) * 100, 2);
                if ($avgParticipation > 100) $avgParticipation = 100;
            }

            $result[] = [
                'mla_id'            => (int) $mla['id'],
                'mla_name'          => $mla['mla_name'],
                'mla_code'          => $mla['mla_code'],
                'total_surveys'     => (int) $totalSurveys,
                'total_responses'   => (int) $totalResponses,
                'avg_participation' => $avgParticipation
            ];
        }

        return $result;
    }

    /**
     * Create a new survey
     */
    public function createSurvey($data)
    {
        // Generate survey code
        $data['survey_code'] = 'SRV-' . strtoupper(uniqid());

        if (empty($data['status'])) {
            $data['status'] = 'Active';
        }

        if (empty($data['sentiment'])) {
            $data['sentiment'] = 'Neutral';
        }

        if (empty($data['responses'])) {
            $data['responses'] = 0;
        }

        if (empty($data['participation'])) {
            $data['participation'] = 0;
        }

        return $this->insert($data);
    }

    /**
     * Update a survey
     */
    public function updateSurvey($id, $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Delete a survey (handles cascading via foreign keys)
     */
    public function deleteSurvey($id)
    {
        // Check if survey exists
        $survey = $this->find($id);
        if (!$survey) {
            return false;
        }

        // Delete survey (cascade will delete questions, options, responses, answers)
        return $this->delete($id);
    }

    /**
     * Get survey response count
     */
    public function getResponseCount($surveyId)
    {
        $db = \Config\Database::connect();
        return (int) $db->table('survey_responses')
            ->where('survey_id', $surveyId)
            ->countAllResults();
    }

    /**
     * Update survey response count
     */
    public function updateResponseCount($surveyId)
    {
        $count = $this->getResponseCount($surveyId);
        return $this->update($surveyId, ['responses' => $count]);
    }
}