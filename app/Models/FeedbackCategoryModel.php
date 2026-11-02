<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackCategoryModel extends Model
{
    protected $table = 'feedback_categories';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'category_name',
        'status'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}