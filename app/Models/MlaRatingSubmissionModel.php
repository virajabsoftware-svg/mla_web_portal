<?php

namespace App\Models;

use CodeIgniter\Model;

class MlaRatingSubmissionModel extends Model
{
    protected $table = 'mla_rating_submissions';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'form_version',
        'submitted_at',
        'page_url',
        'elapsed_seconds',

        // MLA Details
        'mla_id',
        'constituency',
        'mla_name',

        // Rating Details
        'overall_rating',
        'manifesto_fulfilled',

        // Respondent Details
        'locality',
        'respondent_name',
        'mobile_number',
        'pin_code',

        'question_data',
        'consent'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
