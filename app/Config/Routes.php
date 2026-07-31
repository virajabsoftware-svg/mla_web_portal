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

//user
$routes->group('user', ['namespace' => 'App\Controllers\User'], function($routes) {
    $routes->get('login', 'Auth::login');

    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('assigned-mla', 'AssignedMLA::index');

    $routes->get('complaint', 'Complaint::index');

    $routes->get('feedback', 'Feedback::index');

    $routes->get('mla-rating', 'MLARating::index');

    $routes->get('mla-works', 'MLAWorks::index');

    $routes->get('my-profile', 'MyProfile::index');

    $routes->get('notification', 'Notification::index');

    $routes->get('survey', 'Survey::index');
});