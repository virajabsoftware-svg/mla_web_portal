<?php
namespace App\Controllers;
use App\Models\MlaModel;
class Home extends BaseController
{
  

public function index()
{
    $mlaModel = new MlaModel();
$db = \Config\Database::connect();
    // Top 5 Rated MLAs - Existing logic
    $mlas = $mlaModel->getPublicMlas();

    usort($mlas, static function (array $first, array $second): int {
        return ($second['rating_score'] ?? 0) <=> ($first['rating_score'] ?? 0);
    });

    // All MLAs
    $allMlas = $mlaModel->getAllMlasForHome();
    
// $db = \Config\Database::connect();

// District Dropdown Data
$districts = $db->table('districts')
    ->orderBy('district_name', 'ASC')
    ->get()
    ->getResultArray();

    // Party Dropdown Data
// Get All Parties from Database
$parties = $db->table('parties')
    ->orderBy('party_name', 'ASC')
    ->get()
    ->getResultArray();
    // Temporary Debug
$partyCount = count($parties);
$databaseName = $db->getDatabase();

    // Database connection
    // $db = \Config\Database::connect();

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
        'districts' => $districts,
'parties' => $parties,
 'party_count' => $partyCount,
    'database_name' => $databaseName,
 'approved_mla_count' => $approvedMlaCount,
        'total_ratings'      => $totalRatings,
        'districts_covered'  => $districtsCovered,
    ]);
}



   public function leadership()
{
    $mlaModel = new MlaModel();

    // Database मधून Approved / Active MLAs आणि त्यांचे rating data
    $mlas = $mlaModel->getAllMlasForHome();

    // PHP data JavaScript साठी तयार करणे
    $leaderboardMlas = array_map(static function ($mla) {

        return [
            'id' => (int) ($mla['id'] ?? 0),

            'name' => $mla['mla_name'] ?? '',

            'marathiName' => $mla['marathi_name']
                ?? $mla['mla_name']
                ?? '',

            'initials' => strtoupper(
                substr($mla['mla_name'] ?? 'MLA', 0, 2)
            ),

            'district' => $mla['district_name']
                ?? $mla['district']
                ?? '',

            'constituency' => $mla['constituency_name'] ?? '',

            'party' => $mla['party_name']
                ?? $mla['party']
                ?? '',

            // Rating Grade
            'grade' => $mla['rating_grade'] ?? 'Not Rated',

            // Average Rating
            'ratingScore' => (float) ($mla['rating_score'] ?? 0),

            // Total Rating Submissions
            'ratings' => (int) ($mla['ratings'] ?? 0),

            // Manifesto Fulfilled
            'manifestoFulfilled' => (float) (
                $mla['manifesto_percentage'] ?? 0
            ),

            // MLA Profile
            'image' => $mla['profile_photo'] ?? '',

            'firstElected' => $mla['first_elected'] ?? '',

            'age' => $mla['age'] ?? '',

            'education' => $mla['education'] ?? '',

            'profession' => $mla['profession'] ?? '',

            'bio' => $mla['biography'] ?? '',
        ];

    }, $mlas);

    return view('leadership', [
        'leaderboard_mlas' => $leaderboardMlas
    ]);
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
