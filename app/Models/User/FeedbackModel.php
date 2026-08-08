<?php

namespace App\Models\User;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'feedback_id',
        'voter_id',
        'mla_id',
        'work_id',
        'district',
        'constituency',
        'village',
        'category',
        'source',
        'description',
        'attachment',
        'status',
        'submitted_at'
    ];
    
    protected $useTimestamps = true;
    
    protected $createdField = 'created_at';
    
    protected $updatedField = 'updated_at';
}