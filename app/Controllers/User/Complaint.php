<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\ComplaintModel;
use App\Models\User\VoterModel;
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

        $voterModel = new VoterModel();
        $voter = $voterModel->find($userId);
        if (!$voter) {
            return redirect()->back()->with('error', 'Voter information not found.');
        }

        $model = new ComplaintModel();

        // Complaint + District + Constituency
        $complaints = $model
            ->select('complaints.*, districts.district_name, constituencies.constituency_name')
            ->join('districts', 'districts.id = complaints.district', 'left')
            ->join('constituencies', 'constituencies.id = complaints.constituency', 'left')
            ->where('complaints.user_id', $userId)
            ->orderBy('complaints.id', 'DESC')
            ->findAll();

        // Resolve MLA names in one query for the entire list (avoids one query per row in the view).
        $mlaIds = array_values(array_unique(array_filter(array_column($complaints, 'mla'), 'is_numeric')));
        $mlaNames = [];
        if ($mlaIds !== []) {
            $mlaRows = (new \App\Models\MlaModel())->whereIn('id', $mlaIds)->findAll();
            $mlaNames = array_column($mlaRows, 'mla_name', 'id');
        }
        foreach ($complaints as &$complaint) {
            $mlaValue = $complaint['mla'] ?? '';
            $complaint['mla_display'] = $mlaNames[$mlaValue]
                ?? ($mlaValue !== '' ? (is_numeric($mlaValue) ? 'MLA #' . $mlaValue : $mlaValue) : '-');
        }
        unset($complaint);

        $total = $model->where('user_id', $userId)->countAllResults();
        $pending = $model->where('user_id', $userId)->where('status', 'Pending')->countAllResults();
        $resolved = $model->where('user_id', $userId)->where('status', 'Resolved')->countAllResults();
        $escalated = $model->where('user_id', $userId)->where('status', 'Escalated')->countAllResults();

        $district = (new DistrictModel())->find($voter['district'] ?? null);
        $constituency = (new ConstituencyModel())->find($voter['constituency'] ?? null);

        // Get MLA name for display
        $mlaName = '';
        if (!empty($voter['mla_id'])) {
            $mlaModel = new \App\Models\MlaModel();
            $mla = $mlaModel->find($voter['mla_id']);
            if ($mla) {
                $mlaName = $mla['mla_name'] ?? '';
            }
        }
$sharedComplaintId = session()->getFlashdata('complaint_share_id');
        return view('user/Complaint', [
            'voter_id' => $voter['voter_id'] ?? '',
            'mla_id' => $voter['mla_id'] ?? '',
            'mla_name' => $mlaName,
            'district' => $district['district_name'] ?? '',
            'constituency' => $constituency['constituency_name'] ?? '',
            'complaints' => $complaints,
            'totalComplaints' => $total,
            'pendingComplaints' => $pending,
            'resolvedComplaints' => $resolved,
            'escalatedComplaints' => $escalated,
            'sharedComplaintId' => $sharedComplaintId
        ]);
    }

    public function save()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to(base_url('user/login'))->with('error', 'Please login first');
        }

        $voter = (new VoterModel())->find($userId);
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

        // Get MLA ID from voter record
        $mlaId = $voter['mla_id'] ?? null;

        // If no mla_id in voter, try to find it via mla_name
        if (empty($mlaId) && !empty($voter['mla_name'])) {
            $mlaModel = new \App\Models\MlaModel();
            $mla = $mlaModel->where('mla_name', $voter['mla_name'])->first();
            if ($mla) {
                $mlaId = $mla['id'];
            }
        }

        // If still no mla_id, try mla_code
        if (empty($mlaId) && !empty($voter['mla_code'])) {
            $mlaModel = new \App\Models\MlaModel();
            $mla = $mlaModel->where('mla_code', $voter['mla_code'])->first();
            if ($mla) {
                $mlaId = $mla['id'];
            }
        }

        $data = [
            'complaint_id' => $model->generateComplaintId($userId),
            'user_id' => $userId,
            'district' => $voter['district'] ?? '',
            'constituency' => $voter['constituency'] ?? '',
            'mla' => $mlaId, // Store MLA ID consistently
            'title' => trim((string) $this->request->getPost('title')),
            'location' => $location,
            'village' => $village,
            'priority' => $this->request->getPost('priority'),
            'description' => trim((string) $this->request->getPost('description')),
            'attachment' => $attachment,
            'status' => 'Pending',
            'voter_id' => $voter['voter_id'] ?? '',
        ];

       if ($model->insert($data)) {

    $newComplaintId = $model->getInsertID();

    return redirect()
        ->to(base_url('user/complaint'))
        ->with('success', 'Complaint submitted successfully')
        ->with('complaint_share_id', $newComplaintId);
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

public function update($id)
{
    $complaint = $this->findUserComplaint($id);

    if (!$complaint) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Complaint not found'
        ]);
    }

    $title = trim($this->request->getPost('title') ?? '');
    $location = trim($this->request->getPost('location') ?? '');
    $description = trim($this->request->getPost('description') ?? '');
    $priority = trim($this->request->getPost('priority') ?? 'Medium');

   if (
    $title === '' ||
    $location === '' ||
    $description === '' ||
    !in_array($priority, ['Low', 'Medium', 'High', 'Critical'], true)
) {
    return $this->response->setJSON([
        'success' => false,
        'message' => 'Please enter valid complaint details'
    ]);
}

    
    $attachment = $this->uploadAttachment();

    $data = [
        'title'       => $title,
        'location'    => $location,
        'description' => $description,
        'priority'    => $priority
    ];

    
    if ($attachment !== '') {

    $existingImages = [];

    if (!empty($complaint['attachment'])) {
        $existingImages = json_decode($complaint['attachment'], true);

        if (!is_array($existingImages)) {
            $existingImages = [];
        }
    }

    $newImages = json_decode($attachment, true);

    if (!is_array($newImages)) {
        $newImages = [];
    }

    $data['attachment'] = json_encode(
        array_merge($existingImages, $newImages)
    );
}

    $complaintModel = new ComplaintModel();

    if ($complaintModel->update($id, $data)) {

        
        if ($attachment !== '') {

            $oldFilename = basename(
                (string) ($complaint['attachment'] ?? '')
            );

            $oldPath = FCPATH . 'uploads/complaint/' . $oldFilename;

            if ($oldFilename !== '' && is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Complaint updated successfully'
        ]);
    }

    return $this->response->setJSON([
        'success' => false,
        'message' => 'Update failed'
    ]);
}

    public function delete($id)
    {
        $complaint = $this->findUserComplaint($id);
        if (!$complaint) {
            return redirect()->to('/user/complaint')->with('error', 'Complaint not found');
        }

        if ((new ComplaintModel())->delete($id)) {
    $images = json_decode($complaint['attachment'] ?? '', true);

if (is_array($images)) {

    foreach ($images as $image) {

        $filePath = FCPATH . 'uploads/complaint/' . $image;

        if (is_file($filePath)) {
            unlink($filePath);
        }
    }

} elseif (!empty($complaint['attachment'])) {

    $filePath = FCPATH . 'uploads/complaint/' . basename($complaint['attachment']);

    if (is_file($filePath)) {
        unlink($filePath);
    }
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
    $files = $this->request->getFileMultiple('attachment');

    if (empty($files)) {
        return '';
    }

    $uploadPath = FCPATH . 'uploads/complaint/';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $uploadedImages = [];

    foreach ($files as $file) {

    if (!$file || !$file->isValid() || $file->hasMoved()) {
        continue;
    }

    $fileName = $file->getRandomName();

    $file->move($uploadPath, $fileName);

    $uploadedImages[] = $fileName;
}

if (empty($uploadedImages)) {
    return '';
}

    return json_encode($uploadedImages);
}

public function removeImage($id)
{

    $complaint = $this->findUserComplaint($id);

    if (!$complaint) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Complaint not found'
        ]);
    }

    $image = $this->request->getPost('image');

    if (empty($image)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Image name required'
        ]);
    }


    $images = [];

    if (!empty($complaint['attachment'])) {
        $images = json_decode($complaint['attachment'], true);

        if (!is_array($images)) {
            $images = [];
        }
    }


    if (($key = array_search($image, $images)) !== false) {

        unset($images[$key]);

        $filePath = FCPATH . 'uploads/complaint/' . $image;

        if (is_file($filePath)) {
            unlink($filePath);
        }
    }


    $images = array_values($images);


    (new ComplaintModel())->update($id, [
        'attachment' => json_encode($images)
    ]);


    return $this->response->setJSON([
        'success' => true,
        'message' => 'Image removed successfully',
        'images' => $images
    ]);
    
}
public function share($id)
{
    $model = new ComplaintModel();

    $complaint = $model
        ->select('complaints.*, districts.district_name, constituencies.constituency_name')
        ->join('districts', 'districts.id = complaints.district', 'left')
        ->join('constituencies', 'constituencies.id = complaints.constituency', 'left')
        ->where('complaints.id', $id)
        ->first();

    if (!$complaint) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Complaint not found'
        );
    }

    // Get MLA name
    $mlaName = '-';

    if (!empty($complaint['mla'])) {

        $mlaModel = new \App\Models\MlaModel();

        $mla = $mlaModel->find($complaint['mla']);

        if (!empty($mla['mla_name'])) {
            $mlaName = $mla['mla_name'];
        }
    }

    // Get attachments
    $attachments = [];

    if (!empty($complaint['attachment'])) {

        $attachments = json_decode($complaint['attachment'], true);

        if (!is_array($attachments)) {
            $attachments = [$complaint['attachment']];
        }
    }

return view('shared_complaint_form', [
    'complaint'   => $complaint,
    'mlaName'     => $mlaName,
    'attachments' => $attachments
]);
}
}
