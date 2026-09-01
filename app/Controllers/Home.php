<?php
namespace App\Controllers;
use App\Models\MlaModel;
class Home extends BaseController
{
    public function index()
    {
        $mlaModel = new MlaModel();
        $mlas = $mlaModel->getPublicMlas();
        

        //Top Rated MLAs Sort Data on the basis of rating_score in descending order
        usort($mlas, static function (array $first, array $second): int {
            return ($second['rating_score'] ?? 0) <=> ($first['rating_score'] ?? 0);
        });

        return view('index', [
            'top_rated_mlas' => array_slice($mlas, 0, 5),
        ]);
    }

    public function leadership()
    {
        return view('leadership');
    }

    public function mla()
    {
        $mlaModel = new MlaModel();

        $data['mlas'] = $mlaModel->getPublicMlas();

        return view('mla', $data);
    }

    public function mla_bkup()
    {
        $mlaModel = new MlaModel();

        $data['mlas'] = $mlaModel
            ->where('status', 'Active')
            ->orderBy('mla_name', 'ASC')
            ->findAll();

        return view('mla_bkup', $data);
    }
}
