<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkStatusModel extends Model
{
    protected $table = 'mla_work_statuses';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'status_name',
        'status_color',
        'sort_order',
        'is_active'
    ];

    public function getWorkStatuses()
    {
        return $this->select('id, status_name, status_color')
                    ->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }
}