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
        'status',
        'submitted_at'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';


    /**
     * Get all survey response history
     */
    public function getHistory()
    {
        return $this->select('
                survey_responses.*,
                surveys.title AS survey_title
            ')
            ->join(
                'surveys',
                'surveys.id = survey_responses.survey_id',
                'left'
            )
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
     * Get single survey response
     */
    public function getResponse($id)
    {
        return $this->where('id', $id)->first();
    }


    /**
     * Delete survey response
     */
    public function deleteResponse($id)
    {
        return $this->delete($id);
    }
}