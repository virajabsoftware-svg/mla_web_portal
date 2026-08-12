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

    /**
     * Question List
     */
    public function index()
    {
        $data = [
            'title' => 'Manage Rating Questions',
            'questions' => $this->ratingQuestionModel
                ->orderBy('sort_order', 'ASC')
                ->findAll(),
            'totalQuestions' => $this->ratingQuestionModel->countAll(),
        ];

        return view('admin/manageratingquestion', $data);
    }

    /**
     * Create Question Form
     */
    public function create()
    {
        $maxNo = $this->ratingQuestionModel->getMaxQuestionNo();

        $data = [
            'title' => 'Add New Question',
            'question' => null,
            'maxQuestionNo' => ((int) $maxNo) + 1,
            'questionTypes' => $this->getQuestionTypes(),
        ];

        return view('admin/manageratingquestion_form', $data);
    }

    /**
     * Store New Question
     */
    public function store()
    {
        $questionType = trim((string) $this->request->getPost('question_type'));

        $rules = $this->getValidationRules($questionType);

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = $this->prepareQuestionData($questionType);

        if ($this->ratingQuestionModel->insert($data)) {
            $this->session->setFlashdata(
                'success',
                'Question added successfully!'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        $this->session->setFlashdata(
            'error',
            'Failed to add question. Please try again.'
        );

        return redirect()
            ->back()
            ->withInput();
    }

    /**
     * Edit Question Form
     */
    public function edit($id)
    {
        $id = (int) $id;

        if ($id <= 0) {
            $this->session->setFlashdata(
                'error',
                'Invalid question ID.'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        $question = $this->ratingQuestionModel->find($id);

        if (!$question) {
            $this->session->setFlashdata(
                'error',
                'Question not found.'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        /*
         * Decode JSON fields so that the edit form can directly
         * use them as arrays.
         */
        $question['options'] = $this->decodeJsonArray(
            $question['options'] ?? null
        );

        $question['option_ratings'] = $this->decodeJsonArray(
            $question['option_ratings'] ?? null
        );

        $data = [
            'title' => 'Edit Question',
            'question' => $question,
            'maxQuestionNo' => $this->ratingQuestionModel->getMaxQuestionNo(),
            'questionTypes' => $this->getQuestionTypes(),
        ];

        return view(
            'admin/manageratingquestion_form',
            $data
        );
    }

    /**
     * Update Existing Question - FIXED VERSION
     */
    public function update($id)
    {
        $id = (int) $id;

        if ($id <= 0) {
            return redirect()
                ->to(base_url('admin/ratingquestion'))
                ->with('error', 'Invalid question ID.');
        }

        // Check existing question
        $existingQuestion = $this->ratingQuestionModel->find($id);

        if (!$existingQuestion) {
            return redirect()
                ->to(base_url('admin/ratingquestion'))
                ->with('error', 'Question not found.');
        }

        // Get POST data
        $questionNo  = trim((string) $this->request->getPost('question_no'));
        $question    = trim((string) $this->request->getPost('question'));
        $questionType = trim((string) $this->request->getPost('question_type'));

        // Basic validation
        if ($questionNo === '' || !is_numeric($questionNo)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Question number is required and must be numeric.');
        }

        if ($question === '' || strlen($question) < 3) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Question must be at least 3 characters long.');
        }

        $allowedTypes = [
            'select',
            'range',
            'checkbox_group',
            'textarea',
            'text'
        ];

        if (!in_array($questionType, $allowedTypes, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid question type.');
        }

        /*
         * Check duplicate question number.
         * Exclude current question ID.
         */
        $duplicate = $this->ratingQuestionModel
            ->where('question_no', (int) $questionNo)
            ->where('id !=', $id)
            ->first();

        if ($duplicate) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'This question number is already taken.');
        }

        /*
         * Prepare data
         */
        $data = $this->prepareQuestionData($questionType);

        /*
         * FIX: Use the proper CodeIgniter 4 update method
         */
        $result = $this->ratingQuestionModel->update($id, $data);

        if ($result !== false) {
            return redirect()
                ->to(base_url('admin/ratingquestion'))
                ->with('success', 'Question updated successfully!');
        }

        /*
         * Get model/database errors
         */
        $errors = $this->ratingQuestionModel->errors();

        $errorMessage = !empty($errors)
            ? implode(', ', $errors)
            : 'Database update failed. Please check the database connection.';

        return redirect()
            ->back()
            ->withInput()
            ->with('error', $errorMessage);
    }

    /**
     * Delete Question
     */
    public function delete($id)
    {
        $id = (int) $id;

        if ($id <= 0) {
            $this->session->setFlashdata(
                'error',
                'Invalid question ID.'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        $question = $this->ratingQuestionModel->find($id);

        if (!$question) {
            $this->session->setFlashdata(
                'error',
                'Question not found.'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        if ($this->ratingQuestionModel->delete($id)) {
            $this->session->setFlashdata(
                'success',
                'Question deleted successfully!'
            );
        } else {
            $this->session->setFlashdata(
                'error',
                'Failed to delete question.'
            );
        }

        return redirect()->to(
            base_url('admin/ratingquestion')
        );
    }

    /**
     * View Question
     */
    public function view($id)
    {
        $id = (int) $id;

        $question = $this->ratingQuestionModel->find($id);

        if (!$question) {
            $this->session->setFlashdata(
                'error',
                'Question not found.'
            );

            return redirect()->to(
                base_url('admin/ratingquestion')
            );
        }

        $question['options'] = $this->decodeJsonArray(
            $question['options'] ?? null
        );

        $question['option_ratings'] = $this->decodeJsonArray(
            $question['option_ratings'] ?? null
        );

        $data = [
            'title' => 'View Question',
            'question' => $question,
            'viewMode' => true,
        ];

        return view(
            'admin/manageratingquestion_view',
            $data
        );
    }

    /**
     * Toggle Question Status
     */
    public function toggleStatus($id)
    {
        $id = (int) $id;

        $question = $this->ratingQuestionModel->find($id);

        if (!$question) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Question not found.',
            ]);
        }

        if ($this->ratingQuestionModel->toggleStatus($id)) {
            $newStatus = ((int) $question['status'] === 1)
                ? 0
                : 1;

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status toggled successfully!',
                'new_status' => $newStatus,
                'status_text' => $newStatus === 1
                    ? 'Active'
                    : 'Inactive',
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to toggle status.',
        ]);
    }

    /**
     * Update Question Order
     */
    public function updateOrder()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.',
            ]);
        }

        $orders = $this->request->getJSON(true);

        if (empty($orders) || !is_array($orders)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No order data provided.',
            ]);
        }

        if ($this->ratingQuestionModel->updateOrder($orders)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Order updated successfully!',
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update order.',
        ]);
    }

    /**
     * Question Types
     */
    private function getQuestionTypes()
    {
        return [
            'select' => 'Select / Dropdown',
            'range' => 'Range Slider',
            'checkbox_group' => 'Checkbox Group',
            'textarea' => 'Textarea',
            'text' => 'Text Input',
        ];
    }

    /**
     * Validation Rules
     */
    private function getValidationRules($questionType)
    {
        $rules = [
            'question_no' => [
                'label' => 'Question Number',
                'rules' => 'required|integer|is_unique[rating_questions.question_no]',
            ],

            'question' => [
                'label' => 'Question',
                'rules' => 'required|min_length[3]',
            ],

            'question_type' => [
                'label' => 'Question Type',
                'rules' => 'required|in_list[select,range,checkbox_group,textarea,text]',
            ],

            'status' => [
                'label' => 'Status',
                'rules' => 'permit_empty|in_list[0,1]',
            ],

            'sort_order' => [
                'label' => 'Sort Order',
                'rules' => 'permit_empty|integer',
            ],
        ];

        if (
            $questionType === 'select' ||
            $questionType === 'checkbox_group'
        ) {
            $rules['options'] = [
                'label' => 'Options',
                'rules' => 'required',
            ];

            $rules['option_ratings'] = [
                'label' => 'Option Ratings',
                'rules' => 'required',
            ];
        }

        if ($questionType === 'range') {
            $rules['min_value'] = [
                'label' => 'Minimum Value',
                'rules' => 'required|integer|less_than[max_value]',
            ];

            $rules['max_value'] = [
                'label' => 'Maximum Value',
                'rules' => 'required|integer|greater_than[min_value]',
            ];
        }

        if ($questionType === 'textarea') {
            $rules['rows'] = [
                'label' => 'Rows',
                'rules' => 'permit_empty|integer|greater_than[0]',
            ];
        }

        return $rules;
    }

    /**
     * Prepare Insert / Update Data
     */
    private function prepareQuestionData($questionType)
    {
        $data = [
            'question_no' => (int) $this->request->getPost('question_no'),

            'question' => trim(
                (string) $this->request->getPost('question')
            ),

            'question_type' => $questionType,

            'status' => $this->request->getPost('status') !== null
                ? (int) $this->request->getPost('status')
                : 1,

            'sort_order' => $this->request->getPost('sort_order') !== null
                ? (int) $this->request->getPost('sort_order')
                : 0,

            'placeholder' => trim(
                (string) $this->request->getPost('placeholder')
            ),

            'rows' => $this->request->getPost('rows') !== null
                ? (int) $this->request->getPost('rows')
                : 3,

            /*
             * Default values.
             * These are intentionally reset when question type changes.
             */
            'options' => null,
            'option_ratings' => null,
            'min_value' => null,
            'max_value' => null,
        ];

        /*
         * Select / Checkbox Group
         */
        if (
            $questionType === 'select' ||
            $questionType === 'checkbox_group'
        ) {
            $options = $this->request->getPost('options');
            $optionRatings = $this->request->getPost('option_ratings');

            if (!is_array($options)) {
                $options = [];
            }

            if (!is_array($optionRatings)) {
                $optionRatings = [];
            }

            $cleanOptions = [];
            $cleanRatings = [];

            foreach ($options as $index => $option) {
                $option = trim((string) $option);

                if ($option === '') {
                    continue;
                }

                $cleanOptions[] = $option;

                /*
                 * Keep rating index synchronized with option index.
                 */
                $rating = $optionRatings[$index] ?? 0;

                if ($rating === '' || $rating === null) {
                    $rating = 0;
                }

                $cleanRatings[] = (int) $rating;
            }

            $data['options'] = json_encode(
                $cleanOptions,
                JSON_UNESCAPED_UNICODE
            );

            $data['option_ratings'] = json_encode(
                $cleanRatings,
                JSON_UNESCAPED_UNICODE
            );
        }

        /*
         * Range
         */
        elseif ($questionType === 'range') {
            $data['min_value'] = (int) $this->request->getPost(
                'min_value'
            );

            $data['max_value'] = (int) $this->request->getPost(
                'max_value'
            );
        }

        /*
         * Text / Textarea
         * options and range values remain NULL.
         */
        else {
            $data['options'] = null;
            $data['option_ratings'] = null;
            $data['min_value'] = null;
            $data['max_value'] = null;
        }

        return $data;
    }

    /**
     * Decode JSON safely
     */
    private function decodeJsonArray($value)
    {
        if (empty($value)) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        $decoded = json_decode($value, true);

        return is_array($decoded)
            ? $decoded
            : [];
    }
}