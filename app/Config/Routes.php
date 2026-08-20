<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================================================
// Frontend
// =====================================================

$routes->get('/', 'Home::index');
$routes->get('leadership', 'Home::leadership');
$routes->get('mla', 'Home::mla');


// =====================================================
// Admin
// =====================================================

// $routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

//     // Auth Routes
//     $routes->get('login', 'Auth::login');
//     $routes->post('login', 'Auth::loginCheck');

//     // Dashboard
//     $routes->get('dashboard', 'Dashboard::index');

//     // Management Routes
//     $routes->get('mla-management', 'MLAManagement::index');
//     $routes->get('constituency-management', 'ConstituencyManagement::index');
//     $routes->get('complaint-management', 'ComplaintManagement::index');
//     $routes->post('complaint/save', 'Complaint::save');

//     $routes->get('survey-management', 'SurveyManagement::index');
//     $routes->get('survey-management/data', 'SurveyManagement::dashboardData');

//     $routes->get('media-library', 'MediaLibrary::index');
//     $routes->get('feedback-dashboard', 'FeedbackDashboard::index');
//     $routes->get('activity-logs', 'ActivityLogs::index');
//     $routes->get('voter-management', 'VoterManagement::index');
//     $routes->get('notification-center', 'NotificationCenter::index');


//     // ============================================================
//     // RATING QUESTION ROUTES
//     // ============================================================

//     $routes->get('ratingquestion', 'RatingQuestionController::index');
//     $routes->get('ratingquestion/create', 'RatingQuestionController::create');
//     $routes->post('ratingquestion/store', 'RatingQuestionController::store');
//     $routes->get('ratingquestion/edit/(:num)', 'RatingQuestionController::edit/$1');
//     $routes->post('ratingquestion/update/(:num)', 'RatingQuestionController::update/$1');
//     $routes->get('ratingquestion/delete/(:num)', 'RatingQuestionController::delete/$1');
//     $routes->get('ratingquestion/view/(:num)', 'RatingQuestionController::view/$1');
//     $routes->get('ratingquestion/toggle-status/(:num)', 'RatingQuestionController::toggleStatus/$1');
//     $routes->post('ratingquestion/update-order', 'RatingQuestionController::updateOrder');
//     $routes->get('ratingquestion/get-questions', 'RatingQuestionController::getQuestions');
//     $routes->post('ratingquestion/clear-cache', 'RatingQuestionController::clearCache');


//     // ============================================================
//     // ALIAS ROUTES FOR manageratingquestion
//     // ============================================================

//     $routes->get('manageratingquestion', 'RatingQuestionController::index');
//     $routes->get('manageratingquestion/create', 'RatingQuestionController::create');
//     $routes->post('manageratingquestion/store', 'RatingQuestionController::store');
//     $routes->get('manageratingquestion/edit/(:num)', 'RatingQuestionController::edit/$1');
//     $routes->post('manageratingquestion/update/(:num)', 'RatingQuestionController::update/$1');
//     $routes->get('manageratingquestion/delete/(:num)', 'RatingQuestionController::delete/$1');
//     $routes->get('manageratingquestion/view/(:num)', 'RatingQuestionController::view/$1');
//     $routes->get('manageratingquestion/toggle-status/(:num)', 'RatingQuestionController::toggleStatus/$1');
//     $routes->post('manageratingquestion/update-order', 'RatingQuestionController::updateOrder');


//     // Search Route
//     $routes->get('search', 'Search::index');

//     //constituency management

//     $routes->get('get-districts/(:num)', 'ConstituencyManagement::getDistricts/$1');

//     $routes->post('constituency/save', 'ConstituencyManagement::save');

//     $routes->get('constituency/get/(:num)', 'ConstituencyManagement::getConstituency/$1');

//     $routes->post('constituency/update', 'ConstituencyManagement::update');

//     $routes->post('constituency/delete/(:num)', 'ConstituencyManagement::delete/$1');

//     //mla management

//     $routes->get('get-constituencies/(:num)', 'MLAManagement::getConstituencies/$1');

//     $routes->post('mla/save', 'MLAManagement::save');

//     $routes->get('mla/get/(:num)', 'MLAManagement::get/$1');

//     $routes->post('mla/update', 'MLAManagement::update');

//     $routes->get('mla/delete/(:num)', 'MLAManagement::delete/$1');
// });

$routes->group('admin', [
    'namespace' => 'App\Controllers\Admin'
], function ($routes) {

    // Admin Login
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginCheck');

    $routes->get('logout', 'Auth::logout');
});


// =====================================================
// ADMIN - PROTECTED
// =====================================================

$routes->group('admin', [
    'namespace' => 'App\Controllers\Admin',
    'filter'    => 'adminauth'
], function ($routes) {


    $routes->get('dashboard', 'Dashboard::index');

    // MLA Management
    $routes->get('mla-management', 'MLAManagement::index');


    $routes->get(
        'constituency-management',
        'ConstituencyManagement::index'
    );

    $routes->get(
        'get-districts/(:num)',
        'ConstituencyManagement::getDistricts/$1'
    );

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

    // Rating Question
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

    // Manage Rating Question
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

    $routes->get(
        'search',
        'Search::index'
    );
});
// =====================================================
// USER - PUBLIC ROUTES
// =====================================================

$routes->group('user', [
    'namespace' => 'App\Controllers\User'
], function ($routes) {

    // Login page
    $routes->get(
        'login',
        'Auth::index'
    );

    // Login submit
    $routes->post(
        'login',
        'Auth::login'
    );

    // Register
    $routes->post(
        'register',
        'Auth::register'
    );

    // Logout
    $routes->get(
        'logout',
        'Auth::logout'
    );

    // Forgot password
    $routes->get(
        'forgot-password',
        'Auth::forgotPassword'
    );

    $routes->post(
        'forgot-password',
        'Auth::sendResetLink'
    );

    // Reset password
    $routes->get(
        'reset-password/(:any)',
        'Auth::resetPassword/$1'
    );

    $routes->post(
        'reset-password',
        'Auth::updatePassword'
    );

    // Voter ID check
    $routes->post(
        'check-voter-id',
        'Auth::checkVoterId'
    );

    // Get MLA by constituency
    $routes->get(
        'get-mla/(:num)',
        'Auth::getMla/$1'
    );

});


// =====================================================
// USER - PROTECTED ROUTES
// =====================================================

$routes->group('user', [
    'namespace' => 'App\Controllers\User',
    'filter'    => 'userauth'
], function ($routes) {

    // Dashboard
    $routes->get(
        'dashboard',
        'Dashboard::index'
    );

    // Assigned MLA
    $routes->get(
        'assigned-mla',
        'AssignedMLA::index'
    );

    // Complaint
    $routes->get(
        'complaint',
        'Complaint::index'
    );

    $routes->post(
        'complaint/save',
        'Complaint::save'
    );

    // Feedback
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

    // MLA Rating
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

    // MLA Works
    $routes->get(
        'mla-works',
        'MLAWorks::index'
    );

    // Profile
    $routes->get(
        'my-profile',
        'Profile::index'
    );

    $routes->post(
        'profile/update',
        'Profile::update'
    );

    // Notification
    $routes->get(
        'notification',
        'Notification::index'
    );

    // Survey
    $routes->get(
        'survey',
        'Survey::index'
    );

    $routes->post(
        'survey/save',
        'Survey::save'
    );
});


// =====================================================
// 404
// =====================================================

$routes->set404Override(function () {
    return view('errors/html/error_404');
});