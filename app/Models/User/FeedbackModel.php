<?php

namespace App\Models\User;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'feedback_id',
        'voter_id',
        'user_id',
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
        'submitted_at'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    /**
     * =========================================================
     * GENERATE FEEDBACK ID
     * =========================================================
     */
    public function generateFeedbackId($voterId)
    {
        $count = $this
            ->where('voter_id', $voterId)
            ->countAllResults();

        $nextNumber = $count + 1;

        return 'FDB-' . $voterId . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    /**
     * =========================================================
     * GLOBAL FEEDBACK STATISTICS
     * =========================================================
     */
    public function getFeedbackStatistics()
    {
        return [
            'total' => $this->countAll(),

            'pending' => $this
                ->where('status', 'Pending')
                ->countAllResults(),

            'resolved' => $this
                ->where('status', 'Resolved')
                ->countAllResults(),

            'under_review' => $this
                ->where('status', 'Under Review')
                ->countAllResults(),

            'reviewed' => $this
                ->where('status', 'Reviewed')
                ->countAllResults(),

            'rejected' => $this
                ->where('status', 'Rejected')
                ->countAllResults(),
        ];
    }

    /**
     * =========================================================
     * MLA WISE FEEDBACK COUNT
     *
     * MLA information comes from mlas table.
     * Feedback counts come from feedback table.
     *
     * Every MLA will be displayed even if feedback count = 0.
     * =========================================================
     */
    public function getMLAFeedbackCount()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('mlas');
        $builder->select("
            mlas.id,
            mlas.mla_code,
            mlas.mla_name,
            constituencies.constituency_name,
            COUNT(feedback.id) AS total,
            SUM(CASE WHEN feedback.status = 'Pending' THEN 1 ELSE 0 END) AS pending,
            SUM(CASE WHEN feedback.status = 'Resolved' THEN 1 ELSE 0 END) AS resolved,
            SUM(CASE WHEN feedback.status = 'Under Review' THEN 1 ELSE 0 END) AS under_review,
            SUM(CASE WHEN feedback.status = 'Reviewed' THEN 1 ELSE 0 END) AS reviewed
        ");

        $builder->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left');
        
        // Join feedback on mla_id
        $builder->join('feedback', 'feedback.mla_id = mlas.id', 'left');

        $builder->groupBy([
            'mlas.id',
            'mlas.mla_code',
            'mlas.mla_name',
            'constituencies.constituency_name'
        ]);

        $builder->orderBy('mlas.mla_name', 'ASC');

        $query = $builder->get();
        $results = $query->getResultArray();

        // Convert null to 0 for counts
        foreach ($results as &$row) {
            $row['total'] = (int) ($row['total'] ?? 0);
            $row['pending'] = (int) ($row['pending'] ?? 0);
            $row['resolved'] = (int) ($row['resolved'] ?? 0);
            $row['under_review'] = (int) ($row['under_review'] ?? 0);
            $row['reviewed'] = (int) ($row['reviewed'] ?? 0);
        }

        return $results;
    }

    /**
     * Get feedback statistics for a specific MLA
     */
    public function getMLAFeedbackStats($mlaId)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('feedback');
        $builder->select("
            COUNT(*) AS total,
            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending,
            SUM(CASE WHEN status = 'Resolved' THEN 1 ELSE 0 END) AS resolved,
            SUM(CASE WHEN status = 'Under Review' THEN 1 ELSE 0 END) AS under_review,
            SUM(CASE WHEN status = 'Reviewed' THEN 1 ELSE 0 END) AS reviewed
        ");

        $builder->where('mla_id', $mlaId);

        $query = $builder->get();
        $result = $query->getRowArray();

        return [
            'total' => (int) ($result['total'] ?? 0),
            'pending' => (int) ($result['pending'] ?? 0),
            'resolved' => (int) ($result['resolved'] ?? 0),
            'under_review' => (int) ($result['under_review'] ?? 0),
            'reviewed' => (int) ($result['reviewed'] ?? 0),
        ];
    }
}