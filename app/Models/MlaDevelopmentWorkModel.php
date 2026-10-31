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
    'constituency_id','village','pincode','total_amount','used_amount','remaining_amount',
    'physical_progress','financial_progress','start_date','expected_completion_date',
    'actual_completion_date','status_id','contractor_name','remarks','images'];
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

    public function getPendingWorks(int $mlaId): int
{
    return $this->select('mla_developmentworks.id')
        ->join(
            'mla_work_statuses',
            'mla_work_statuses.id = mla_developmentworks.status_id',
            'inner'
        )
        ->where('mla_developmentworks.mla_id', $mlaId)
        ->where('LOWER(mla_work_statuses.status_name)', 'pending')
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

    public function getDevelopmentWorkList(int $mlaId,int $limit,int $offset,string $status = '',
        string $search = ''
        ): array
    {
        if ($mlaId <= 0) {
            return [];
        }

        $builder = $this->db->table('mla_developmentworks');

$builder->select('
    mla_developmentworks.id,
    mla_developmentworks.work_code,
    mla_developmentworks.work_title,
    mla_developmentworks.work_description,
    mla_developmentworks.department_id,
    departments.department_name,
    mla_developmentworks.category_id,
    categories.category_name,
    mla_developmentworks.subcategory_id,
    sub_categories.sub_category_name,
    mla_developmentworks.district_id,
    districts.district_name,
    mla_developmentworks.constituency_id,
    constituencies.constituency_name,
    mla_developmentworks.village,
    mla_developmentworks.pincode,
    mla_developmentworks.total_amount,
    mla_developmentworks.used_amount,
    mla_developmentworks.remaining_amount,
    mla_developmentworks.physical_progress,
    mla_developmentworks.financial_progress,
    mla_developmentworks.start_date,
    mla_developmentworks.expected_completion_date,
    mla_developmentworks.actual_completion_date,
    mla_developmentworks.status_id,
    mla_work_statuses.status_name,
    mla_work_statuses.status_color,
    mla_developmentworks.contractor_name,
    mla_developmentworks.remarks,
    mla_developmentworks.images,
    mla_developmentworks.created_at,
    mla_developmentworks.updated_at
');

$builder->join(
    'departments',
    'departments.id = mla_developmentworks.department_id',
    'left'
);

$builder->join(
    'categories',
    'categories.id = mla_developmentworks.category_id',
    'left'
);

$builder->join(
    'sub_categories',
    'sub_categories.id = mla_developmentworks.subcategory_id',
    'left'
);

$builder->join(
    'districts',
    'districts.id = mla_developmentworks.district_id',
    'left'
);

$builder->join(
    'constituencies',
    'constituencies.id = mla_developmentworks.constituency_id',
    'left'
);

$builder->join(
    'mla_work_statuses',
    'mla_work_statuses.id = mla_developmentworks.status_id',
    'left'
);

$builder->where('mla_developmentworks.mla_id', $mlaId);
    if (!empty($status)) {
        $builder->where(
            'LOWER(mla_work_statuses.status_name)',
            strtolower($status)
        );
    }

    if (!empty($search)) {

    $builder->groupStart();

    $builder->like('mla_developmentworks.work_code', $search);
    $builder->orLike('mla_developmentworks.work_title', $search);
    $builder->orLike('mla_developmentworks.work_description', $search);
    $builder->orLike('mla_developmentworks.village', $search);

    $builder->orLike('departments.department_name', $search);
    $builder->orLike('categories.category_name', $search);
    $builder->orLike('sub_categories.sub_category_name', $search);
    $builder->orLike('districts.district_name', $search);
    $builder->orLike('constituencies.constituency_name', $search);

    $builder->groupEnd();
}

$builder->orderBy('mla_developmentworks.id', 'DESC');

$builder->limit($limit, $offset);

return $builder->get()->getResultArray();
    }


    public function generateWorkCode($mlaId)
    {
        $lastWork = $this->where('mla_id', $mlaId)
            ->orderBy('id', 'DESC')
            ->first();

        if ($lastWork) {
            $lastNumber = (int) substr($lastWork['work_code'], -2);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'MLA-' . str_pad($mlaId, 2, '0', STR_PAD_LEFT)
            . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    }

    public function getDevelopmentWorkListForVoter(
    int $districtId,
    int $constituencyId,
    int $limit,
    int $offset,
    string $status = '',
    string $search = ''
): array
    {
        if ($districtId <= 0 || $constituencyId <= 0) {
            return [];
        }
        $builder = $this->db->table('mla_developmentworks');

$builder->select('
    mla_developmentworks.id,
    mla_developmentworks.work_code,
    mla_developmentworks.work_title,
    mla_developmentworks.work_description,
    mla_developmentworks.department_id,
    departments.department_name,
    mla_developmentworks.category_id,
    categories.category_name,
    mla_developmentworks.subcategory_id,
    sub_categories.sub_category_name,
    mla_developmentworks.district_id,
    districts.district_name,
    mla_developmentworks.constituency_id,
    constituencies.constituency_name,
    mla_developmentworks.village,
    mla_developmentworks.pincode,
    mla_developmentworks.total_amount,
    mla_developmentworks.used_amount,
    mla_developmentworks.remaining_amount,
    mla_developmentworks.physical_progress,
    mla_developmentworks.financial_progress,
    mla_developmentworks.start_date,
    mla_developmentworks.expected_completion_date,
    mla_developmentworks.actual_completion_date,
    mla_developmentworks.status_id,
    mla_work_statuses.status_name,
    mla_work_statuses.status_color,
    mla_developmentworks.contractor_name,
    mla_developmentworks.remarks,
    mla_developmentworks.images,
    mla_developmentworks.created_at,
    mla_developmentworks.updated_at
');

$builder->join(
    'departments',
    'departments.id = mla_developmentworks.department_id',
    'left'
);

$builder->join(
    'categories',
    'categories.id = mla_developmentworks.category_id',
    'left'
);

$builder->join(
    'sub_categories',
    'sub_categories.id = mla_developmentworks.subcategory_id',
    'left'
);

$builder->join(
    'districts',
    'districts.id = mla_developmentworks.district_id',
    'left'
);

$builder->join(
    'constituencies',
    'constituencies.id = mla_developmentworks.constituency_id',
    'left'
);

$builder->join(
    'mla_work_statuses',
    'mla_work_statuses.id = mla_developmentworks.status_id',
    'left'
);

$builder->where('mla_developmentworks.district_id', $districtId);
$builder->where('mla_developmentworks.constituency_id', $constituencyId);
    if (!empty($status)) {
        $builder->where(
            'LOWER(mla_work_statuses.status_name)',
            strtolower($status)
        );
    }

    if (!empty($search)) {

    $builder->groupStart();

    $builder->like('mla_developmentworks.work_code', $search);
    $builder->orLike('mla_developmentworks.work_title', $search);
    $builder->orLike('mla_developmentworks.work_description', $search);
    $builder->orLike('mla_developmentworks.village', $search);

    $builder->orLike('departments.department_name', $search);
    $builder->orLike('categories.category_name', $search);
    $builder->orLike('sub_categories.sub_category_name', $search);
    $builder->orLike('districts.district_name', $search);
    $builder->orLike('constituencies.constituency_name', $search);

    $builder->groupEnd();
}

$builder->orderBy('mla_developmentworks.id', 'DESC');

$builder->limit($limit, $offset);

return $builder->get()->getResultArray();
    }
    
}
