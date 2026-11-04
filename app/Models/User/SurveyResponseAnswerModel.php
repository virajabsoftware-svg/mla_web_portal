<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyResponseAnswerModel extends Model
{
    protected $table = 'survey_responses_answers';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'response_id',
        'survey_id',
        'question_id',
        'answers_id'
    ];
}