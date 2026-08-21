<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\ComplaintModel;
use App\Models\User\UserModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;

class Complaint extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/user/login');
        }

        $voter = (new \App\Models\User\VoterModel())->find($userId);
        if (!$voter) {
            return redirect()->back()->with('error', 'Voter information not found.');
        }

        $model = new ComplaintModel();

        //$complaints = $model->where('user_id', $userId)->orderBy('id', 'DESC')->findAll();

        // Complaint + District + Constituency
         $complaints = $model
        ->select('complaints.*, districts.district_name, constituencies.constituency_name')
        ->join('districts', 'districts.id = complaints.district', 'left')
        ->join('constituencies', 'constituencies.id = complaints.constituency', 'left')
        ->where('complaints.user_id', $userId)
        ->orderBy('complaints.id', 'DESC')
        ->findAll();

        $total = $model->where('user_id', $userId)->countAllResults();
        $pending = $model->where('user_id', $userId)->where('status', 'Pending')->countAllResults();
        $resolved = $model->where('user_id', $userId)->where('status', 'Resolved')->countAllResults();
        $escalated = $model->where('user_id', $userId)->where('status', 'Escalated')->countAllResults();

        $district = (new DistrictModel())->find($voter['district'] ?? null);
        $constituency = (new ConstituencyModel())->find($voter['constituency'] ?? null);

        return view('user/Complaint', [
            'voter_id' => $voter['voter_id'] ?? '',
            'mla_id' => $voter['mla_id'] ?? '',
            'district' => $district['district_name'] ?? '',
            'constituency' => $constituency['constituency_name'] ?? '',
            'complaints' => $complaints,
            'totalComplaints' => $total,
            'pendingComplaints' => $pending,
            'resolvedComplaints' => $resolved,
            'escalatedComplaints' => $escalated
        ]);
    }

    public function save()
    {

         
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to(base_url('user/login'))->with('error', 'Please login first');
        }

        $voter = (new UserModel())->find($userId);
        if (!$voter) {
            return redirect()->back()->with('error', 'Voter details not found');
        }

        $rules = [
            'title' => 'required',
            'location' => 'required',
            'description' => 'required|min_length[10]',
            'priority' => 'required|in_list[Low,Medium,High,Critical]'
        ];
        if (!$this->validate($rules)) {

        
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }    
        $model = new ComplaintModel();
        $village = trim((string) $this->request->getPost('village'));
        $location = trim((string) $this->request->getPost('location'));
        $attachment = $this->uploadAttachment();

        $data = [
            'complaint_id' => $model->generateComplaintId($userId),
            'user_id' => $userId,
            'district' => $voter['district'] ?? '',
            'constituency' => $voter['constituency'] ?? '',
            'mla' => $voter['mla_name'] ?? ($voter['mla_id'] ?? ''),
            'title' => trim((string) $this->request->getPost('title')),
            'location' => $location,
            'village' => $village ,
            'priority' => $this->request->getPost('priority'),
            'description' => trim((string) $this->request->getPost('description')),
            'attachment' => $attachment,
            'status' => 'Pending',
            'voter_id' => $voter['voter_id'] ?? ($voter['voter_id'] ?? ''),
        ];          

        if ($model->insert($data)) {
            return redirect()->to(base_url('user/complaint'))->with('success', 'Complaint submitted successfully');
        }

        return redirect()->back()->withInput()->with('error', implode('<br>', $model->errors()));
    }

    public function getComplaintData($id)
    {
        $complaint = $this->findUserComplaint($id);
        if (!$complaint) {
            return $this->response->setJSON(['success' => false, 'message' => 'Complaint not found']);
        }
        return $this->response->setJSON(['success' => true, 'data' => $complaint]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $complaint = $id ? $this->findUserComplaint($id) : null;
        if (!$complaint) {
            return $this->response->setJSON(['success' => false, 'message' => 'Complaint not found']);
        }

        $rules = [
            'title' => 'required',
            'location' => 'required',
            'priority' => 'required|in_list[Low,Medium,High,Critical]',
            'description' => 'required|min_length[10]'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $village = trim((string) $this->request->getPost('village'));

        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'location' => trim((string) $this->request->getPost('location')),
            'priority' => $this->request->getPost('priority'),
            'description' => trim((string) $this->request->getPost('description')),
            'village' => $village ,
        ];

        $attachment = $this->uploadAttachment();
        if ($attachment !== '') {
            $data['attachment'] = $attachment;
            $oldPath = ROOTPATH . 'public/' . ltrim((string) ($complaint['attachment'] ?? ''), '/');
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        if ((new ComplaintModel())->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Complaint updated successfully']);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Update failed']);
    }

    public function delete($id)
    {
        $complaint = $this->findUserComplaint($id);
        if (!$complaint) {
            return redirect()->to('/user/complaint')->with('error', 'Complaint not found');
        }

        if ((new ComplaintModel())->delete($id)) {
            $filePath = ROOTPATH . 'public/' . ltrim((string) ($complaint['attachment'] ?? ''), '/');
            if (is_file($filePath)) {
                unlink($filePath);
            }
            return redirect()->to('/user/complaint')->with('success', 'Complaint deleted successfully');
        }
        return redirect()->back()->with('error', 'Delete failed');
    }

    private function findUserComplaint($id)
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return null;
        }
        return (new ComplaintModel())
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }

    private function uploadAttachment(): string
    {
        $file = $this->request->getFile('attachment');
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return '';
        }

        $uploadPath = ROOTPATH . 'public/uploads/complaint';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        $filename = $file->getRandomName();
        $file->move($uploadPath, $filename);
        return 'uploads/complaint/' . $filename;
    }
}
