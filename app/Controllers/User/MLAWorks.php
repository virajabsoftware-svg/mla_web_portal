<?php
namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MlaDevelopmentWorkImageModel;
use App\Models\MlaDevelopmentWorkModel;


class MLAWorks extends BaseController
{
    public function index()
    {
        $filters = ['search' => trim((string) $this->request->getGet('search')), 
        'status' => trim((string) $this->request->getGet('status')),
        'category' => trim((string) $this->request->getGet('category'))];
        $model = new MlaDevelopmentWorkModel();
        $works = $model->getFilteredWorks(session()->get('mla_id'), $filters)->paginate(10, 'works');

        
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
