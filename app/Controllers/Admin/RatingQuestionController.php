<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RatingQuestionModel;

class RatingQuestionController extends BaseController
{
    protected $ratingQuestionModel;
    protected $session;

    public function __construct()
    {
        $this->ratingQuestionModel = new RatingQuestionModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Rating Questions',
            'questions' => $this->ratingQuestionModel->orderBy('sort_order', 'ASC')->findAll(),
            'totalQuestions' => $this->ratingQuestionModel->countAll()
        ];
        
        return view('admin/manageratingquestion', $data);
    }

    public function create()
    {
        $maxNo = $this->ratingQuestionModel->getMaxQuestionNo();
        
        $data = [
            'title' => 'Add New Question',
            'question' => null,
            'maxQuestionNo' => $maxNo + 1,
            'questionTypes' => [
                'select' => 'Select / Dropdown',
                'range' => 'Range Slider',
                'checkbox_group' => 'Checkbox Group',
                'textarea' => 'Textarea',
                'text' => 'Text Input'
            ]
        ];
        
        return view('admin/manageratingquestion_form', $data);
    }

    public function store()
    {
        $rules = [
            'question_no' => 'required|integer|is_unique[rating_questions.question_no]',
            'question' => 'required|min_length[3]',
            'question_type' => 'required|in_list[select,range,checkbox_group,textarea,text]',
            'status' => 'permit_empty|in_list[0,1]',
            'sort_order' => 'permit_empty|integer'
        ];

        $questionType = $this->request->getPost('question_type');
        
        if ($questionType === 'select' || $questionType === 'checkbox_group') {
            $rules['options'] = 'required';
            $rules['option_ratings'] = 'required';
        } elseif ($questionType === 'range') {
            $rules['min_value'] = 'required|integer|less_than[max_value]';
            $rules['max_value'] = 'required|integer|greater_than[min_value]';
        } elseif ($questionType === 'textarea') {
            $rules['rows'] = 'permit_empty|integer|greater_than[0]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->with('errors', $this->validator->getErrors())
                           ->withInput();
        }

        $data = [
            'question_no' => $this->request->getPost('question_no'),
            'question' => $this->request->getPost('question'),
            'question_type' => $questionType,
            'status' => $this->request->getPost('status') ?? 1,
            'sort_order' => $this->request->getPost('sort_order') ?? 0,
            'placeholder' => $this->request->getPost('placeholder'),
            'rows' => $this->request->getPost('rows') ?? 3,
        ];

        if ($questionType === 'select' || $questionType === 'checkbox_group') {
            $options = $this->request->getPost('options');
            $optionRatings = $this->request->getPost('option_ratings');
            
            $data['options'] = json_encode(array_values(array_filter($options)));
            $data['option_ratings'] = json_encode(array_values(array_filter($optionRatings)));
        } elseif ($questionType === 'range') {
            $data['min_value'] = $this->request->getPost('min_value');
            $data['max_value'] = $this->request->getPost('max_value');
        }

        if ($this->ratingQuestionModel->save($data)) {
            $this->session->setFlashdata('success', 'Question added successfully!');
            return redirect()->to(base_url('admin/ratingquestion'));
        } else {
            $this->session->setFlashdata('error', 'Failed to add question. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $question = $this->ratingQuestionModel->find($id);
        
        if (!$question) {
            $this->session->setFlashdata('error', 'Question not found.');
            return redirect()->to(base_url('admin/ratingquestion'));
        }

        $question['options'] = json_decode($question['options'] ?? '[]', true);
        $question['option_ratings'] = json_decode($question['option_ratings'] ?? '[]', true);

        $data = [
            'title' => 'Edit Question',
            'question' => $question,
            'maxQuestionNo' => $this->ratingQuestionModel->getMaxQuestionNo(),
            'questionTypes' => [
                'select' => 'Select / Dropdown',
                'range' => 'Range Slider',
                'checkbox_group' => 'Checkbox Group',
                'textarea' => 'Textarea',
                'text' => 'Text Input'
            ]
        ];
        
        return view('admin/manageratingquestion_form', $data);
    }

    public function update($id)
    {
        $question = $this->ratingQuestionModel->find($id);
        if (!$question) {
            $this->session->setFlashdata('error', 'Question not found.');
            return redirect()->to(base_url('admin/ratingquestion'));
        }

        $rules = [
            'question_no' => "required|integer|is_unique[rating_questions.question_no,id,{$id}]",
            'question' => 'required|min_length[3]',
            'question_type' => 'required|in_list[select,range,checkbox_group,textarea,text]',
            'status' => 'permit_empty|in_list[0,1]',
            'sort_order' => 'permit_empty|integer'
        ];

        $questionType = $this->request->getPost('question_type');
        
        if ($questionType === 'select' || $questionType === 'checkbox_group') {
            $rules['options'] = 'required';
            $rules['option_ratings'] = 'required';
        } elseif ($questionType === 'range') {
            $rules['min_value'] = 'required|integer|less_than[max_value]';
            $rules['max_value'] = 'required|integer|greater_than[min_value]';
        } elseif ($questionType === 'textarea') {
            $rules['rows'] = 'permit_empty|integer|greater_than[0]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->with('errors', $this->validator->getErrors())
                           ->withInput();
        }

        $data = [
            'question_no' => $this->request->getPost('question_no'),
            'question' => $this->request->getPost('question'),
            'question_type' => $questionType,
            'status' => $this->request->getPost('status') ?? 1,
            'sort_order' => $this->request->getPost('sort_order') ?? 0,
            'placeholder' => $this->request->getPost('placeholder'),
            'rows' => $this->request->getPost('rows') ?? 3,
        ];

        if ($questionType === 'select' || $questionType === 'checkbox_group') {
            $options = $this->request->getPost('options');
            $optionRatings = $this->request->getPost('option_ratings');
            
            $data['options'] = json_encode(array_values(array_filter($options)));
            $data['option_ratings'] = json_encode(array_values(array_filter($optionRatings)));
        } elseif ($questionType === 'range') {
            $data['min_value'] = $this->request->getPost('min_value');
            $data['max_value'] = $this->request->getPost('max_value');
        } else {
            $data['options'] = null;
            $data['option_ratings'] = null;
            $data['min_value'] = null;
            $data['max_value'] = null;
        }

        if ($this->ratingQuestionModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Question updated successfully!');
            return redirect()->to(base_url('admin/ratingquestion'));
        } else {
            $this->session->setFlashdata('error', 'Failed to update question. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $question = $this->ratingQuestionModel->find($id);
        if (!$question) {
            $this->session->setFlashdata('error', 'Question not found.');
            return redirect()->to(base_url('admin/ratingquestion'));
        }

        if ($this->ratingQuestionModel->delete($id)) {
            $this->session->setFlashdata('success', 'Question deleted successfully!');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete question.');
        }

        return redirect()->to(base_url('admin/ratingquestion'));
    }

    public function view($id)
    {
        $question = $this->ratingQuestionModel->find($id);
        
        if (!$question) {
            $this->session->setFlashdata('error', 'Question not found.');
            return redirect()->to(base_url('admin/ratingquestion'));
        }

        $question['options'] = json_decode($question['options'] ?? '[]', true);
        $question['option_ratings'] = json_decode($question['option_ratings'] ?? '[]', true);

        $data = [
            'title' => 'View Question',
            'question' => $question,
            'viewMode' => true
        ];
        
        return view('admin/manageratingquestion_view', $data);
    }

    public function toggleStatus($id)
    {
        $question = $this->ratingQuestionModel->find($id);
        if (!$question) {
            return $this->response->setJSON(['success' => false, 'message' => 'Question not found.']);
        }

        if ($this->ratingQuestionModel->toggleStatus($id)) {
            $newStatus = $question['status'] == 1 ? 0 : 1;
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status toggled successfully!',
                'new_status' => $newStatus,
                'status_text' => $newStatus == 1 ? 'Active' : 'Inactive'
            ]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Failed to toggle status.']);
    }

    public function updateOrder()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
        }

        $orders = $this->request->getJSON(true);
        
        if (empty($orders)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No order data provided.']);
        }

        if ($this->ratingQuestionModel->updateOrder($orders)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Order updated successfully!']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update order.']);
    }
}