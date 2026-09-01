<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// =====================================================
// FRONTEND - PUBLIC
// =====================================================

$routes->get('/', 'Home::index');
$routes->get('leadership', 'Home::leadership');
$routes->get('mla', 'Home::mla');
$routes->get('mla_bkup', 'Home::mla_bkup');



$routes->group('api',  ['namespace' => 'App\Controllers\Api'],function ($routes) {

        
        $routes->get('master/state', 'Master::state');
        $routes->get('master/district', 'Master::district');
        $routes->get('master/constituency', 'Master::constituency');
        $routes->get('master/survey-categories', 'Master::surveyCategories');

        // Public
        $routes->post('voter/login', 'AuthApi::voterlogin');
        $routes->post('voter/register', 'AuthApi::voterRegister');
        //$routes->get('test', 'AuthApi::test');
        // Protected
        $routes->get('voter/profile','AuthApi::voterprofile',['filter' => 'apiToken']);
        $routes->post('voter/profile-photo','AuthApi::voterProfilePhoto',['filter' => 'apiToken']);
        $routes->post('voter/logout','AuthApi::voterlogout',['filter' => 'apiToken']);
        $routes->get('voter/dashboard','Voter::dashboard',['filter' => 'apiToken']);
        $routes->get('voter/complaints','Voter::complaints',['filter' => 'apiToken']);
        // Public MLA   
        $routes->post('login', 'AuthApi::login');
        $routes->get('profile', 'AuthApi::profile', ['filter' => 'mlaToken']);
        $routes->post('logout', 'AuthApi::logout', ['filter' => 'mlaToken']);
    }
);
// =====================================================
// ADMIN AUTH - PUBLIC
// =====================================================

$routes->group('admin',  ['namespace' => 'App\Controllers\Admin'],
   function ($routes) {

        // Login page
        $routes->get('login','Auth::login');
        // Login submit
        $routes->post('login','Auth::loginCheck' );
        // Logout
        $routes->get('logout','Auth::logout' );
    }
);


// =====================================================
// ADMIN AJAX - PUBLIC
// IMPORTANT
// Registration page uses these routes.
// No admin login required.
// =====================================================

$routes->group('admin', ['namespace' => 'App\Controllers\Admin' ],
    function ($routes) {

        // State -> District
        $routes->get(
            'get-districts/(:num)',
            'ConstituencyManagement::getDistricts/$1'
        );

        // District -> Constituency
        $routes->get(
            'get-constituencies/(:num)',
            'MLAManagement::getConstituencies/$1'
        );
    }
);


// =====================================================
// ADMIN - PROTECTED
// ADMIN LOGIN REQUIRED
// =====================================================

$routes->group(
    'admin',
    [
        'namespace' => 'App\Controllers\Admin',
        'filter'    => 'adminAuth'
    ],
    function ($routes) {


        // =================================================
        // DASHBOARD
        // =================================================

        $routes->get(
            'dashboard',
            'Dashboard::index'
        );


        // =================================================
// SURVEY MANAGEMENT ROUTES
// =================================================

$routes->get('survey-management', 'SurveyManagement::index');
$routes->get('survey-management/data', 'SurveyManagement::dashboardData');
$routes->get('survey-management/get/(:num)', 'SurveyManagement::getSurvey/$1');
$routes->post('survey-management/create', 'SurveyManagement::create');
$routes->post('survey-management/update/(:num)', 'SurveyManagement::update/$1');
$routes->post('survey-management/delete/(:num)', 'SurveyManagement::delete/$1');
$routes->get('survey-management/get-mlas', 'SurveyManagement::getMlas');
$routes->get('survey-management/get-question-types', 'SurveyManagement::getQuestionTypes');
$routes->post('survey-management/add-question', 'SurveyManagement::addQuestion');
$routes->post('survey-management/update-question/(:num)', 'SurveyManagement::updateQuestion/$1');
$routes->post('survey-management/delete-question/(:num)', 'SurveyManagement::deleteQuestion/$1');

        // =================================================
        // MANAGEMENT ROUTES
        // =================================================

        $routes->get(
            'mla-management',
            'MLAManagement::index'
        );

        $routes->get(
            'party-management',
            'PartyManagement::index'
        );

        $routes->get(
            'constituency-management',
            'ConstituencyManagement::index'
        );

        $routes->get(
            'complaint-management',
            'ComplaintManagement::index'
        );

        $routes->post(
            'complaint/save',
            'Complaint::save'
        );

        $routes->get(
            'survey-management',
            'SurveyManagement::index'
        );

        $routes->get(
            'survey-management/data',
            'SurveyManagement::dashboardData'
        );

        $routes->get(
            'media-library',
            'MediaLibrary::index'
        );

        $routes->get(
            'feedback-dashboard',
            'FeedbackDashboard::index'
        );

        $routes->get(
            'activity-logs',
            'ActivityLogs::index'
        );

        $routes->get(
            'voter-management',
            'VoterManagement::index'
        );

        $routes->get(
            'notification-center',
            'NotificationCenter::index'
        );


        // =================================================
        // RATING QUESTION ROUTES
        // =================================================

        $routes->get(
            'ratingquestion',
            'RatingQuestionController::index'
        );

        $routes->get(
            'ratingquestion/create',
            'RatingQuestionController::create'
        );

        $routes->post(
            'ratingquestion/store',
            'RatingQuestionController::store'
        );

        $routes->get(
            'ratingquestion/edit/(:num)',
            'RatingQuestionController::edit/$1'
        );

        $routes->post(
            'ratingquestion/update/(:num)',
            'RatingQuestionController::update/$1'
        );

        $routes->get(
            'ratingquestion/delete/(:num)',
            'RatingQuestionController::delete/$1'
        );

        $routes->get(
            'ratingquestion/view/(:num)',
            'RatingQuestionController::view/$1'
        );

        $routes->get(
            'ratingquestion/toggle-status/(:num)',
            'RatingQuestionController::toggleStatus/$1'
        );

        $routes->post(
            'ratingquestion/update-order',
            'RatingQuestionController::updateOrder'
        );

        $routes->get(
            'ratingquestion/get-questions',
            'RatingQuestionController::getQuestions'
        );

        $routes->post(
            'ratingquestion/clear-cache',
            'RatingQuestionController::clearCache'
        );


        // =================================================
        // MANAGERATINGQUESTION ALIAS
        // =================================================

        $routes->get(
            'manageratingquestion',
            'RatingQuestionController::index'
        );

        $routes->get(
            'manageratingquestion/create',
            'RatingQuestionController::create'
        );

        $routes->post(
            'manageratingquestion/store',
            'RatingQuestionController::store'
        );

        $routes->get(
            'manageratingquestion/edit/(:num)',
            'RatingQuestionController::edit/$1'
        );

        $routes->post(
            'manageratingquestion/update/(:num)',
            'RatingQuestionController::update/$1'
        );

        $routes->get(
            'manageratingquestion/delete/(:num)',
            'RatingQuestionController::delete/$1'
        );

        $routes->get(
            'manageratingquestion/view/(:num)',
            'RatingQuestionController::view/$1'
        );

        $routes->get(
            'manageratingquestion/toggle-status/(:num)',
            'RatingQuestionController::toggleStatus/$1'
        );

        $routes->post(
            'manageratingquestion/update-order',
            'RatingQuestionController::updateOrder'
        );


        // =================================================
        // SEARCH
        // =================================================

        $routes->get(
            'search',
            'Search::index'
        );


        // =================================================
        // CONSTITUENCY MANAGEMENT
        // =================================================

        // NOTE:
        // get-districts is public above.
        // Do NOT add it again here.

        $routes->post(
            'constituency/save',
            'ConstituencyManagement::save'
        );

        $routes->get(
            'constituency/get/(:num)',
            'ConstituencyManagement::getConstituency/$1'
        );

        $routes->post(
            'constituency/update',
            'ConstituencyManagement::update'
        );

        $routes->post(
            'constituency/delete/(:num)',
            'ConstituencyManagement::delete/$1'
        );


        // =================================================
        // MLA MANAGEMENT
        // =================================================

        // NOTE:
        // get-constituencies is public above.
        // Do NOT add it again here.

        $routes->post(
            'mla/save',
            'MLAManagement::save'
        );

        $routes->get(
            'mla/get/(:num)',
            'MLAManagement::get/$1'
        );

        $routes->post(
            'mla/update',
            'MLAManagement::update'
        );

        $routes->get(
            'mla/delete/(:num)',
            'MLAManagement::delete/$1'
        );


        // =================================================
        // PARTY MANAGEMENT
        // =================================================

        $routes->post(
            'party/save',
            'PartyManagement::save'
        );

        $routes->get(
            'party/get/(:num)',
            'PartyManagement::getParty/$1'
        );

        $routes->post(
            'party/update',
            'PartyManagement::update'
        );

        $routes->get(
            'party/delete/(:num)',
            'PartyManagement::delete/$1'
        );
    }
);


// =====================================================
// USER AUTH / REGISTRATION - PUBLIC
// =====================================================

$routes->group(
    'user',
    [
        'namespace' => 'App\Controllers\User'
    ],
    function ($routes) {


        // =================================================
        // LOGIN
        // =================================================

        $routes->get(
            'login',
            'Auth::index'
        );

        $routes->post(
            'login',
            'Auth::login'
        );

        $routes->get(
            'google-login',
            'Auth::googleLogin'
        );

        $routes->get(
            'google-callback',
            'Auth::googleCallback'
        );

        $routes->post(
            'login/check',
            'Auth::loginCheck'
        );


        // =================================================
        // REGISTRATION
        // =================================================

        $routes->post(
            'register',
            'Auth::register'
        );


        // =================================================
        // LOGOUT
        // =================================================

        $routes->get(
            'logout',
            'Auth::logout'
        );


        // =================================================
        // FORGOT PASSWORD
        // =================================================
        /*$routes->get(
            'forgot-password',
            'Auth::forgotPassword'
        );

        $routes->post(
            'forgot-password',
            'Auth::sendResetLink'
        );

        $routes->get(
            'reset-password/(:any)',
            'Auth::resetPassword/$1'
        );

        $routes->post(
            'reset-password',
            'Auth::updatePassword'
        );*/
        // Sam hack
        // Open Forgot Password page
        $routes->get('forgot-password', 'Auth::forgotPassword');
        // Send OTP to registered email
        $routes->post('send-reset-otp', 'Auth::sendResetOtp');
        // Verify OTP
        $routes->post('verify-reset-otp', 'Auth::verifyResetOtp');
        // Reset Password
        $routes->post('reset-password', 'Auth::resetPassword');


        // =================================================
        // REGISTRATION AJAX - PUBLIC
        // =================================================

        $routes->post(
            'check-voter-id',
            'Auth::checkVoterId'
        );

        $routes->get(
            'get-mla/(:num)',
            'Auth::getMla/$1'
        );
    }
);


// =====================================================
// USER - PROTECTED
// USER LOGIN REQUIRED
// =====================================================

$routes->group(
    'user',
    [
        'namespace' => 'App\Controllers\User',
        'filter'    => 'auth'
    ],
    function ($routes) {


        // =================================================
        // USER DASHBOARD
        // =================================================

        $routes->get(
            'dashboard',
            'Dashboard::index'
        );

        $routes->get(
            'assigned-mla',
            'AssignedMLA::index'
        );


        // =================================================
        // COMPLAINT
        // =================================================

        $routes->get(
            'complaint',
            'Complaint::index'
        );

        $routes->post(
            'complaint/save',
            'Complaint::save'
        );

        $routes->get(
            'complaint/getComplaintData/(:num)',
            'Complaint::getComplaintData/$1'
        );

        $routes->post(
            'complaint/update',
            'Complaint::update'
        );

        $routes->post(
            'complaint/delete/(:num)',
            'Complaint::delete/$1'
        );


        // =================================================
        // FEEDBACK
        // =================================================

        $routes->get(
            'feedback',
            'Feedback::index'
        );

        $routes->post(
            'feedback/save',
            'Feedback::save'
        );

        $routes->get(
            'feedback/getFeedbackData/(:num)',
            'Feedback::getFeedbackData/$1'
        );

        $routes->post(
            'feedback/update',
            'Feedback::update'
        );

        $routes->post(
            'feedback/delete/(:num)',
            'Feedback::delete/$1'
        );


        // =================================================
        // MLA RATING
        // =================================================

        $routes->get(
            'mla-rating',
            'MlaRating::index'
        );

        $routes->get(
            'mla-rating/get-questions',
            'MlaRating::getQuestions'
        );

        $routes->post(
            'mla-rating/save',
            'MlaRating::save'
        );

        $routes->get(
            'mla-rating/list',
            'MlaRating::list'
        );

        $routes->get(
            'mla-rating/view/(:num)',
            'MlaRating::view/$1'
        );

        $routes->get(
            'mla-rating/statistics',
            'MlaRating::statistics'
        );


        // =================================================
        // MLA WORKS
        // =================================================

        $routes->get(
            'mla-works',
            'MLAWorks::index'
        );


        // =================================================
        // MY PROFILE
        // =================================================

        $routes->get(
            'my-profile',
            'Profile::index'
        );

        $routes->post(
            'profile/update',
            'Profile::update'
        );


        // =================================================
        // NOTIFICATION
        // =================================================

        $routes->get(
            'notification',
            'Notification::index'
        );


        // =================================================
        // SURVEY
        // =================================================

        $routes->get(
            'survey',
            'Survey::index'
        );

        $routes->post(
            'survey/save',
            'Survey::save'
        );

        $routes->post(
            'survey/view',
            'Survey::view'
        );

        $routes->post(
            'survey/update',
            'Survey::update'
        );

        $routes->post(
            'survey/delete',
            'Survey::delete'
        );

        $routes->get(
            'survey/history',
            'Survey::history'
        );
    }
);


// =====================================================
// 404 OVERRIDE
// =====================================================


$routes->set404Override(function () {
    return view('errors/html/error_404');
});