<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\MlaDevelopmentWorkModel;

class DevelopmentWorks extends BaseController
{
    public function developmentWorkList()
    {
        $userModel = new UserModel();

        $token = $this->request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Authorization token is required.'
            ]);
        }

        $token = str_replace('Bearer ', '', $token);

        $voter = $userModel
            ->where('api_token', $token)
            ->first();

        if (!$voter) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid voter token.'
            ]);
        }

        $page = (int) ($this->request->getGet('page') ?? 1);
        $limit = (int) ($this->request->getGet('limit') ?? 20);
        $status = trim($this->request->getGet('status') ?? '');
        $search = trim($this->request->getGet('search') ?? '');

        if ($page < 1) {
            $page = 1;
        }

        if ($limit < 1) {
            $limit = 20;
        }

        $offset = ($page - 1) * $limit;

        $workModel = new MlaDevelopmentWorkModel();

        $developmentWorks = $workModel->getDevelopmentWorkListForVoter(
            (int)$voter['district'],
            (int)$voter['constituency'],
            $limit,
            $offset,
            $status,
            $search
        );

        foreach ($developmentWorks as &$work) {

        $work['images'] = !empty($work['images'])
            ? json_decode($work['images'], true)
            : [];
    }

        return $this->response->setJSON([
            'status'        => true,
            'page'          => $page,
            'limit'         => $limit,
            'status_filter' => $status ?: 'all',
            'search'        => $search,
            'data'          => $developmentWorks,
        ]);
    }
}