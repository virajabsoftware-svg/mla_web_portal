<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;
use App\Models\FeedbackCategoryModel;

class FeedbackDashboard extends BaseController
{
    public function index()
    {
        $feedbackModel = new FeedbackModel();

        $categoryModel = new FeedbackCategoryModel();

        // Get feedback statistics
        $statistics = $feedbackModel->getFeedbackStatistics();

        // Get MLA-wise feedback counts
        $mlaFeedback = $feedbackModel->getMLAFeedbackCount();

        // Get all feedback categories
        $categories = $categoryModel
            ->orderBy('id', 'DESC')
            ->findAll();

        // Dashboard data
        $data = [
            'statistics'  => $statistics,
            'mlaFeedback' => $mlaFeedback,
            'categories'  => $categories
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
            'success'  => true,
            'total'    => $statistics['total'],
            'pending'  => $statistics['pending'],
            'resolved' => $statistics['resolved']
        ]);
    }
}
