<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\User\FeedbackModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;

class Feedback extends BaseController
{

  public function index()
{
    $model = new FeedbackModel();

    // ==========================================
    // GET LOGGED-IN VOTER ID FROM SESSION
    // ==========================================

    $userId = session()->get('user_id');

    if (!$userId || !session()->get('logged_in')) {
        return redirect()->to('/user/login')
            ->with('error', 'Please login first.');
    }

    // ==========================================
    // GET CURRENT VOTER FROM VOTERS TABLE
    // ==========================================

    $userModel = new UserModel();

    $voter = $userModel->find($userId);

    if (!$voter) {
        session()->destroy();

        return redirect()->to('/user/login')
            ->with('error', 'Voter information not found.');
    }

    // ==========================================
    // CURRENT VOTER FEEDBACKS ONLY
    // ==========================================

    $feedbacks = $model
        ->where('voter_id', $voter['voter_id'])
        ->orderBy('id', 'DESC')
        ->paginate(10, 'default');

    // ==========================================
    // CURRENT VOTER COUNTS
    // ==========================================

    $totalFeedback = $model
        ->where('voter_id', $voter['voter_id'])
        ->countAllResults();

    $reviewed = $model
        ->where('voter_id', $voter['voter_id'])
        ->where('status', 'Reviewed')
        ->countAllResults();

    $underReview = $model
        ->where('voter_id', $voter['voter_id'])
        ->where('status', 'Under Review')
        ->countAllResults();

    $resolved = $model
        ->where('voter_id', $voter['voter_id'])
        ->where('status', 'Resolved')
        ->countAllResults();

    // ==========================================
    // GENERATE NEXT FEEDBACK ID
    // ==========================================

    $feedbackCount = $model
        ->where('voter_id', $voter['voter_id'])
        ->countAllResults();

    $nextNumber = str_pad(
        $feedbackCount + 1,
        3,
        '0',
        STR_PAD_LEFT
    );

    $feedbackId =
        'FDB-' .
        $voter['voter_id'] .
        '-' .
        $nextNumber;

    // ==========================================
    // SEND DATA TO VIEW
    // ==========================================


       // Models sam hack
       
        $districtModel = new DistrictModel();
        $constituencyModel = new ConstituencyModel();
        // Get District
        $district = $districtModel->find($voter['district']);
        // Get Constituency
        $constituency = $constituencyModel->find($voter['constituency']);

    $data = [
        'feedbacks'     => $feedbacks,

        'totalFeedback' => $totalFeedback,
        'reviewed'      => $reviewed,
        'underReview'   => $underReview,
        'resolved'      => $resolved,
        'pager'         => $model->pager,
        // Automatic voter information
        'feedback_id'   => $feedbackId,
        'voter_id'      => $voter['voter_id'],
        'mla_id'        => $voter['mla_id'] ?? '',
        'district'      => $district['district_name'] ?? '',
        'constituency'  => $constituency['constituency_name'] ?? '',
        'full_name'     => $voter['full_name'] ?? ''
    ];

    return view('user/Feedback', $data);
}

  public function save()
{
    // ==========================================
    // CHECK LOGIN
    // ==========================================

    $userId = session()->get('user_id');

    if (!$userId || !session()->get('logged_in')) {
        return redirect()->to('/user/login')
            ->with('error', 'Please login first.');
    }

    // ==========================================
    // GET LOGGED-IN VOTER
    // ==========================================

    $userModel = new UserModel();

    $voter = $userModel->find($userId);

    if (!$voter) {
        return redirect()->back()
            ->with('error', 'Voter information not found.');
    }

    // ==========================================
    // VALIDATION
    // ==========================================

    $rules = [
        'village'     => 'required',
        'category'    => 'required',
        'description' => 'required|min_length[10]'
    ];

    if (!$this->validate($rules)) {

        return redirect()->back()
            ->withInput()
            ->with(
                'errors',
                \Config\Services::validation()->getErrors()
            );
    }

    // ==========================================
    // FILE UPLOAD
    // ==========================================

    $file = $this->request->getFile('attachment');

    $filename = '';

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $uploadPath = ROOTPATH . 'public/uploads/feedback';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $filename = $file->getRandomName();

        $file->move($uploadPath, $filename);
    }

    // ==========================================
    // GENERATE UNIQUE FEEDBACK ID
    // ==========================================

    $model = new FeedbackModel();

    $feedbackCount = $model
        ->where('voter_id', $voter['voter_id'])
        ->countAllResults();

    $nextNumber = str_pad(
        $feedbackCount + 1,
        3,
        '0',
        STR_PAD_LEFT
    );

    $feedbackId =
        'FDB-' .
        $voter['voter_id'] .
        '-' .
        $nextNumber;

    // ==========================================
    // SAVE FEEDBACK
    // ==========================================

    $data = [

        // AUTOMATIC FROM VOTERS TABLE
        'feedback_id'  => $feedbackId,
        'voter_id'     => $voter['voter_id'],
        'mla_id'       => $voter['mla_id'],
        'district'     => $voter['district'],
        'constituency' => $voter['constituency'],

        // USER ENTERED
        'work_id'      => $this->request->getPost('work_id'),
        'village'      => $this->request->getPost('village'),
        'category'     => $this->request->getPost('category'),
        'source'       => 'Web Portal',
        'description'  => $this->request->getPost('description'),
        'attachment'   => $filename,

        // SYSTEM
        'status'       => 'Pending',
        'submitted_at' => date('Y-m-d H:i:s')
    ];

    if ($model->insert($data)) {

        return redirect()
            ->to('/user/feedback')
            ->with(
                'success',
                'Feedback Submitted Successfully'
            );
    }

    return redirect()
        ->back()
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

            // Models
           
            $districtModel = new DistrictModel();
            $constituencyModel = new ConstituencyModel();              
            // Get District
            $district = $districtModel->find($feedback['district']);
            // Get Constituency
            $constituency = $constituencyModel->find($feedback['constituency']);

            $feedback['districtName'] = $district['district_name'] ?? '';
            $feedback['constituencyName'] = $constituency['constituency_name'] ?? '';
            
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
            //'district' => $this->request->getPost('district'),
            //'constituency' => $this->request->getPost('constituency'),
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
        
        // Use the model's update method with primary key
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