<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;
use App\Models\User\VoterModel;
use App\Models\FeedbackCategoryModel;
use Config\Database;

class FeedbackApi extends BaseController
{
    protected $feedbackModel;
    protected $categoryModel;
    protected $voterModel;
    protected $db;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->categoryModel = new FeedbackCategoryModel();
        $this->voterModel = new VoterModel();
        $this->db = Database::connect();
    }

    // =====================================================
    // COMMON JSON RESPONSE
    // =====================================================

    private function jsonResponse($status, $message, $data = null, $code = 200)
    {
        return $this->response
            ->setStatusCode($code)
            ->setJSON([
                'status'  => $status,
                'message' => $message,
                'data'    => $data
            ]);
    }

    // =====================================================
    // VOTER TOKEN AUTHENTICATION
    // =====================================================

    private function getAuthenticatedVoter()
    {
        try {
            $authHeader = trim(
                $this->request->getHeaderLine('Authorization')
            );

            if ($authHeader === '') {
                return null;
            }

            if (!preg_match('/^Bearer\s+(\S+)$/i', $authHeader, $matches)) {
                return null;
            }

            $token = trim($matches[1]);

            $voter = $this->db->table('voters')
                ->where('api_token', $token)
                ->get()
                ->getRowArray();

            if (!$voter) {
                return null;
            }

            // Expiry check only when expiry is present
            if (!empty($voter['token_expiry'])) {
                $expiry = strtotime($voter['token_expiry']);

                if ($expiry === false || $expiry <= time()) {
                    return null;
                }
            }

            if (strtolower(trim($voter['status'] ?? '')) !== 'approved') {
                return null;
            }

            return $voter;

        } catch (\Throwable $e) {
            log_message('error', 'Voter Auth: ' . $e->getMessage());
            return null;
        }
    }

    // =====================================================
    // 1. ADD FEEDBACK - VOTER
    // POST: api/feedback/add
    // =====================================================

    public function add()
    {
        $voter = $this->getAuthenticatedVoter();

        if (!$voter) {
            return $this->jsonResponse(
                false,
                'Invalid or expired token. Please login again.',
                null,
                401
            );
        }

        $input = $this->request->getJSON(true);

        if (!is_array($input)) {
            $input = $this->request->getPost();
        }

        $rules = [
            'village'     => 'required',
            'category_id' => 'required|integer',
            'description' => 'required'
        ];

        if (!$this->validateData($input, $rules)) {
            return $this->jsonResponse(
                false,
                'Validation failed',
                $this->validator->getErrors(),
                422
            );
        }

        $category = $this->categoryModel
            ->where('id', $input['category_id'])
            ->where('status', 1)
            ->first();

        if (!$category) {
            return $this->jsonResponse(
                false,
                'Category not found or inactive',
                null,
                404
            );
        }

        try {
            $feedbackId = $this->feedbackModel->generateFeedbackId(
                $voter['voter_id']
            );

            $attachmentName = null;
            $file = $this->request->getFile('attachment');

            if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {

                if (!$file->isValid() || $file->hasMoved()) {
                    return $this->jsonResponse(
                        false,
                        'Invalid attachment',
                        null,
                        422
                    );
                }

                $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];

                if (!in_array(
                    strtolower($file->getExtension()),
                    $allowedTypes,
                    true
                )) {
                    return $this->jsonResponse(
                        false,
                        'Only JPG, JPEG, PNG and PDF files are allowed',
                        null,
                        422
                    );
                }

                if ($file->getSizeByUnit('mb') > 5) {
                    return $this->jsonResponse(
                        false,
                        'Attachment size must be 5 MB or less',
                        null,
                        422
                    );
                }

                $uploadPath = WRITEPATH . 'uploads/feedback/';

                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }

                $attachmentName = $file->getRandomName();
                $file->move($uploadPath, $attachmentName);
            }

            $feedbackData = [
                'feedback_id'  => $feedbackId,
                'voter_id'     => $voter['voter_id'],
                'user_id'      => $voter['id'],
                'mla_id'       => $voter['mla_id'] ?? null,
                'work_id'      => $input['work_id'] ?? null,
                'district'     => $voter['district'] ?? null,
                'constituency' => $voter['constituency'] ?? null,
                'village'      => trim($input['village']),
                'category_id'  => $category['id'],
                'category'     => $category['category_name'],
                'source'       => 'App',
                'description'  => trim($input['description']),
                'attachment'   => $attachmentName,
                'status'       => 'Pending',
                'submitted_at' => date('Y-m-d H:i:s')
            ];

            $insertId = $this->feedbackModel->insert($feedbackData);

            if (!$insertId) {
                return $this->jsonResponse(
                    false,
                    'Feedback could not be saved',
                    $this->feedbackModel->errors(),
                    500
                );
            }

            return $this->jsonResponse(
                true,
                'Feedback added successfully',
                $this->feedbackModel->find($insertId),
                201
            );

        } catch (\Throwable $e) {
            log_message('error', 'Feedback Add API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Error while saving feedback',
                null,
                500
            );
        }
    }

    // =====================================================
    // 2. VOTER FEEDBACK LIST WITH PAGINATION
    // GET: api/feedback/list
    // =====================================================

    public function listing()
    {
        $voter = $this->getAuthenticatedVoter();

        if (!$voter) {
            return $this->jsonResponse(
                false,
                'Invalid or expired token. Please login again.',
                null,
                401
            );
        }

        try {
            $page = max(1, (int) ($this->request->getGet('page') ?? 1));
            $limit = (int) ($this->request->getGet('limit') ?? 10);
            $limit = max(1, min($limit, 100));
            $offset = ($page - 1) * $limit;

            $builder = $this->db->table('feedback');
            $builder->where('voter_id', $voter['voter_id']);

            $categoryId = $this->request->getGet('category_id');
            $village = $this->request->getGet('village');
            $status = $this->request->getGet('status');

            if ($categoryId !== null && $categoryId !== '') {
                $builder->where('category_id', $categoryId);
            }

            if ($village !== null && $village !== '') {
                $builder->where('village', $village);
            }

            if ($status !== null && $status !== '') {
                $builder->where('status', $status);
            }

            $countBuilder = clone $builder;
            $totalRecords = $countBuilder->countAllResults();

            $feedbacks = $builder
                ->orderBy('id', 'DESC')
                ->get($limit, $offset)
                ->getResultArray();

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Feedback list fetched successfully',
                'data'    => $feedbacks,
                'pagination' => [
                    'current_page'  => $page,
                    'per_page'      => $limit,
                    'total_records' => $totalRecords,
                    'total_pages'   => (int) ceil($totalRecords / $limit)
                ]
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Feedback List API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Unable to fetch feedback list',
                null,
                500
            );
        }
    }

    // =====================================================
    // 3. UPDATE VOTER FEEDBACK
    // PUT: api/feedback/update/{id}
    // =====================================================

    public function update($id = null)
    {
        $voter = $this->getAuthenticatedVoter();

        if (!$voter) {
            return $this->jsonResponse(
                false,
                'Invalid or expired token. Please login again.',
                null,
                401
            );
        }

        if (!is_numeric($id) || (int) $id <= 0) {
            return $this->jsonResponse(
                false,
                'Invalid feedback ID',
                null,
                400
            );
        }

        $feedback = $this->feedbackModel
            ->where('id', $id)
            ->where('voter_id', $voter['voter_id'])
            ->first();

        if (!$feedback) {
            return $this->jsonResponse(
                false,
                'Feedback not found or unauthorized',
                null,
                404
            );
        }

        $input = $this->request->getJSON(true);

        if (!is_array($input)) {
            $input = $this->request->getRawInput();
        }

        $updateData = [];

        if (isset($input['village'])) {
            if (trim($input['village']) === '') {
                return $this->jsonResponse(
                    false,
                    'Village cannot be empty',
                    null,
                    422
                );
            }

            $updateData['village'] = trim($input['village']);
        }

        if (isset($input['description'])) {
            if (trim($input['description']) === '') {
                return $this->jsonResponse(
                    false,
                    'Description cannot be empty',
                    null,
                    422
                );
            }

            $updateData['description'] = trim($input['description']);
        }

        if (isset($input['category_id'])) {
            $category = $this->categoryModel
                ->where('id', $input['category_id'])
                ->where('status', 1)
                ->first();

            if (!$category) {
                return $this->jsonResponse(
                    false,
                    'Category not found or inactive',
                    null,
                    404
                );
            }

            $updateData['category_id'] = $category['id'];
            $updateData['category'] = $category['category_name'];
        }

        if (empty($updateData)) {
            return $this->jsonResponse(
                false,
                'No valid fields provided for update',
                null,
                400
            );
        }

        try {
            $updated = $this->feedbackModel->update(
                $feedback['id'],
                $updateData
            );

            if (!$updated) {
                return $this->jsonResponse(
                    false,
                    'Feedback update failed',
                    $this->feedbackModel->errors(),
                    500
                );
            }

            return $this->jsonResponse(
                true,
                'Feedback updated successfully',
                $this->feedbackModel->find($feedback['id'])
            );

        } catch (\Throwable $e) {
            log_message('error', 'Feedback Update API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Error while updating feedback',
                null,
                500
            );
        }
    }

    // =====================================================
    // 4. DELETE VOTER FEEDBACK
    // DELETE: api/feedback/delete/{id}
    // =====================================================

    public function delete($id = null)
    {
        $voter = $this->getAuthenticatedVoter();

        if (!$voter) {
            return $this->jsonResponse(
                false,
                'Invalid or expired token. Please login again.',
                null,
                401
            );
        }

        if (!is_numeric($id) || (int) $id <= 0) {
            return $this->jsonResponse(
                false,
                'Invalid feedback ID',
                null,
                400
            );
        }

        $feedback = $this->feedbackModel
            ->where('id', $id)
            ->where('voter_id', $voter['voter_id'])
            ->first();

        if (!$feedback) {
            return $this->jsonResponse(
                false,
                'Feedback not found or unauthorized',
                null,
                404
            );
        }

        try {
            $deleted = $this->feedbackModel->delete($feedback['id']);

            if (!$deleted) {
                return $this->jsonResponse(
                    false,
                    'Feedback delete failed',
                    null,
                    500
                );
            }

            if (!empty($feedback['attachment'])) {
                $filePath = WRITEPATH . 'uploads/feedback/' .
                    $feedback['attachment'];

                if (is_file($filePath)) {
                    unlink($filePath);
                }
            }

            return $this->jsonResponse(
                true,
                'Feedback deleted successfully',
                null
            );

        } catch (\Throwable $e) {
            log_message('error', 'Feedback Delete API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Error while deleting feedback',
                null,
                500
            );
        }
    }

    // =====================================================
    // 5. FEEDBACK CATEGORIES
    // GET: api/feedback/categories
    // =====================================================

    public function categories()
    {
        try {
            $categories = $this->categoryModel
                ->select('id, category_name')
                ->where('status', 1)
                ->orderBy('category_name', 'ASC')
                ->findAll();

            return $this->jsonResponse(
                true,
                'Feedback categories fetched successfully',
                $categories
            );

        } catch (\Throwable $e) {
            log_message('error', 'Feedback Categories API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Unable to fetch feedback categories',
                null,
                500
            );
        }
    }

    // =====================================================
    // 6. MLA FEEDBACK LIST + SEARCH + STATUS + PAGINATION
    // GET: api/mla/feedback/list
    // =====================================================

    public function mlaListing()
    {
        // MlaToken filter मधून authenticated MLA
        $mla = $this->request->mla ?? null;

        if (!$mla) {
            return $this->jsonResponse(
                false,
                'MLA authentication required',
                null,
                401
            );
        }

        try {
            $mlaId = $mla['id'];

            $page = max(1, (int) ($this->request->getGet('page') ?? 1));
            $limit = (int) ($this->request->getGet('limit') ?? 10);
            $limit = max(1, min($limit, 100));
            $offset = ($page - 1) * $limit;

            $search = trim($this->request->getGet('search') ?? '');
            $status = trim($this->request->getGet('status') ?? '');
            $categoryId = $this->request->getGet('category_id');
            $village = trim($this->request->getGet('village') ?? '');

            $builder = $this->db->table('feedback');

            // फक्त Login केलेल्या MLA चे feedback
            $builder->where('mla_id', $mlaId);

            // Search filters
            if ($search !== '') {
                $builder->groupStart()
                    ->like('feedback_id', $search)
                    ->orLike('voter_id', $search)
                    ->orLike('village', $search)
                    ->orLike('category', $search)
                    ->orLike('description', $search)
                    ->groupEnd();
            }

            // Status filter
            if ($status !== '') {
                $builder->where('status', $status);
            }

            // Category filter
            if ($categoryId !== null && $categoryId !== '') {
                $builder->where('category_id', $categoryId);
            }

            // Village filter
            if ($village !== '') {
                $builder->where('village', $village);
            }

            // Count before pagination
            $countBuilder = clone $builder;
            $totalRecords = $countBuilder->countAllResults();

            // Fetch MLA feedback
            $feedbacks = $builder
                ->orderBy('id', 'DESC')
                ->get($limit, $offset)
                ->getResultArray();

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'MLA feedback list fetched successfully',
                'mla_id'  => $mlaId,
                'data'    => $feedbacks,
                'filters' => [
                    'search'      => $search,
                    'status'      => $status,
                    'category_id' => $categoryId,
                    'village'     => $village
                ],
                'pagination' => [
                    'current_page'  => $page,
                    'per_page'      => $limit,
                    'total_records' => $totalRecords,
                    'total_pages'   => (int) ceil($totalRecords / $limit)
                ]
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'MLA Feedback List API: ' . $e->getMessage());

            return $this->jsonResponse(
                false,
                'Unable to fetch MLA feedback list',
                null,
                500
            );
        }
    }
}
