<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyResponseModel extends Model
{
    protected $table = 'survey_responses';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'survey_id',
         'survey_title',
        'voter_id',
        'mla_id',
        'district',
        'constituency',
        'village',
        'survey_category',
        'answers',
        'submitted_at'
    ];

  public function getHistory()
{
    return $this->select('
        survey_responses.*,
        surveys.title AS survey_title
    ')
    ->join('surveys', 'surveys.id = survey_responses.survey_id', 'left')
    ->orderBy('survey_responses.id', 'DESC')
    ->findAll();
}
}