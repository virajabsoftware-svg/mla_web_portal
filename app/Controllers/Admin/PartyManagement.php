<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PartyModel;
use App\Models\StateModel;

class PartyManagement extends BaseController
{
    protected $partyModel;
    protected $stateModel;

    public function __construct()
    {
        $this->partyModel = new PartyModel();
        $this->stateModel = new StateModel();
    }

    public function index()
    {
        $data['states'] = $this->stateModel
            ->orderBy('state_name', 'ASC')
            ->findAll();

        $data['parties'] = $this->partyModel
            ->select('parties.*, states.state_name')
            ->join('states', 'states.id = parties.state_id', 'left')
            ->findAll();
            


$data['totalParties'] = $this->partyModel
    ->countAllResults();


$data['nationalParties'] = $this->partyModel
    ->where('party_type', 'National')
    ->countAllResults();


$data['stateParties'] = $this->partyModel
    ->where('party_type', 'State')
    ->countAllResults();


$data['activeParties'] = $this->partyModel
    ->where('status', 'active')
    ->countAllResults();

        return view('admin/party-management', $data);

        
    }
    

    public function save()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'party_name' => 'required|max_length[150]',
            'party_code' => 'required|max_length[20]|is_unique[parties.party_code]',
            'party_type' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        // Default logo
        $logoName = null;

        // Upload Logo
        $logo = $this->request->getFile('party_logo');

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {

            $logoName = $logo->getRandomName();

            $logo->move(FCPATH . 'uploads/party/', $logoName);
        }

        $this->partyModel->insert([

            'party_name'  => $this->request->getPost('party_name'),
            'party_code'  => strtoupper($this->request->getPost('party_code')),
            'party_type'  => $this->request->getPost('party_type'),
            'state_id'    => $this->request->getPost('state_id') ?: null,
            'party_logo'  => $logoName,
            'status'      => $this->request->getPost('status')

        ]);

        return redirect()->to(base_url('admin/party-management'))
            ->with('success', 'Party added successfully.');
    }

    public function getParty($id)
    {
        $party = $this->partyModel->find($id);

        if (!$party) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Party not found.'
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'data' => $party
        ]);
    }

    public function update()
{
    $id = $this->request->getPost('id');

    $party = $this->partyModel->find($id);

    if (!$party) {

        return redirect()->back()
            ->with('error', 'Party not found.');
    }

    $validation = \Config\Services::validation();

    $validation->setRules([

        'party_name' => 'required|max_length[150]',

        'party_code' => 'required|max_length[20]|is_unique[parties.party_code,id,' . $id . ']',

        'party_type' => 'required'

    ]);

    if (!$validation->withRequest($this->request)->run()) {

        return redirect()->back()
            ->withInput()
            ->with('errors', $validation->getErrors());
    }

    // Existing logo
    $logoName = $party['party_logo'];

    // New logo uploaded?
    $logo = $this->request->getFile('party_logo');

    if ($logo && $logo->isValid() && !$logo->hasMoved()) {

        // Delete old logo
        if (!empty($party['party_logo'])) {

            $oldPath = FCPATH . 'uploads/party/' . $party['party_logo'];

            if (file_exists($oldPath)) {

                unlink($oldPath);

            }
        }

        $logoName = $logo->getRandomName();

        $logo->move(FCPATH . 'uploads/party/', $logoName);
    }

    $this->partyModel->update($id,[

        'party_name' => $this->request->getPost('party_name'),

        'party_code' => strtoupper($this->request->getPost('party_code')),

        'party_type' => $this->request->getPost('party_type'),

        'state_id' => $this->request->getPost('state_id') ?: null,

        'party_logo' => $logoName,

        'status' => $this->request->getPost('status')

    ]);

    return redirect()->to(base_url('admin/party-management'))
        ->with('success','Party updated successfully.');
}

public function delete($id)
{
    $party = $this->partyModel->find($id);

    if (!$party) {
        return redirect()->back()->with('error', 'Party not found.');
    }

    // Delete logo if exists
    if (
        !empty($party['party_logo'])
    ) {

        $logoPath = FCPATH . 'uploads/party/' . $party['party_logo'];

        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
    }

    $this->partyModel->delete($id);

    return redirect()->to(base_url('admin/party-management'))
        ->with('success', 'Party deleted successfully.');
}
}