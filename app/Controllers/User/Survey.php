<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\SurveyResponseModel;

class Survey extends BaseController
{

    protected $surveyModel;
    protected $db;


    public function __construct()
    {
        $this->surveyModel = new SurveyResponseModel();
        $this->db = \Config\Database::connect();
    }



    public function index()
    {

        // active surveys
        // $data['activeSurveys'] = $this->db
        //     ->table('surveys')
        //     ->where('status','Active')
        //     ->get()
        //     ->getResultArray();

       $data['mlaSurveyCount'] = $this->db
    ->table('survey_responses sr')
    ->select('m.mla_name, m.mla_code, COUNT(sr.id) as total_surveys')
    ->join('mlas m', 'm.mla_code = sr.mla_id', 'left')
    ->groupBy(['m.mla_code', 'm.mla_name'])
    ->orderBy('total_surveys', 'DESC')
    ->get()
    ->getResultArray();

        // history
        $data['responses'] = $this->surveyModel->getHistory();



        return view('user/survey',$data);

    }





    public function save()
    {


        $surveyId = $this->request->getPost('survey_id');



        // get survey details
        $survey = $this->db
            ->table('surveys')
            ->where('id',$surveyId)
            ->get()
            ->getRowArray();



        $data=[

            'survey_id'=>$surveyId,

            'survey_title'=>$survey['title'] ?? '',

            'survey_category'=>$this->request->getPost('survey_category'),

            'voter_id'=>$this->request->getPost('voter_id'),

            'mla_id'=>$this->request->getPost('mla_id'),

            'district'=>$this->request->getPost('district'),

            'constituency'=>$this->request->getPost('constituency'),

            'village'=>$this->request->getPost('village'),

            'answers'=>$this->request->getPost('answers'),

            'submitted_at'=>date('Y-m-d H:i:s')

        ];
        




        if($this->surveyModel->insert($data))
        {


            return $this->response->setJSON([

                'status'=>true,

                'message'=>'Survey submitted successfully'

            ]);

        }


        return $this->response->setJSON([

            'status'=>false,

            'message'=>'Database insert failed'

        ]);

    }



}