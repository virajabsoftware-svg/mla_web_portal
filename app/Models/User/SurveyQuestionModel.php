<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyQuestionModel extends Model
{
    protected $table = 'survey_questions';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'survey_id',
        'question',
        'question_type',
        'is_required',
        'sort_order'
    ];

    public function getQuestions(int $surveyId): array
    {
        return $this->where('survey_id', $surveyId)
            ->orderBy('sort_order', 'ASC')
            ->findAll();
    }
}