<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;
use App\Models\PartyModel;

class MLAManagement extends BaseController
{
    protected $mlaModel;
    protected $stateModel;
    protected $districtModel;
    protected $constituencyModel;
    protected $partyModel;

    public function __construct()
    {
        $this->mlaModel = new MlaModel();
        $this->stateModel = new StateModel();
        $this->districtModel = new DistrictModel();
        $this->constituencyModel = new ConstituencyModel();
        $this->partyModel = new PartyModel();
    }

    /**
     * MLA Management Page
     */
    public function index()
    {
        // States
        $data['states'] = $this->stateModel
            ->orderBy('state_name', 'ASC')
            ->findAll();

        // Districts
        $data['districts'] = $this->districtModel
            ->orderBy('district_name', 'ASC')
            ->findAll();

        // Constituencies
        $data['constituencies'] = $this->constituencyModel
            ->orderBy('constituency_name', 'ASC')
            ->findAll();

        // Parties
        $data['parties'] = $this->partyModel
            ->where('status', 'Active')
            ->orderBy('party_name', 'ASC')
            ->findAll();

        // MLA List
        $data['mlas'] = $this->mlaModel
            ->select('
                mlas.*,
                states.state_name,
                districts.district_name,
                constituencies.constituency_name,
                parties.party_name,
                parties.party_logo
            ')
            ->join(
                'states',
                'states.id = mlas.state_id',
                'left'
            )
            ->join(
                'districts',
                'districts.id = mlas.district_id',
                'left'
            )
            ->join(
                'constituencies',
                'constituencies.id = mlas.constituency_id',
                'left'
            )
            ->join(
                'parties',
                'parties.id = mlas.party',
                'left'
            )
            ->orderBy('mlas.id', 'DESC')
            ->findAll();

        return view('admin/MLAManagement', $data);
    }

    /**
     * Save New MLA
     */
    public function save()
    {
        // -----------------------------
        // Validate Party
        // -----------------------------
        $partyId = (int) $this->request->getPost('party');

        if ($partyId <= 0 || !$this->partyModel->find($partyId)) {
            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with('error', 'Please select a valid party.');
        }

        // -----------------------------
        // Profile Photo
        // -----------------------------
        $photo = $this->request->getFile('profile_photo');

        $photoName = '';

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/mla/';

            // Create directory if not exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $photoName = $photo->getRandomName();

            $photo->move($uploadPath, $photoName);
        }

        // -----------------------------
        // Generate MLA Code
        // -----------------------------
        $lastMla = $this->mlaModel
            ->orderBy('id', 'DESC')
            ->first();

        if ($lastMla && !empty($lastMla['mla_code'])) {
            $mlaCode = (int) $lastMla['mla_code'] + 1;
        } else {
            $mlaCode = 1001;
        }

        // -----------------------------
        // Save MLA Data
        // -----------------------------
        $data = [

            // MLA Basic
            'mla_code'        => $mlaCode,
            'mla_name'        => trim($this->request->getPost('mla_name')),
            'profile_photo'   => $photoName,

            // Professional Details
            'education'       => trim($this->request->getPost('education')),
            'profession'      => trim($this->request->getPost('profession')),
            'dob'             => $this->request->getPost('dob') ?: null,
            'first_elected'   => $this->request->getPost('first_elected') ?: null,
            'current_term'    => trim($this->request->getPost('current_term')),
            'committees'      => trim($this->request->getPost('committees')),
            'biography'       => trim($this->request->getPost('biography')),

            // Contact / Login
            'mobile'          => trim($this->request->getPost('mobile')),
            'email'           => trim($this->request->getPost('email')),
            'password'        => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'gender'          => $this->request->getPost('gender'),

            // Party
            'party'           => $partyId,

            // Location
            'state_id'        => (int) $this->request->getPost('state_id'),
            'district_id'     => (int) $this->request->getPost('district_id'),
            'constituency_id' => (int) $this->request->getPost('constituency_id'),

            // Address
            'address'         => trim($this->request->getPost('address')),
            'pincode'         => trim($this->request->getPost('pincode')),
            'aadhaar'         => trim($this->request->getPost('aadhaar')),
            'joining_date'    => $this->request->getPost('joining_date') ?: null,

            // Status
            'status'          => $this->request->getPost('status') ?: 'Active'
        ];

        // -----------------------------
        // Insert
        // -----------------------------
        if (!$this->mlaModel->insert($data)) {

            // Delete uploaded photo if DB insert fails
            if (!empty($photoName)) {

                $photoPath = FCPATH . 'uploads/mla/' . $photoName;

                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->mlaModel->errors()
                    )
                );
        }

        return redirect()
            ->to(base_url('admin/mla-management'))
            ->with('success', 'MLA added successfully.');
    }

    /**
     * Get MLA Details
     * Used for Edit Modal / AJAX
     */
    public function get($id)
    {
        $mla = $this->mlaModel
            ->select('
                mlas.*,
                states.state_name,
                districts.district_name,
                constituencies.constituency_name,
                parties.party_name,
                parties.party_logo
            ')
            ->join(
                'states',
                'states.id = mlas.state_id',
                'left'
            )
            ->join(
                'districts',
                'districts.id = mlas.district_id',
                'left'
            )
            ->join(
                'constituencies',
                'constituencies.id = mlas.constituency_id',
                'left'
            )
            ->join(
                'parties',
                'parties.id = mlas.party',
                'left'
            )
            ->where('mlas.id', $id)
            ->first();

        if ($mla) {

            return $this->response->setJSON([
                'status' => true,
                'data'   => $mla
            ]);
        }

        return $this->response->setJSON([
            'status'  => false,
            'message' => 'MLA not found.'
        ]);
    }

    /**
     * Update MLA
     */
    public function update()
    {
        // -----------------------------
        // MLA ID
        // -----------------------------
        $id = (int) $this->request->getPost('id');

        if ($id <= 0) {
            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with('error', 'Invalid MLA ID.');
        }

        // -----------------------------
        // Check MLA
        // -----------------------------
        $mla = $this->mlaModel->find($id);

        if (!$mla) {
            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with('error', 'MLA not found.');
        }

        // -----------------------------
        // Validate Party
        // -----------------------------
        $partyId = (int) $this->request->getPost('party');

        if ($partyId <= 0 || !$this->partyModel->find($partyId)) {
            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with('error', 'Please select a valid party.');
        }

        // -----------------------------
        // Update Data
        // -----------------------------
        $data = [

            // Basic
            'mla_name'        => trim($this->request->getPost('mla_name')),
            'mobile'          => trim($this->request->getPost('mobile')),
            'email'           => trim($this->request->getPost('email')),
            'gender'          => $this->request->getPost('gender'),

            // Professional Details
            'education'       => trim($this->request->getPost('education')),
            'profession'      => trim($this->request->getPost('profession')),
            'dob'             => $this->request->getPost('dob') ?: null,
            'first_elected'   => $this->request->getPost('first_elected') ?: null,
            'current_term'    => trim($this->request->getPost('current_term')),
            'committees'      => trim($this->request->getPost('committees')),
            'biography'       => trim($this->request->getPost('biography')),

            // Party
            'party'           => $partyId,

            // Location
            'state_id'        => (int) $this->request->getPost('state_id'),
            'district_id'     => (int) $this->request->getPost('district_id'),
            'constituency_id' => (int) $this->request->getPost('constituency_id'),

            // Address
            'address'         => trim($this->request->getPost('address')),
            'pincode'         => trim($this->request->getPost('pincode')),
            'aadhaar'         => trim($this->request->getPost('aadhaar')),
            'joining_date'    => $this->request->getPost('joining_date') ?: null,

            // Status
            'status'          => $this->request->getPost('status') ?: 'Active'
        ];

        // -----------------------------
        // Password
        // -----------------------------
        $password = $this->request->getPost('password');

        if (!empty($password)) {

            $data['password'] = password_hash(
                $password,
                PASSWORD_DEFAULT
            );
        }

        // -----------------------------
        // Profile Photo
        // -----------------------------
        $photo = $this->request->getFile('profile_photo');

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/mla/';

            // Create directory if not exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $newName = $photo->getRandomName();

            $photo->move($uploadPath, $newName);

            // Delete old photo
            if (
                !empty($mla['profile_photo']) &&
                $mla['profile_photo'] !== 'default-user.png'
            ) {

                $oldPhotoPath =
                    FCPATH . 'uploads/mla/' . $mla['profile_photo'];

                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $data['profile_photo'] = $newName;
        }

        // -----------------------------
        // Update
        // -----------------------------
        if (!$this->mlaModel->update($id, $data)) {

            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->mlaModel->errors()
                    )
                );
        }

        return redirect()
            ->to(base_url('admin/mla-management'))
            ->with('success', 'MLA updated successfully.');
    }

    /**
     * Delete MLA
     */
    public function delete($id)
    {
        $mla = $this->mlaModel->find($id);

        if (!$mla) {

            return redirect()
                ->to(base_url('admin/mla-management'))
                ->with('error', 'MLA not found.');
        }

        // -----------------------------
        // Delete Profile Photo
        // -----------------------------
        if (
            !empty($mla['profile_photo']) &&
            $mla['profile_photo'] !== 'default-user.png'
        ) {

            $photoPath =
                FCPATH . 'uploads/mla/' . $mla['profile_photo'];

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // -----------------------------
        // Delete MLA
        // -----------------------------
        $this->mlaModel->delete($id);

        return redirect()
            ->to(base_url('admin/mla-management'))
            ->with('success', 'MLA deleted successfully.');
    }

    /**
     * Get Constituencies By District
     */
    public function getConstituencies($districtId)
    {
        $constituencies = $this->constituencyModel
            ->where('district_id', $districtId)
            ->orderBy('constituency_name', 'ASC')
            ->findAll();

        return $this->response->setJSON($constituencies);
    }
}