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


     //`complaint_id`, `user_id`, `voter_id`, `district`, `title`, `description`, `status`, `mla`, `constituency`, `created_at`

    /**
     * Generate Complaint ID
     *
     * Example:
     *
     * CMP-VOT1785949798-001
     * CMP-VOT1785949798-002
     * CMP-VOT1785949798-003
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