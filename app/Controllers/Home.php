<?php
namespace App\Controllers;
use App\Models\MlaModel;
class Home extends BaseController
{
  

public function index()
{
    $mlaModel = new MlaModel();

    // Top 5 Rated MLAs - Existing logic
    $mlas = $mlaModel->getPublicMlas();

    usort($mlas, static function (array $first, array $second): int {
        return ($second['rating_score'] ?? 0) <=> ($first['rating_score'] ?? 0);
    });

    // All MLAs
    $allMlas = $mlaModel->getAllMlasForHome();

    // Database connection
    $db = \Config\Database::connect();

    // 1. Approved MLA Count
    $approvedMlaCount = $db->table('mlas')
        ->where('status', 'Approved')
        ->countAllResults();

    // 2. Total Rating Submissions
    $totalRatings = $db->table('mla_rating_submissions')
        ->countAllResults();

    // 3. Unique Districts Covered by Approved MLAs
    $districtResult = $db->table('mlas')
        ->select('COUNT(DISTINCT district_id) AS total_districts', false)
        ->where('status', 'Approved')
        ->where('district_id IS NOT NULL', null, false)
        ->get()
        ->getRowArray();

    $districtsCovered = (int) ($districtResult['total_districts'] ?? 0);

    // Send data to Home Page
    return view('index', [
        'top_rated_mlas'    => array_slice($mlas, 0, 5),
        'all_mlas'          => $allMlas,

        'approved_mla_count' => $approvedMlaCount,
        'total_ratings'      => $totalRatings,
        'districts_covered'  => $districtsCovered,
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
