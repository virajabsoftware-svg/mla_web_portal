<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyQuestionOptionModel extends Model
{
    protected $table = 'survey_question_options';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'question_id',
        'option_text',
        'score',
        'sort_order',
        'is_active'
    ];

    public function getOptions(int $questionId): array
    {
        return $this->where('question_id', $questionId)
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();
    }
}