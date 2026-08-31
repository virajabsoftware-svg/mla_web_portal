<?php
namespace App\Models;

use CodeIgniter\Model;

class MlaDevelopmentWorkModel extends Model
{
    protected $table = 'mla_developmentworks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['mla_id','work_code','work_title',
    'department_id','category_id','subcategory_id','work_description','district_id',
    'taluka_id','village','pincode','total_amount','used_amount','remaining_amount',
    'physical_progress','financial_progress','start_date','expected_completion_date',
    'actual_completion_date','status_id','contractor_name','remarks'];
    protected $useTimestamps = true;

    public function getFilteredWorks($mlaId, array $filters): self
    {
        $this->select('mla_developmentworks.*, mlas.mla_name, mlas.profile_photo, parties.party_name AS party,
                constituencies.constituency_name,categories.category_name,sub_categories.sub_category_name,
                departments.department_name, districts.district_name,mla_work_statuses.status_name')
            ->join('mlas', 'mlas.id = mla_developmentworks.mla_id', 'left')
            ->join('parties', 'parties.id = mlas.party', 'left')
            ->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left')
            ->join('categories', 'categories.id = mla_developmentworks.category_id', 'left')
            ->join('sub_categories', 'sub_categories.id = mla_developmentworks.subcategory_id', 'left')
            ->join('departments', 'departments.id = mla_developmentworks.department_id', 'left')
            ->join('districts', 'districts.id = mla_developmentworks.district_id', 'left')
            ->join('mla_work_statuses', 'mla_work_statuses.id = mla_developmentworks.status_id', 'left');
        if ($mlaId) $this->where('mla_developmentworks.mla_id', (int) $mlaId);
        if ($filters['search'] !== '') $this->like('mla_developmentworks.work_title', $filters['search']);
        if ($filters['status'] !== '') $this->where('mla_developmentworks.status_id', $filters['status']);
        if ($filters['category'] !== '') $this->where('mla_developmentworks.category_id', $filters['category']);
        
        return $this->orderBy('mla_developmentworks.id', 'DESC');
    }

    public function getFilterOptions(string $field): array
    {
        return array_column($this->db->table($this->table)->select($field)
        ->where($field . ' IS NOT NULL', null, false)->distinct()->orderBy($field)
        ->get()->getResultArray(), $field);
    }

    public function getStatusOptions(): array
    {
        $builder = $this->db->table('mla_work_statuses');

        return $builder
            ->select('id, status_name')
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getCategoryOptions(): array
    {
        return $this->db
            ->table('categories')
            ->select('id, category_name')
            ->where('is_active', 1)
            ->orderBy('category_name', 'ASC')
            ->get()
            ->getResultArray();
    }


    public function getTotalWorks(int $mlaId): int
    {
        return $this->where('mla_id', $mlaId)
            ->countAllResults();
    }

    public function getCompletedWorks(int $mlaId): int
    {
        return $this->select('mla_developmentworks.id')
            ->join(
                'mla_work_statuses',
                'mla_work_statuses.id = mla_developmentworks.status_id',
                'inner'
            )
            ->where('mla_developmentworks.mla_id', $mlaId)
            ->where('LOWER(mla_work_statuses.status_name)', 'completed')
            ->countAllResults();
    }

    public function getInProgressWorks(int $mlaId): int
    {
        return $this->select('mla_developmentworks.id')
            ->join(
                'mla_work_statuses',
                'mla_work_statuses.id = mla_developmentworks.status_id',
                'inner'
            )
            ->where('mla_developmentworks.mla_id', $mlaId)
            ->where('LOWER(mla_work_statuses.status_name)', 'in progress')
            ->countAllResults();
    }

    public function getOngoingWorks(int $mlaId): int
    {
        return $this->select('mla_developmentworks.id')
            ->join('mla_work_statuses', 'mla_work_statuses.id = mla_developmentworks.status_id', 'inner')
            ->where('mla_developmentworks.mla_id', $mlaId)
            ->groupStart()
                ->where('LOWER(mla_work_statuses.status_name)', 'ongoing')
                ->orWhere('LOWER(mla_work_statuses.status_name)', 'in progress')
            ->groupEnd()
            ->countAllResults();
    }

    public function getRecentWorks(int $mlaId, int $limit = 5): array
    {
        if ($mlaId <= 0) {
            return [];
        }

        return $this->db
            ->table('mla_developmentworks')
            ->select('mla_developmentworks.work_title, mla_developmentworks.physical_progress, categories.category_name, mla_work_statuses.status_name')
            ->join('categories', 'categories.id = mla_developmentworks.category_id', 'left')
            ->join('mla_work_statuses', 'mla_work_statuses.id = mla_developmentworks.status_id', 'left')
            ->where('mla_developmentworks.mla_id', $mlaId)
            ->orderBy('mla_developmentworks.id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}
