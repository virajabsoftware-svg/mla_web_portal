<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;

class FeedbackDashboard extends BaseController
{
    public function index()
    {
        $feedbackModel = new FeedbackModel();

        // Get statistics
        $statistics = $feedbackModel->getFeedbackStatistics();

        // Get MLA-wise feedback counts
        $mlaFeedback = $feedbackModel->getMLAFeedbackCount();

        $data = [
            'statistics' => $statistics,
            'mlaFeedback' => $mlaFeedback
        ];

        return view('admin/feedback-dashboard', $data);
    }

    /**
     * AJAX endpoint for live count updates
     */
    public function getCount()
    {
        $model = new FeedbackModel();
        $statistics = $model->getFeedbackStatistics();

        return $this->response->setJSON([
            'success' => true,
            'total' => $statistics['total'],
            'pending' => $statistics['pending'],
            'resolved' => $statistics['resolved']
        ]);
    }
}