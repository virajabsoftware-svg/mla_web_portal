<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table = 'complaints';

    protected $primaryKey = 'id';


    protected $allowedFields = [
        'user_id',
        'title',
        'description',
        'status',
        'mla',
        'constituency'
    ];


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


    // MLA wise complaint count
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
            ->groupBy(['mla','constituency'])
            ->get()
            ->getResultArray();
    }
}