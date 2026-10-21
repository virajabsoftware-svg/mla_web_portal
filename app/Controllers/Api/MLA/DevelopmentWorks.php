<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\MlaDevelopmentWorkModel;

class DevelopmentWorks extends BaseController
{
    public function recentWorks()
{
    $mlaModel = new MlaModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);


    $mla = $mlaModel
        ->where('api_token', $token)
        ->first();

    if (!$mla) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid MLA token.'
        ]);
    }


    $workModel = new MlaDevelopmentWorkModel();

    $recentWorks = $workModel->getRecentWorks($mla['id']);


  return $this->response->setJSON([
      'status' => true,
      'mla_id' => $mla['id'],
      'recent_works' => $recentWorks
  ]);
}
}