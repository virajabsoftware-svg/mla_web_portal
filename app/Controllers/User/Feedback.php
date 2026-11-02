<?php

namespace App\Controllers\User;

use App\Models\FeedbackCategoryModel;
use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;
use App\Models\User\UserModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;

class Feedback extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');

        if (!$userId || !session()->get('logged_in')) {
            return redirect()->to('/user/login')->with('error', 'Please login first.');
        }

        $voter = (new UserModel())->find($userId);

        if (!$voter) {
            session()->destroy();
            return redirect()->to('/user/login')->with('error', 'Voter information not found.');
        }

        $model = new FeedbackModel();
        $voterId = $voter['voter_id'];

        $feedbacks = $model->where('voter_id', $voterId)
            ->orderBy('id', 'DESC')
            ->paginate(10, 'default');

        $total = $model->where('voter_id', $voterId)->countAllResults();

        $reviewed = $model->where('voter_id', $voterId)
            ->where('status', 'Reviewed')
            ->countAllResults();

        $underReview = $model->where('voter_id', $voterId)
            ->where('status', 'Under Review')
            ->countAllResults();

        $resolved = $model->where('voter_id', $voterId)
            ->where('status', 'Resolved')
            ->countAllResults();

        $district = (new DistrictModel())->find($voter['district'] ?? null);
        $constituency = (new ConstituencyModel())->find($voter['constituency'] ?? null);

        // Get MLA name
        $mlaName = '';

        if (!empty($voter['mla_id'])) {
            $mlaModel = new \App\Models\MlaModel();
            $mla = $mlaModel->find($voter['mla_id']);

            if ($mla) {
                $mlaName = $mla['mla_name'] ?? '';
            }
        }

        // Get active feedback categories
        $categoryModel = new FeedbackCategoryModel();

        $categories = $categoryModel
            ->where('status', 1)
            ->orderBy('category_name', 'ASC')
            ->findAll();

        return view('user/Feedback', [
            'feedbacks' => $feedbacks,
            'totalFeedback' => $total,
            'reviewed' => $reviewed,
            'underReview' => $underReview,
            'resolved' => $resolved,
            'pager' => $model->pager,
            'feedback_id' => $model->generateFeedbackId($voterId),
            'voter_id' => $voterId,
            'mla_id' => $voter['mla_id'] ?? '',
            'mla_name' => $mlaName,
            'district' => $district['district_name'] ?? '',
            'constituency' => $constituency['constituency_name'] ?? '',
            'full_name' => $voter['full_name'] ?? '',
            'categories' => $categories
        ]);
    }

    public function save()
    {
        $userId = session()->get('user_id');

        if (!$userId || !session()->get('logged_in')) {
            return redirect()->to('/user/login')->with('error', 'Please login first.');
        }

        $voter = (new UserModel())->find($userId);

        if (!$voter) {
            return redirect()->back()->with('error', 'Voter information not found.');
        }

        $rules = [
            'village' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new FeedbackModel();
        $voterId = $voter['voter_id'];

        $categoryId = $this->request->getPost('category_id');

        // Fetch selected active category
        $categoryModel = new FeedbackCategoryModel();

        $selectedCategory = $categoryModel
            ->where('id', $categoryId)
            ->where('status', 1)
            ->first();

        if (!$selectedCategory) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid feedback category.');
        }

        $filename = $this->uploadAttachment();

        // Get MLA ID from voter record
        $mlaId = $voter['mla_id'] ?? null;

        // If no mla_id, try to find it using mla_name
        if (empty($mlaId) && !empty($voter['mla_name'])) {
            $mlaModel = new \App\Models\MlaModel();

            $mla = $mlaModel
                ->where('mla_name', $voter['mla_name'])
                ->first();

            if ($mla) {
                $mlaId = $mla['id'];
            }
        }

        $data = [
            'feedback_id' => $model->generateFeedbackId($voterId),
            'voter_id' => $voterId,
            'mla_id' => $mlaId,
            'district' => $voter['district'] ?? '',
            'constituency' => $voter['constituency'] ?? '',
            'work_id' => $this->request->getPost('work_id'),
            'village' => $this->request->getPost('village'),

            // Save both category ID and category name
            'category_id' => $selectedCategory['id'],
            'category' => $selectedCategory['category_name'],

            'source' => 'Web Portal',
            'description' => $this->request->getPost('description'),
            'attachment' => $filename,
            'status' => 'Pending',
            'user_id' => $userId,
            'submitted_at' => date('Y-m-d H:i:s')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/user/feedback')
                ->with('success', 'Feedback Submitted Successfully');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', implode('<br>', $model->errors()));
    }

    public function getFeedbackData($id)
    {
        $feedback = $this->findUserFeedback($id);

        if (!$feedback) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Feedback not found'
            ]);
        }

        $district = (new DistrictModel())->find($feedback['district'] ?? null);
        $constituency = (new ConstituencyModel())->find($feedback['constituency'] ?? null);

        $status = strtolower((string) ($feedback['status'] ?? ''));

        $feedback['districtName'] = $district['district_name'] ?? '';
        $feedback['constituencyName'] = $constituency['constituency_name'] ?? '';

        $feedback['status_class'] = $status === 'pending'
            ? 'bg-warning'
            : ($status === 'rejected' ? 'bg-danger' : 'bg-success');

        $feedback['submitted_at'] = !empty($feedback['submitted_at'])
            ? date('d-M-Y h:i A', strtotime($feedback['submitted_at']))
            : '-';

        return $this->response->setJSON([
            'success' => true,
            'data' => $feedback
        ]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $existing = $id ? $this->findUserFeedback($id) : null;

        if (!$existing) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Feedback not found'
            ]);
        }

        $rules = [
            'voter_id' => 'required',
            'village' => 'required',
            'category_id' => 'required|integer',
            'status' => 'required',
            'description' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Fetch selected active category
        $categoryId = $this->request->getPost('category_id');

        $categoryModel = new FeedbackCategoryModel();

        $selectedCategory = $categoryModel
            ->where('id', $categoryId)
            ->where('status', 1)
            ->first();

        if (!$selectedCategory) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid feedback category.'
            ]);
        }

        $data = [
            'voter_id' => $this->request->getPost('voter_id'),
            'village' => $this->request->getPost('village'),

            // Update both category ID and category name
            'category_id' => $selectedCategory['id'],
            'category' => $selectedCategory['category_name'],

            'status' => $this->request->getPost('status'),
            'description' => $this->request->getPost('description')
        ];

        // Update MLA ID only if provided
        if ($this->request->getPost('mla_id')) {
            $data['mla_id'] = $this->request->getPost('mla_id');
        }

        $filename = $this->uploadAttachment();

        if ($filename !== '') {
            $data['attachment'] = $filename;

            $oldPath = ROOTPATH . 'public/uploads/feedback/' . ($existing['attachment'] ?? '');

            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        if ((new FeedbackModel())->update($id, $data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Feedback Updated Successfully'
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Update Failed'
        ]);
    }

    public function delete($id)
    {
        $feedback = $this->findUserFeedback($id);

        if (!$feedback) {
            return redirect()->to('/user/feedback')
                ->with('error', 'Feedback not found');
        }

        if ((new FeedbackModel())->delete($id)) {
            $filePath = ROOTPATH . 'public/uploads/feedback/' . ($feedback['attachment'] ?? '');

            if (is_file($filePath)) {
                unlink($filePath);
            }

            return redirect()->to('/user/feedback')
                ->with('success', 'Feedback Deleted Successfully');
        }

        return redirect()->back()->with('error', 'Delete Failed');
    }

    private function findUserFeedback($id)
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return null;
        }

        $voter = (new UserModel())->find($userId);

        if (!$voter) {
            return null;
        }

        return (new FeedbackModel())
            ->where('id', $id)
            ->where('voter_id', $voter['voter_id'])
            ->first();
    }

    private function uploadAttachment(): string
    {
        $file = $this->request->getFile('attachment');

        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return '';
        }

        $uploadPath = ROOTPATH . 'public/uploads/feedback';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $filename = $file->getRandomName();
        $file->move($uploadPath, $filename);

        return $filename;
    }
}
