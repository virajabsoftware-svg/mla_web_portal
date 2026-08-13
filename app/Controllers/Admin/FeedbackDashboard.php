<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;

class FeedbackDashboard extends BaseController
{
    public function index()
    {
        $model = new FeedbackModel();
        
        // Get total feedback count from database
        $totalFeedbacks = $model->countAll();
        
        $data = [
            'totalFeedbacks' => $totalFeedbacks
        ];
        
        return view('admin/feedback-dashboard', $data);
    }
    
    /**
     * AJAX endpoint for live count updates
     */
    public function getCount()
    {
        $model = new FeedbackModel();
        $totalFeedbacks = $model->countAll();
        
        return $this->response->setJSON([
            'success' => true,
            'totalFeedbacks' => $totalFeedbacks
        ]);
    }
}