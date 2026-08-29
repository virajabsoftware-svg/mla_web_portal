<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MlaDevelopmentWorkModel;
use App\Models\User\DashboardModel;
use App\Models\User\MlaRatingModel;

class AssignedMLA extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId || !session()->get('logged_in')) {
            return redirect()->to(base_url('user/login'));
        }

        $dashboardModel = new DashboardModel();
        $mlaData = $dashboardModel->getAssignedMLA($userId) ?? [];
        $mlaId = (int) ($mlaData['mla_id'] ?? 0);
        $workModel = new MlaDevelopmentWorkModel();
        $db = db_connect();

        $stats = [
            'total_works' => $mlaId ? $workModel->getTotalWorks($mlaId) : 0,
            'completed_works' => $mlaId ? $workModel->getCompletedWorks($mlaId) : 0,
            'ongoing_works' => $mlaId ? $workModel->getOngoingWorks($mlaId) : 0,
            'pending_complaints' => 0,
            'resolved_complaints' => 0,
            'average_rating' => 0,
        ];
        if ($mlaId && $db->tableExists('complaints')) {
            $stats['pending_complaints'] = $db->table('complaints')->where('mla', $mlaId)->where('status', 'Pending')->countAllResults();
            $stats['resolved_complaints'] = $db->table('complaints')->where('mla', $mlaId)->where('status', 'Resolved')->countAllResults();
        }
        if ($mlaId && $db->tableExists('mla_ratings')) {
            $rating = (new MlaRatingModel())->selectAvg('overall_rating', 'average_rating')->where('mla_id', $mlaId)->first();
            $stats['average_rating'] = round((float) ($rating['average_rating'] ?? 0), 1);
        }

        return view('user/Assigned_MLA', [
            'mla_data' => [
                'name' => $mlaData['mla_name'] ?? 'Not Assigned',
                'constituency' => $mlaData['constituency'] ?? 'Not Available',
                'mla_image' => $mlaData['mla_image'] ?? '',
            ],
            'mla_stats' => $stats,
        ]);
    }
}
