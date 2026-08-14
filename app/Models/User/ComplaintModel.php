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
        'voter_id',
        'mla_id',
        'district',
        'constituency',
        'village',
        'title',
        'location',
        'priority',
        'description',
        'attachment',
        'status',
        'submitted_at',
        'resolution_date'
    ];


    /**
     * Generate Complaint ID
     *
     * Example:
     *
     * CMP-VOT1785949798-001
     * CMP-VOT1785949798-002
     * CMP-VOT1785949798-003
     */
    public function generateComplaintId($voterId)
    {
        $count = $this
            ->where('voter_id', $voterId)
            ->countAllResults();

        $nextNumber = $count + 1;

        return 'CMP-' .
            $voterId .
            '-' .
            str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }


    /**
     * Get Complaint Statistics
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
     * MLA wise complaint count
     */
    public function getMLAComplaintCount()
    {
        return $this->db
            ->table('complaints')
            ->select("
                mla,
                constituency,
                COUNT(id) as total,
                SUM(status='Pending') as pending,
                SUM(status='Resolved') as resolved
            ")
            ->groupBy([
                'mla',
                'constituency'
            ])
            ->get()
            ->getResultArray();
    }
}