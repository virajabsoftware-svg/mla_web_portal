<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\SurveyModel;
use App\Models\User\SurveyQuestionModel;
use App\Models\User\SurveyQuestionOptionModel;
use App\Models\User\SurveyResponseModel;
use App\Models\User\SurveyResponseAnswerModel;
use Config\Database;

class Survey extends BaseController
{
    public function surveyList()
    {
       $voter = $this->request->voter;

      if (!$voter) {
          return $this->respond([
              'status'  => false,
              'message' => 'Unauthorized'
          ], 401);
      }

      $surveyModel = new SurveyModel();

      $surveys = $surveyModel->getSurveyList();

      return $this->response->setJSON([
          'status' => true,
          'data'   => $surveys
      ]);
    }

    public function surveyQuestions()
    {
        $voter = $this->request->voter;

        if (!$voter) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Unauthorized'
            ])->setStatusCode(401);
        }

        $surveyId = (int) $this->request->getGet('survey_id');

        if ($surveyId <= 0) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey ID is required'
            ]);
        }

        $surveyModel = new SurveyModel();

        $survey = $surveyModel
            ->select('id')
            ->where('id', $surveyId)
            ->first();

        if (!$survey) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey not found'
            ]);
        }

        $questionModel = new SurveyQuestionModel();
        $optionModel   = new SurveyQuestionOptionModel();

        $questions = $questionModel->getQuestions($surveyId);

        foreach ($questions as &$question) {

            $question['options'] = $optionModel->getOptions(
                $question['id']
            );
        }

        return $this->response->setJSON([
            'status'    => true,
            'message'=>'Survey Question and Answer fetched successfully.',
            'survey_id' => $surveyId,
            'questions' => $questions
        ]);
    }

    public function submitSurvey()
    {
       $voter = $this->request->voter;
       
        if (!$voter) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Unauthorized'
            ])->setStatusCode(401);
        }

        $json = $this->request->getJSON(true);

        $surveyId = (int) ($json['survey_id'] ?? 0);
        $answers  = $json['answers'] ?? [];
        $overallPercentage = $json['overall_percentage'] ?? 0;

        if ($surveyId <= 0) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey ID is required'
            ]);
        }

        if (empty($answers) || !is_array($answers)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey answers are required'
            ]);
        }

        $surveyResponseModel = new SurveyResponseModel();

        $alreadySubmitted = $surveyResponseModel
            ->where('survey_id', $surveyId)
            ->where('voter_id', $voter['id'])
            ->first();

        if ($alreadySubmitted) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'You have already submitted this survey.'
            ]);
        }

        $db = Database::connect();

        $db->transStart();

        $surveyModel = new SurveyModel();

        $survey = $surveyModel
            ->where('id', $surveyId)
            ->first();

        if (!$survey) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey not found'
            ]);
        }
        $answerJson = [];

        foreach ($answers as $answer) {
            $answerJson[$answer['question_id']] = $answer['answers_id'];
        }

        $responseData = [
            'survey_id'        => $surveyId,
            'voter_id'         => $voter['id'],
            'mla_id'           => $voter['mla_id'] ?? null,
            'district'         => $voter['district'] ?? null,
            'constituency'     => $voter['constituency'] ?? null,
            'village'          => $voter['locality'] ?? null,
            'survey_category'  => $survey['survey_category'] ?? null,
            'answers'          => json_encode($answerJson),
            'overall_percentage' => $overallPercentage,
            'status'           => 'Submitted'
        ];

        $surveyResponseModel->insert($responseData);

        $responseId = $surveyResponseModel->getInsertID();

        if (!$responseId) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to submit survey'
            ]);
        }

        $questionModel = new SurveyQuestionModel();
        $optionModel   = new SurveyQuestionOptionModel();
        $responseAnswerModel = new SurveyResponseAnswerModel();
        

        foreach ($answers as $answer) {

            $question = $questionModel
                ->where('id', $answer['question_id'])
                ->where('survey_id', $surveyId)
                ->first();

            if (!$question) {
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Invalid question selected.'
                ]);
            }

            $option = $optionModel
                ->where('id', $answer['answers_id'])
                ->where('question_id', $answer['question_id'])
                ->where('is_active', 1)
                ->first();

            if (!$option) {
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Invalid option selected.'
                ]);
            }

            $responseAnswerModel->insert([
                'response_id' => $responseId,
                'survey_id'   => $surveyId,
                'question_id' => $answer['question_id'],
                'answers_id'  => $answer['answers_id']
            ]);
        }
        $db->transComplete();

        if ($db->transStatus() === false) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey submission failed.'
            ]);
        }

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Survey submitted successfully.',
            'response_id' => $responseId
        ]);
    }
}
