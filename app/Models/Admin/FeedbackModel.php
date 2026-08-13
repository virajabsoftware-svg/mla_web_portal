<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'feedback_id',
        'voter_id',
        'mla_id',
        'work_id',
        'district',
        'constituency',
        'village',
        'category',
        'source',
        'description',
        'attachment',
        'status',
        'submission_date'
    ];

    /**
     * Get all feedback
     */
    public function getAllFeedback()
    {
        return $this->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get feedback by ID
     */
    public function getFeedbackById($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update feedback status
     */
    public function updateStatus($id, $status)
    {
        return $this->update($id, [
            'status' => $status
        ]);
    }

    /**
     * Get feedback statistics
     */
    public function getStats()
    {
        $total = $this->countAllResults(false);

        $reviewed = $this->where('status', 'reviewed')
                         ->countAllResults();

        $underReview = $this->where('status', 'pending')
                            ->countAllResults();

        $resolved = $this->where('status', 'resolved')
                         ->countAllResults();

        return [
            'total'        => $total,
            'reviewed'     => $reviewed,
            'under_review' => $underReview,
            'resolved'     => $resolved
        ];
    }

    /**
     * Get feedback by status
     */
    public function getByStatus($status)
    {
        return $this->where('status', $status)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Delete feedback
     */
    public function deleteFeedback($id)
    {
        return $this->delete($id);
    }
}