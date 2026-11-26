<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MlaRatingSubmissionModel;

class MlaRatingSubmission extends BaseController
{
    public function store()
    {
        $request = $this->request;

        // ----------------------------------
        // 1. SPAM PROTECTION
        // ----------------------------------
        if (!empty($request->getPost('website'))) {
            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Submitted successfully',
                    'csrfHash' => csrf_hash()
                ]);
        }

        // ----------------------------------
        // 2. GET QUESTION DATA
        // ----------------------------------
        $questionData = $request->getPost('question_data');

        if (empty($questionData) || !is_string($questionData)) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Question answers are missing.'
                ]);
        }

        // Decode JSON
        $decodedQuestions = json_decode($questionData, true);

        if (
            json_last_error() !== JSON_ERROR_NONE ||
            !is_array($decodedQuestions)
        ) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid question data.'
                ]);
        }

        // ----------------------------------
        // 3. QUESTION SCORE MAPPING
        // ----------------------------------
        $questionScores = [
            'q1'  => ['A' => 100, 'B' => 50, 'C' => 15, 'D' => 0, 'E' => null],
            'q2'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => null],
            'q3'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => null],
            'q4'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => 0, 'E' => null],
            'q5'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => null],
            'q6'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => 0, 'E' => null],
            'q7'  => ['A' => 100, 'B' => 50, 'C' => 25, 'D' => null, 'E' => null],
            'q9'  => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => 0],
            'q10' => ['A' => 100, 'B' => 75, 'C' => 25, 'D' => 0, 'E' => null],
            'q11' => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => null],
            'q12' => ['A' => 100, 'B' => 50, 'C' => 0, 'D' => null],
        ];

        // ----------------------------------
        // 4. CALCULATE OVERALL RATING
        // ----------------------------------
        $totalScore = 0;
        $answeredCount = 0;

        foreach ($questionScores as $question => $options) {

            // Get selected answer from POST
            $answer = $request->getPost($question);

            if (is_array($answer)) {
                $answer = reset($answer);
            }

            $answer = strtoupper(trim((string) $answer));

            if ($answer === '') {
                continue;
            }

            // Handle comma-separated values
            $answerParts = explode(',', $answer);
            $answer = trim($answerParts[0]);

            if (
                array_key_exists($answer, $options) &&
                $options[$answer] !== null
            ) {
                $totalScore += $options[$answer];
                $answeredCount++;
            }
        }

        // Calculate percentage
        $overallPercentage = $answeredCount > 0
            ? $totalScore / $answeredCount
            : 0;

        // Convert percentage into 0-5 rating
        $overallRating = round($overallPercentage / 20, 1);

        // ----------------------------------
        // 5. MANIFESTO FULFILLED
        // Based on Q1 answer
        // ----------------------------------
        $manifestoFulfilled = null;

        $q1Answer = $request->getPost('q1');

        if (is_array($q1Answer)) {
            $q1Answer = reset($q1Answer);
        }

        $q1Answer = strtoupper(trim((string) $q1Answer));

        if (
            $q1Answer !== '' &&
            array_key_exists($q1Answer, $questionScores['q1']) &&
            $questionScores['q1'][$q1Answer] !== null
        ) {
            $manifestoFulfilled = $questionScores['q1'][$q1Answer];
        }

        // ----------------------------------
        // 6. GET MLA ID
        // ----------------------------------
        $mlaId = $request->getPost('mla_id');

        $mlaId = !empty($mlaId) && is_numeric($mlaId)
            ? (int) $mlaId
            : null;

        // ----------------------------------
        // 7. PREPARE DATABASE DATA
        // ----------------------------------
        $data = [

            'form_version' => $request->getPost('form_version'),

            'submitted_at' => date('Y-m-d H:i:s'),

            'page_url' => $request->getPost('page_url'),

            'elapsed_seconds' => (int) $request->getPost('elapsed_seconds'),

            'mla_id' => $mlaId,

            'constituency' => $request->getPost('constituency'),

            'mla_name' => $request->getPost('mla_name'),

            'locality' => $request->getPost('locality'),

            'respondent_name' => $request->getPost('respondent_name'),

            'mobile_number' => $request->getPost('mobile_number'),

            'pin_code' => $request->getPost('pin_code'),

            'overall_rating' => $overallRating,

            'manifesto_fulfilled' => $manifestoFulfilled,

            'question_data' => json_encode(
                $decodedQuestions,
                JSON_UNESCAPED_UNICODE
            )
        ];

        // ----------------------------------
        // 8. SAVE DATABASE
        // ----------------------------------
       // ----------------------------------
//    8. SAVE DATABASE + GENERATE SHARE LINK
//     ----------------------------------
        $model = new MlaRatingSubmissionModel();

try {

   $model->insert($data);
$submissionId = $model->getInsertID();

    if (!$submissionId) {
        throw new \RuntimeException('Rating submission could not be saved.');
    }

    $shareUrl = site_url('app/form/' . $submissionId);

    return $this->response
        ->setStatusCode(200)
        ->setJSON([
            'status' => 'success',
            'message' => 'तुमची उत्तरे यशस्वीरित्या नोंदवली गेली.',
            'submission_id' => $submissionId,
            'share_url' => $shareUrl,
            'overall_rating' => $overallRating,
            'manifesto_fulfilled' => $manifestoFulfilled,
            'csrfHash' => csrf_hash()
        ]);

} catch (\Throwable $e) {

    log_message(
        'error',
        'MLA Rating Save Error: ' . $e->getMessage()
    );

    return $this->response
        ->setStatusCode(500)
        ->setJSON([
            'status' => 'error',
            'message' => 'उत्तरे save करता आली नाहीत.'
        ]);
}
    }
    // ----------------------------------
// SHOW SHARED RATING FORM
// ----------------------------------
public function show($id)
{
    $model = new MlaRatingSubmissionModel();

    // Find submission using unique database ID
    $submission = $model->find($id);

    if (!$submission) {
        return $this->response
            ->setStatusCode(404)
            ->setBody('Rating submission not found.');
    }

    // Decode saved question answers
    $submission['question_data'] = json_decode(
        $submission['question_data'] ?? '[]',
        true
    );

    return view('shared_rating_form', [
        'submission' => $submission
    ]);
}
}
