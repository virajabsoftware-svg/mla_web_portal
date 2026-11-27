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
        // 3. QUESTION OPTION SCORE MAPPING
        // ----------------------------------

        $questionOptions = [
            1  => ['A', 'B', 'C', 'D', 'E'],
            2  => ['A', 'B', 'C', 'D'],
            3  => ['A', 'B', 'C', 'D'],
            4  => ['A', 'B', 'C', 'D', 'E'],
            5  => ['A', 'B', 'C', 'D'],
            6  => ['A', 'B', 'C', 'D', 'E'],
            7  => ['A', 'B', 'C', 'D', 'E'],
            8  => ['A', 'B', 'C', 'D'],
            9  => ['A', 'B', 'C', 'D'],
            10 => ['A', 'B', 'C', 'D', 'E'],
            11 => ['A', 'B', 'C', 'D'],
            12 => ['A', 'B', 'C', 'D']
        ];

        // Generate option-wise scores
        $questionScores = [];

        foreach ($questionOptions as $number => $options) {

            $totalOptions = count($options);

            foreach ($options as $index => $option) {

                $questionScores['q' . $number][$option] =
                    round(
                        100 - ($index * (100 / $totalOptions)),
                        2
                    );
            }
        }

        // ----------------------------------
        // 4. NORMALIZE SELECTED ANSWERS
        // ----------------------------------

        // Handles normal and nested answer arrays safely.
        $extractAnswers = function ($value) use (&$extractAnswers) {

            $result = [];

            if (is_array($value)) {

                // If answer is stored inside a named field
                foreach (['value', 'answer', 'option', 'code', 'selected_value'] as $key) {

                    if (isset($value[$key])) {
                        return $extractAnswers($value[$key]);
                    }
                }

                // Otherwise process nested values
                foreach ($value as $item) {
                    $result = array_merge(
                        $result,
                        $extractAnswers($item)
                    );
                }

                return $result;
            }

            if (is_scalar($value)) {

                $answer = strtoupper(trim((string) $value));

                if ($answer !== '') {
                    $result[] = $answer;
                }
            }

            return $result;
        };

        // ----------------------------------
        // 5. CALCULATE Q1 TO Q13 SCORE
        // ----------------------------------

        $totalScore = 0;
        $answeredCount = 0;

        $answersByQuestion = [];

        $q13Found = false;

        foreach ($decodedQuestions as $questionRow) {

            if (!is_array($questionRow)) {
                continue;
            }

            $questionNumber = (int) (
                $questionRow['question_number'] ?? 0
            );

            $selectedAnswers = $questionRow['selected_answers'] ?? [];

            // Extract and normalize answers
            $selectedAnswers = array_values(array_unique(
                $extractAnswers($selectedAnswers)
            ));

            // ----------------------------------
            // Q13 - ANY 3 OPTIONS OUT OF 8
            // ----------------------------------

            if ($questionNumber === 13) {

                if ($q13Found) {

                    return $this->response
                        ->setStatusCode(422)
                        ->setJSON([
                            'status' => 'error',
                            'message' => 'Q13 duplicate question data.'
                        ]);
                }

                $q13Found = true;

                $validQ13Options = [
                    'A', 'B', 'C', 'D',
                    'E', 'F', 'G', 'H'
                ];

                $q13Selected = array_values(
                    array_intersect(
                        $validQ13Options,
                        $selectedAnswers
                    )
                );

                // Exactly 3 unique options required
                if (count($q13Selected) !== 3) {

                    return $this->response
                        ->setStatusCode(422)
                        ->setJSON([
                            'status' => 'error',
                            'message' => 'प्रश्न क्रमांक १३ साठी नेमके ३ पर्याय निवडणे आवश्यक आहे.'
                        ]);
                }

                // Q13 gets 100 marks
                $totalScore += 100;
                $answeredCount++;

                $answersByQuestion[13] = $q13Selected;

                continue;
            }

            // ----------------------------------
            // Q1 TO Q12 SCORING
            // ----------------------------------

            if (!isset($questionOptions[$questionNumber])) {
                continue;
            }

            // Radio questions - one answer
            $validAnswers = array_values(
                array_intersect(
                    $questionOptions[$questionNumber],
                    $selectedAnswers
                )
            );

            $answer = $validAnswers[0] ?? '';

            if ($answer === '') {
                continue;
            }

            $questionKey = 'q' . $questionNumber;

            if (!isset($questionScores[$questionKey][$answer])) {
                continue;
            }

            $score = $questionScores[$questionKey][$answer];

            $totalScore += $score;
            $answeredCount++;

            $answersByQuestion[$questionNumber] = $answer;
        }

        // ----------------------------------
        // Q13 REQUIRED VALIDATION
        // ----------------------------------

        if (!$q13Found) {

            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'प्रश्न क्रमांक १३ चे उत्तर देणे आवश्यक आहे.'
                ]);
        }

        // ----------------------------------
        // 6. FINAL OVERALL RATING
        // ----------------------------------

        $overallPercentage = $answeredCount > 0
            ? $totalScore / $answeredCount
            : 0;

        $overallRating = round(
            $overallPercentage / 20,
            1
        );

        // ----------------------------------
        // 7. MANIFESTO FULFILLED
        // Based on Q1 answer
        // ----------------------------------

        $manifestoFulfilled = null;

        $q1Answer = $answersByQuestion[1] ?? null;

        if (
            $q1Answer !== null &&
            isset($questionScores['q1'][$q1Answer])
        ) {
            $manifestoFulfilled =
                $questionScores['q1'][$q1Answer];
        }

        // ----------------------------------
        // 8. GET MLA ID
        // ----------------------------------

        $mlaId = $request->getPost('mla_id');

        $mlaId = !empty($mlaId) && is_numeric($mlaId)
            ? (int) $mlaId
            : null;

        // ----------------------------------
        // 9. PREPARE DATABASE DATA
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
        // 10. SAVE DATABASE + SHARE LINK
        // ----------------------------------

        $model = new MlaRatingSubmissionModel();

        try {

            $model->insert($data);

            $submissionId = $model->getInsertID();

            if (!$submissionId) {

                throw new \RuntimeException(
                    'Rating submission could not be saved.'
                );
            }

            // Generate share URL
            $shareUrl = site_url(
                'app/form/' . $submissionId
            );

            return $this->response
                ->setStatusCode(200)
                ->setJSON([

                    'status' => 'success',

                    'message' => 'तुमची उत्तरे यशस्वीरित्या नोंदवली गेली.',

                    'submission_id' => $submissionId,

                    'share_url' => $shareUrl,

                    'overall_rating' => $overallRating,

                    'manifesto_fulfilled' => $manifestoFulfilled,

                    'total_score' => round($totalScore, 2),

                    'answered_count' => $answeredCount,

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

        $submission = $model->find($id);

        if (!$submission) {

            return $this->response
                ->setStatusCode(404)
                ->setBody('Rating submission not found.');
        }

        $submission['question_data'] = json_decode(
            $submission['question_data'] ?? '[]',
            true
        );

        return view('shared_rating_form', [
            'submission' => $submission
        ]);
    }
}
