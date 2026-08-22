<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    /**
     * Get all dashboard statistics
     */
    public function getDashboardStats(): array
    {
        $db = \Config\Database::connect();

        $stats = [
            'total_voters'      => 0,
            'total_complaints'  => 0,
            'total_feedback'    => 0,
            'total_surveys'     => 0,
             'total_mla'           => 0,
            'total_constituency'  => 0,
        ];

        // Total Voters
        if ($db->tableExists('voters')) {
            $stats['total_voters'] = $db
                ->table('voters')
                ->countAllResults();
        }

        // Total Complaints
        if ($db->tableExists('complaints')) {
            $stats['total_complaints'] = $db
                ->table('complaints')
                ->countAllResults();
        }

        // Total Feedback
        if ($db->tableExists('feedback')) {
            $stats['total_feedback'] = $db
                ->table('feedback')
                ->countAllResults();
        }

        // Total Surveys
        if ($db->tableExists('surveys')) {
            $stats['total_surveys'] = $db
                ->table('surveys')
                ->countAllResults();
        }

         if ($db->tableExists('mlas')) {
            $stats['total_mla'] = $db
                ->table('mlas')
                ->countAllResults();
        }

        // Total Constituency
        if ($db->tableExists('constituencies')) {
            $stats['total_constituency'] = $db
                ->table('constituencies')
                ->countAllResults();
        }

        return $stats;
    }
}