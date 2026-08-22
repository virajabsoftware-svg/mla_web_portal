<?php

namespace App\Models\User;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    /**
     * Get overall survey statistics
     */
    public function getSurveyStats()
    {
        $db = \Config\Database::connect();

        $totalSurveys = $db->table('surveys')
            ->countAllResults();

        $totalResponses = $db->table('survey_responses')
            ->countAllResults();

        $activeSurveys = $db->table('surveys')
            ->where('status', 'active')
            ->countAllResults();

        return [
            'totalSurveys'   => (int) $totalSurveys,
            'totalResponses' => (int) $totalResponses,
            'activeSurveys'  => (int) $activeSurveys,
        ];
    }

    /**
     * Get MLA-wise survey and response statistics.
     *
     * IMPORTANT:
     * Every MLA from the `mlas` table is returned,
     * even if that MLA has 0 surveys / 0 responses.
     */
    public function getMLAResponseWiseCount()
    {
        $db = \Config\Database::connect();

        /*
         * Start from mlas table so every MLA is displayed.
         *
         * survey_responses.mla_id should contain the MLA id/code
         * used when the survey response is submitted.
         */
        $builder = $db->table('mlas m');

        $builder->select("
            m.id AS mla_id,
            m.mla_code,
            m.mla_name,

            COUNT(DISTINCT sr.survey_id) AS total_surveys,

            COUNT(sr.id) AS total_responses,

            CASE
                WHEN COUNT(DISTINCT sr.survey_id) > 0
                THEN ROUND(
                    COUNT(sr.id) / COUNT(DISTINCT sr.survey_id),
                    2
                )
                ELSE 0
            END AS avg_participation
        ");

        $builder->join(
            'survey_responses sr',
            'sr.mla_id = m.id',
            'left'
        );

        $builder->groupBy([
            'm.id',
            'm.mla_code',
            'm.mla_name'
        ]);

        $builder->orderBy('m.mla_name', 'ASC');

        $results = $builder->get()->getResultArray();

        foreach ($results as &$row) {

            $row['mla_id'] = (int) $row['mla_id'];

            $row['total_surveys'] =
                (int) $row['total_surveys'];

            $row['total_responses'] =
                (int) $row['total_responses'];

            /*
             * Participation percentage.
             *
             * This is calculated safely so it never exceeds 100%.
             */
            if ($row['total_surveys'] > 0) {

                $percentage =
                    ($row['total_responses'] /
                    $row['total_surveys']) * 100;

                $row['avg_participation'] =
                    round(min($percentage, 100), 2);

            } else {

                $row['avg_participation'] = 0;
            }
        }

        return $results;
    }
}