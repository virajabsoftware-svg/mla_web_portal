<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'complaint_id',
        'user_id',
        'mla',
        'district',
        'constituency',
        'title',
        'description',
        'status',
        'attachment',
        'location',
        'priority',
        'created_at',
        'resolution_date',
        'village',
        'voter_id',
    ];

    /**
     * Generate Complaint ID
     */
    public function generateComplaintId($userId)
    {
        $count = $this
            ->where('user_id', $userId)
            ->countAllResults();

        $nextNumber = $count + 1;

        return 'CMP-' .
            $userId .
            '-' .
            str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    /**
     * =========================================================
     * GLOBAL COMPLAINT STATISTICS
     * =========================================================
     */
    public function getComplaintStatistics()
    {
        return [
            'total' => $this->countAll(),

            'pending' => $this
                ->where('status', 'Pending')
                ->countAllResults(),

            'resolved' => $this
                ->where('status', 'Resolved')
                ->countAllResults(),

            'rejected' => $this
                ->where('status', 'Rejected')
                ->countAllResults(),
        ];
    }

    /**
     * =========================================================
     * MLA WISE COMPLAINT COUNT
     *
     * MLA information comes from mlas table.
     * Complaint counts come from complaints table.
     *
     * Every MLA will be displayed even if complaint count = 0.
     * =========================================================
     */
    public function getMLAComplaintCount()
    {
        $db = \Config\Database::connect();

        // Get all MLAs with constituency names
        $builder = $db->table('mlas');
        $builder->select("
            mlas.id,
            mlas.mla_code,
            mlas.mla_name,
            constituencies.constituency_name,
            COUNT(complaints.id) AS total,
            SUM(CASE WHEN complaints.status = 'Pending' THEN 1 ELSE 0 END) AS pending,
            SUM(CASE WHEN complaints.status = 'Resolved' THEN 1 ELSE 0 END) AS resolved
        ");

        $builder->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left');

        // Join complaints with backward compatibility
        // complaints.mla may contain either MLA ID or MLA Name
        // We need to handle both cases
        $builder->join(
            'complaints',
            "(complaints.mla = mlas.id OR complaints.mla = mlas.mla_name OR complaints.mla = mlas.mla_code)",
            'left'
        );

        $builder->groupBy([
            'mlas.id',
            'mlas.mla_code',
            'mlas.mla_name',
            'constituencies.constituency_name'
        ]);

        $builder->orderBy('mlas.mla_name', 'ASC');

        $query = $builder->get();
        $results = $query->getResultArray();

        // Convert null to 0 for counts
        foreach ($results as &$row) {
            $row['total'] = (int) ($row['total'] ?? 0);
            $row['pending'] = (int) ($row['pending'] ?? 0);
            $row['resolved'] = (int) ($row['resolved'] ?? 0);
        }

        return $results;
    }

    /**
     * Get MLA complaints with the correct relationship
     * This uses mlas.id = complaints.mla (assuming complaints.mla stores MLA ID)
     */
    public function getMLAComplaintCountById()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('mlas');
        $builder->select("
            mlas.id,
            mlas.mla_code,
            mlas.mla_name,
            constituencies.constituency_name,
            COUNT(complaints.id) AS total,
            SUM(CASE WHEN complaints.status = 'Pending' THEN 1 ELSE 0 END) AS pending,
            SUM(CASE WHEN complaints.status = 'Resolved' THEN 1 ELSE 0 END) AS resolved
        ");

        $builder->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left');
        $builder->join('complaints', 'complaints.mla = mlas.id', 'left');

        $builder->groupBy([
            'mlas.id',
            'mlas.mla_code',
            'mlas.mla_name',
            'constituencies.constituency_name'
        ]);

        $builder->orderBy('mlas.mla_name', 'ASC');

        $query = $builder->get();
        $results = $query->getResultArray();

        foreach ($results as &$row) {
            $row['total'] = (int) ($row['total'] ?? 0);
            $row['pending'] = (int) ($row['pending'] ?? 0);
            $row['resolved'] = (int) ($row['resolved'] ?? 0);
        }

        return $results;
    }

    /**
     * Get complaint statistics for a specific MLA
     */
    public function getMLAComplaintStats($mlaId)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('complaints');
        $builder->select("
            COUNT(*) AS total,
            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending,
            SUM(CASE WHEN status = 'Resolved' THEN 1 ELSE 0 END) AS resolved
        ");

        // Handle both ID and name cases
        $builder->where("mla = '{$mlaId}' OR mla = (SELECT mla_name FROM mlas WHERE id = '{$mlaId}')");

        $query = $builder->get();
        $result = $query->getRowArray();

        return [
            'total' => (int) ($result['total'] ?? 0),
            'pending' => (int) ($result['pending'] ?? 0),
            'resolved' => (int) ($result['resolved'] ?? 0),
        ];
    }
}