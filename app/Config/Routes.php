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

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Auth Routes
   $routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginCheck');
$routes->get('logout', 'Auth::logout');

    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Management Routes
    $routes->get('mla-management', 'MLAManagement::index');
    
    $routes->get('constituency-management', 'ConstituencyManagement::index');
    $routes->get('complaint-management', 'ComplaintManagement::index');
    $routes->post('complaint/save', 'Complaint::save');

    $routes->get('survey-management', 'SurveyManagement::index');
    $routes->get('survey-management/data', 'SurveyManagement::dashboardData');

    $routes->get('media-library', 'MediaLibrary::index');
    $routes->get('feedback-dashboard', 'FeedbackDashboard::index');
    $routes->get('activity-logs', 'ActivityLogs::index');
    $routes->get('voter-management', 'VoterManagement::index');
    $routes->get('notification-center', 'NotificationCenter::index');


    // ============================================================
    // RATING QUESTION ROUTES
    // ============================================================

    $routes->get('ratingquestion', 'RatingQuestionController::index');
    $routes->get('ratingquestion/create', 'RatingQuestionController::create');
    $routes->post('ratingquestion/store', 'RatingQuestionController::store');
    $routes->get('ratingquestion/edit/(:num)', 'RatingQuestionController::edit/$1');
    $routes->post('ratingquestion/update/(:num)', 'RatingQuestionController::update/$1');
    $routes->get('ratingquestion/delete/(:num)', 'RatingQuestionController::delete/$1');
    $routes->get('ratingquestion/view/(:num)', 'RatingQuestionController::view/$1');
    $routes->get('ratingquestion/toggle-status/(:num)', 'RatingQuestionController::toggleStatus/$1');
    $routes->post('ratingquestion/update-order', 'RatingQuestionController::updateOrder');
    $routes->get('ratingquestion/get-questions', 'RatingQuestionController::getQuestions');
    $routes->post('ratingquestion/clear-cache', 'RatingQuestionController::clearCache');


    // ============================================================
    // ALIAS ROUTES FOR manageratingquestion
    // ============================================================

    $routes->get('manageratingquestion', 'RatingQuestionController::index');
    $routes->get('manageratingquestion/create', 'RatingQuestionController::create');
    $routes->post('manageratingquestion/store', 'RatingQuestionController::store');
    $routes->get('manageratingquestion/edit/(:num)', 'RatingQuestionController::edit/$1');
    $routes->post('manageratingquestion/update/(:num)', 'RatingQuestionController::update/$1');
    $routes->get('manageratingquestion/delete/(:num)', 'RatingQuestionController::delete/$1');
    $routes->get('manageratingquestion/view/(:num)', 'RatingQuestionController::view/$1');
    $routes->get('manageratingquestion/toggle-status/(:num)', 'RatingQuestionController::toggleStatus/$1');
    $routes->post('manageratingquestion/update-order', 'RatingQuestionController::updateOrder');


    // Search Route
    $routes->get('search', 'Search::index');

    //constituency management

    $routes->get('get-districts/(:num)', 'ConstituencyManagement::getDistricts/$1');

    $routes->post('constituency/save', 'ConstituencyManagement::save');

    $routes->get('constituency/get/(:num)', 'ConstituencyManagement::getConstituency/$1');

    $routes->post('constituency/update', 'ConstituencyManagement::update');

    $routes->post('constituency/delete/(:num)', 'ConstituencyManagement::delete/$1');

    //mla management

    $routes->get('get-constituencies/(:num)', 'MLAManagement::getConstituencies/$1');

    $routes->post('mla/save', 'MLAManagement::save');

    $routes->get('mla/get/(:num)', 'MLAManagement::get/$1');

    $routes->post('mla/update', 'MLAManagement::update');

    $routes->get('mla/delete/(:num)', 'MLAManagement::delete/$1');

    //party management
    $routes->get('party-management', 'PartyManagement::index');
    $routes->post('party/save', 'PartyManagement::save');
    $routes->get('party/get/(:num)', 'PartyManagement::getParty/$1');
    $routes->post('party/update', 'PartyManagement::update');
    $routes->get('party/delete/(:num)', 'PartyManagement::delete/$1');
});


// =====================================================
// User Routes
// =====================================================

$routes->group('user', ['namespace' => 'App\Controllers\User'], function ($routes) {

    // =================================================
    // LOGIN / REGISTER / LOGOUT
    // =================================================

    $routes->get('login', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->post('login/check', 'Auth::loginCheck');
    $routes->post('register', 'Auth::register');
    $routes->get('logout', 'Auth::logout');


    // =================================================
    // FORGOT PASSWORD
    // =================================================

    $routes->get('forgot-password', 'Auth::forgotPassword');
    $routes->post('forgot-password', 'Auth::sendResetLink');
    $routes->get('reset-password/(:any)', 'Auth::resetPassword/$1');
    $routes->post('reset-password', 'Auth::updatePassword');

    $routes->post('check-voter-id', 'Auth::checkVoterId');
    $routes->get('get-mla/(:num)', 'Auth::getMla/$1');

    // =================================================
    // USER DASHBOARD
    // =================================================

    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('assigned-mla', 'AssignedMLA::index');


    // =================================================
    // COMPLAINT
    // =================================================

    $routes->get('complaint', 'Complaint::index');
    $routes->post('complaint/save', 'Complaint::save');
    $routes->get('complaint/getComplaintData/(:num)', 'Complaint::getComplaintData/$1');
    $routes->post('complaint/update', 'Complaint::update');
    $routes->post('complaint/delete/(:num)', 'Complaint::delete/$1');


    // =================================================
    // FEEDBACK
    // =================================================

    $routes->get('feedback', 'Feedback::index');
    $routes->post('feedback/save', 'Feedback::save');
    $routes->get('feedback/getFeedbackData/(:num)', 'Feedback::getFeedbackData/$1');
    $routes->post('feedback/update', 'Feedback::update');
    $routes->post('feedback/delete/(:num)', 'Feedback::delete/$1');


    // =================================================
    // MLA RATING - SURVEY PAGE
    // =================================================

    $routes->get('mla-rating', 'MlaRating::index');
    $routes->get('mla-rating/get-questions', 'MlaRating::getQuestions');
    $routes->post('mla-rating/save', 'MlaRating::save');
    $routes->get('mla-rating/list', 'MlaRating::list');
    $routes->get('mla-rating/view/(:num)', 'MlaRating::view/$1');
    $routes->get('mla-rating/statistics', 'MlaRating::statistics');


    // =================================================
    // MLA WORKS
    // =================================================

    $routes->get('mla-works', 'MLAWorks::index');


    // =================================================
    // MY PROFILE
    // =================================================

    $routes->get('my-profile', 'Profile::index');
    $routes->post('profile/update', 'Profile::update');


    // =================================================
    // NOTIFICATION
    // =================================================

    $routes->get('notification', 'Notification::index');


    // =================================================
    // SURVEY - ADDED/UPDATE ROUTES
    // =================================================

 // =================================================
// SURVEY
// =================================================

$routes->get('survey', 'Survey::index');
$routes->post('survey/save', 'Survey::save');
$routes->post('survey/view', 'Survey::view');      // ADD THIS - NEW
$routes->post('survey/update', 'Survey::update');  // ADD THIS - NEW
$routes->post('survey/delete', 'Survey::delete');
$routes->get('survey/history', 'Survey::history');
});


// =====================================================
// Catch-all route for 404 errors
// =====================================================

$routes->set404Override(function () {
    return view('errors/html/error_404');
});