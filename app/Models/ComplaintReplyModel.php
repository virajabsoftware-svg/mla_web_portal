<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintReplyModel extends Model
{
    protected $table = 'complaint_replies';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'complaint_id',
        'mla_id',
        'reply_message',
        'created_at',
        'updated_at'
    ];
}