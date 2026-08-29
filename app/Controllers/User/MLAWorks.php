<?php
namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MlaDevelopmentWorkImageModel;
use App\Models\MlaDevelopmentWorkModel;


class MLAWorks extends BaseController
{
    public function index()
    {

        $userId = session()->get('user_id');

        $voter = db_connect()->table('voters')->select('mla_id')->where('id', $userId)->get()->getRowArray();

        $mlaId = $voter['mla_id'] ?? null;

        $filters = ['search' => trim((string) $this->request->getGet('search')), 
        'status' => trim((string) $this->request->getGet('status')),
        'category' => trim((string) $this->request->getGet('category'))];
        $model = new MlaDevelopmentWorkModel();
        $works = $model->getFilteredWorks($mlaId, $filters)->paginate(10, 'works');

        
        $images = (new MlaDevelopmentWorkImageModel())->getImagesByWorkIds(array_column($works, 'id'));
        foreach ($works as &$work) $work['images'] = $images[$work['id']] ?? [];
        unset($work);

        $statuses = $model->getStatusOptions();
        $categories = $model->getCategoryOptions();

        return view('user/mla_works', ['works' => $works, 'pager' => $model->pager, 
        'filters' => $filters, 'statuses' => $statuses,
         'categories' => $categories]);
    }
}


