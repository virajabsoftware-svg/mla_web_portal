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
        'description',
        'mla_id',
        'constituency',
        'status',
        'start_date',
        'end_date',
        'created_by'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';


    // =====================================================
    // ALL SURVEYS
    // =====================================================

    public function getAllSurveys()
    {
        return $this->orderBy('id', 'DESC')
                    ->findAll();
    }


    // =====================================================
    // ACTIVE SURVEYS
    // =====================================================

    public function getActiveSurveys()
    {
        return $this->where('status', 'Active')
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }


    // =====================================================
    // MLA WISE SURVEY COUNT
    // =====================================================

    public function getMLAWiseSurveyCount()
    {
        return $this->db->table('surveys')
            ->select('
                mla_id,
                constituency,
                COUNT(id) AS total_surveys
            ')
            ->groupBy([
                'mla_id',
                'constituency'
            ])
            ->orderBy('total_surveys', 'DESC')
            ->get()
            ->getResultArray();
    }
}