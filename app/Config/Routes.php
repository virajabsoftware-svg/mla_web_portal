<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// =====================================================
// Frontend
// =====================================================

$routes->get('/', 'Home::index');
$routes->get('leadership', 'Home::leadership');
$routes->get('mla', 'Home::mla');


// =====================================================
// Admin
// =====================================================
// =====================================================
// Admin
// =====================================================
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginCheck');

     $routes->get('dashboard', 'Dashboard::index');
    
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

    // Rating Question Routes
    $routes->get('ratingquestion', 'RatingQuestionController::index');
    $routes->get('ratingquestion/create', 'RatingQuestionController::create');
    $routes->post('ratingquestion/store', 'RatingQuestionController::store');
    $routes->get('ratingquestion/edit/(:num)', 'RatingQuestionController::edit/$1');
    $routes->post('ratingquestion/update/(:num)', 'RatingQuestionController::update/$1');
    $routes->get('ratingquestion/delete/(:num)', 'RatingQuestionController::delete/$1');
    $routes->get('ratingquestion/view/(:num)', 'RatingQuestionController::view/$1');
    $routes->get('ratingquestion/toggle-status/(:num)', 'RatingQuestionController::toggleStatus/$1');
    $routes->post('ratingquestion/update-order', 'RatingQuestionController::updateOrder');

    // Alias for backward compatibility
    $routes->get('manageratingquestion', 'RatingQuestionController::index');

    // SEARCH ROUTE
    $routes->get('search', 'Search::index');

    $routes->get('get-districts/(:num)', 'ConstituencyManagement::getDistricts/$1');
});

// =====================================================
// User
// =====================================================

$routes->group('user', ['namespace' => 'App\Controllers\User'], function ($routes) {

    // =================================================
    // LOGIN / REGISTER / LOGOUT
    // =================================================

    $routes->get('login', 'Auth::index');
    $routes->post('login', 'Auth::login');

    // Remote login check route
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


    // =================================================
    // FEEDBACK
    // =================================================

    $routes->get('feedback', 'Feedback::index');
    $routes->post('feedback/save', 'Feedback::save');

    $routes->get(
        'feedback/getFeedbackData/(:num)',
        'Feedback::getFeedbackData/$1'
    );

    $routes->post('feedback/update', 'Feedback::update');
    $routes->post('feedback/delete/(:num)', 'Feedback::delete/$1');


    // =================================================
    // MLA RATING
    // =================================================

    $routes->get('mla-rating', 'MlaRating::index');

    // Route to fetch questions for frontend
    $routes->get('mla-rating/get-questions', 'MlaRating::getQuestions');

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

    $routes->get('mla-works', 'MLAWorks::index');


    // =================================================
    // MY PROFILE
    // =================================================

    $routes->get('my-profile', 'MyProfile::index');


    // =================================================
    // NOTIFICATION
    // =================================================

    $routes->get('notification', 'Notification::index');


    // =================================================
    // SURVEY
    // =================================================

    $routes->get('survey', 'Survey::index');
    $routes->post('survey/save', 'Survey::save');

});