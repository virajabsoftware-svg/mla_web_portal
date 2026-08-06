<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;

class Feedback extends BaseController
{

    public function index()
    {
        $model = new FeedbackModel();
        
        // Fetch all feedback records (newest first)
        $feedbacks = $model->orderBy('id', 'DESC')->findAll();
        
        // Calculate dashboard counts
        $totalFeedback = $model->countAll();
        $reviewed = $model->where('status', 'Reviewed')->countAllResults();
        $underReview = $model->where('status', 'Under Review')->countAllResults();
        $resolved = $model->where('status', 'Resolved')->countAllResults();
        
        $data = [
            'feedbacks' => $feedbacks,
            'totalFeedback' => $totalFeedback,
            'reviewed' => $reviewed,
            'underReview' => $underReview,
            'resolved' => $resolved
        ];
        
        return view('user/Feedback', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'voter_id' => 'required',
            'mla_id' => 'required',
            'district' => 'required',
            'constituency' => 'required',
            'village' => 'required',
            'category' => 'required',
            'description' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('attachment');
        $filename = "";

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Create upload directory if it doesn't exist
            $uploadPath = ROOTPATH . 'public/uploads/feedback';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $filename = $file->getRandomName();
            $file->move($uploadPath, $filename);
        }

        $model = new FeedbackModel();

        $data = [
            'feedback_id' => 'FDB' . date('YmdHis'),
            'voter_id' => $this->request->getPost('voter_id'),
            'mla_id' => $this->request->getPost('mla_id'),
            'work_id' => $this->request->getPost('work_id'),
            'district' => $this->request->getPost('district'),
            'constituency' => $this->request->getPost('constituency'),
            'village' => $this->request->getPost('village'),
            'category' => $this->request->getPost('category'),
            'source' => 'Web Portal',
            'description' => $this->request->getPost('description'),
            'attachment' => $filename,
            'status' => 'Pending',
            'submitted_at' => date('Y-m-d H:i:s')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/user/feedback')
                ->with('success', 'Feedback Submitted Successfully');
        }

        return redirect()->back()
            ->with('error', 'Database Insert Failed');
    }

    /**
     * Get feedback data for AJAX requests (View and Edit modals)
     */
    public function getFeedbackData($id)
    {
        $model = new FeedbackModel();
        $feedback = $model->find($id);
        
        if ($feedback) {
            // Determine status class for badge
            $statusClass = 'bg-secondary';
            if (strtolower($feedback['status']) == 'pending') {
                $statusClass = 'bg-warning';
            } elseif (strtolower($feedback['status']) == 'under review') {
                $statusClass = 'bg-info';
            } elseif (strtolower($feedback['status']) == 'reviewed') {
                $statusClass = 'bg-success';
            } elseif (strtolower($feedback['status']) == 'resolved') {
                $statusClass = 'bg-success';
            } elseif (strtolower($feedback['status']) == 'rejected') {
                $statusClass = 'bg-danger';
            }
            
            $feedback['status_class'] = $statusClass;
            $feedback['submitted_at'] = date('d-M-Y h:i A', strtotime($feedback['submitted_at']));
            
            return $this->response->setJSON([
                'success' => true,
                'data' => $feedback
            ]);
        }
        
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Feedback not found'
        ]);
    }

    /**
     * Update feedback (handles both AJAX and traditional form submission)
     */
    public function update()
    {
        $id = $this->request->getPost('id');
        
        if (!$id) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid ID'
                ]);
            }
            return redirect()->back()->with('error', 'Invalid ID');
        }
        
        $validation = \Config\Services::validation();
        
        $rules = [
            'voter_id' => 'required',
            'mla_id' => 'required',
            'district' => 'required',
            'constituency' => 'required',
            'village' => 'required',
            'category' => 'required',
            'status' => 'required',
            'description' => 'required|min_length[10]'
        ];
        
        if (!$this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validation->getErrors()
                ]);
            }
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }
        
        $model = new FeedbackModel();
        $existing = $model->find($id);
        
        if (!$existing) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Feedback not found'
                ]);
            }
            return redirect()->back()->with('error', 'Feedback not found');
        }
        
        $data = [
            'voter_id' => $this->request->getPost('voter_id'),
            'mla_id' => $this->request->getPost('mla_id'),
            'district' => $this->request->getPost('district'),
            'constituency' => $this->request->getPost('constituency'),
            'village' => $this->request->getPost('village'),
            'category' => $this->request->getPost('category'),
            'status' => $this->request->getPost('status'),
            'description' => $this->request->getPost('description')
        ];
        
        // Handle file upload
        $file = $this->request->getFile('attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old attachment if exists
            if (!empty($existing['attachment'])) {
                $oldFile = ROOTPATH . 'public/uploads/feedback/' . $existing['attachment'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            $uploadPath = ROOTPATH . 'public/uploads/feedback';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $filename = $file->getRandomName();
            $file->move($uploadPath, $filename);
            $data['attachment'] = $filename;
        }
        
        if ($model->update($id, $data)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Feedback Updated Successfully'
                ]);
            }
            return redirect()->to('/user/feedback')
                ->with('success', 'Feedback Updated Successfully');
        }
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Update Failed'
            ]);
        }
        
        return redirect()->back()->with('error', 'Update Failed');
    }

    public function delete($id)
    {
        $model = new FeedbackModel();
        $feedback = $model->find($id);
        
        if (!$feedback) {
            return redirect()->to('/user/feedback')
                ->with('error', 'Feedback not found');
        }
        
        // Delete attachment if exists
        if (!empty($feedback['attachment'])) {
            $filePath = ROOTPATH . 'public/uploads/feedback/' . $feedback['attachment'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
        if ($model->delete($id)) {
            return redirect()->to('/user/feedback')
                ->with('success', 'Feedback Deleted Successfully');
        }
        
        return redirect()->back()->with('error', 'Delete Failed');
    }
}