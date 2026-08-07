<?php

namespace App\Models\User;

use CodeIgniter\Model;

class MlaRatingModel extends Model
{
    protected $table = 'mla_ratings';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'respondent_name',
        'constituency',
        'question_data',
        'overall_rating',
        'submitted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';

    protected $validationRules = [
        'question_data' => 'required',
        'overall_rating' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[5]'
    ];

    protected $validationMessages = [
        'question_data' => [
            'required' => 'Question data is required'
        ],
        'overall_rating' => [
            'required' => 'Overall rating is required',
            'numeric' => 'Overall rating must be numeric',
            'greater_than_equal_to' => 'Overall rating must be at least 0',
            'less_than_equal_to' => 'Overall rating cannot exceed 5'
        ]
    ];

    /**
     * Insert a new MLA rating submission
     */
    public function insertRating($data)
    {
        try {
            // Ensure question_data is JSON encoded
            if (is_array($data['question_data'])) {
                $data['question_data'] = json_encode($data['question_data'], JSON_UNESCAPED_UNICODE);
            }

            // Set submitted_at if not provided
            if (!isset($data['submitted_at'])) {
                $data['submitted_at'] = date('Y-m-d H:i:s');
            }

            return $this->insert($data);
        } catch (\Exception $e) {
            log_message('error', 'Error inserting MLA rating: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all ratings with optional filtering
     */
    public function getRatings($limit = null, $offset = 0)
    {
        if ($limit !== null) {
            return $this->orderBy('submitted_at', 'DESC')
                ->findAll($limit, $offset);
        }
        return $this->orderBy('submitted_at', 'DESC')
            ->findAll();
    }

    /**
     * Get rating by ID
     */
    public function getRatingById($id)
    {
        $result = $this->find($id);
        if ($result && isset($result['question_data'])) {
            $result['question_data'] = json_decode($result['question_data'], true);
        }
        return $result;
    }

    /**
     * Get average rating
     */
    public function getAverageRating()
    {
        $result = $this->selectAvg('overall_rating as avg_rating')
            ->first();
        return $result ? round($result['avg_rating'], 2) : 0;
    }

    /**
     * Get rating statistics
     */
    public function getStatistics()
    {
        $total = $this->countAll();
        $avg = $this->getAverageRating();

        $ratings = $this->select('overall_rating')
            ->findAll();

        $distribution = [
            'excellent' => 0, // 4.5 - 5.0
            'good' => 0,      // 3.5 - 4.49
            'average' => 0,   // 2.5 - 3.49
            'poor' => 0,      // 0 - 2.49
        ];

        foreach ($ratings as $rating) {
            $score = (float)$rating['overall_rating'];
            if ($score >= 4.5) {
                $distribution['excellent']++;
            } elseif ($score >= 3.5) {
                $distribution['good']++;
            } elseif ($score >= 2.5) {
                $distribution['average']++;
            } else {
                $distribution['poor']++;
            }
        }

        return [
            'total' => $total,
            'average' => $avg,
            'distribution' => $distribution
        ];
    }
}