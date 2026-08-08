<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Frontend
$routes->get('/', 'Home::index');
$routes->get('leadership', 'Home::leadership');
$routes->get('mla', 'Home::mla');

// Admin
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginCheck');
      
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('mla-management', 'MLAManagement::index');
    $routes->get('constituency-management', 'ConstituencyManagement::index');
    $routes->get('complaint-management', 'ComplaintManagement::index');
    $routes->get('survey-management', 'SurveyManagement::index');
    $routes->get('media-library', 'MediaLibrary::index');
    $routes->get('feedback-dashboard', 'FeedbackDashboard::index');
    $routes->get('activity-logs', 'ActivityLogs::index');
    $routes->get('voter-management', 'VoterManagement::index');
    $routes->get('notification-center', 'NotificationCenter::index');

});

// User
$routes->group('user', ['namespace' => 'App\Controllers\User'], function($routes) {


    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('assigned-mla', 'AssignedMLA::index');

    $routes->get('complaint', 'Complaint::index');

    // =============================================
    // FEEDBACK ROUTES - ALL Routes for Feedback Module
    // =============================================
    $routes->get('feedback', 'Feedback::index');                          // Display Feedback page
    $routes->post('feedback/save', 'Feedback::save');                    // Submit new feedback
    $routes->get('feedback/getFeedbackData/(:num)', 'Feedback::getFeedbackData/$1'); // AJAX - Get feedback data for modals
    $routes->post('feedback/update', 'Feedback::update');                // Update feedback
    $routes->post('feedback/delete/(:num)', 'Feedback::delete/$1');      // Delete feedback

    $routes->get('mla-rating', 'MLARating::index');

    $routes->get('mla-works', 'MLAWorks::index');

    $routes->get('my-profile', 'MyProfile::index');

    $routes->get('notification', 'Notification::index');

    $routes->get('survey', 'Survey::index');


      $routes->get('login', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->post('register', 'Auth::register');
    $routes->get('logout', 'Auth::logout');
});