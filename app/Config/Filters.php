<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * ------------------------------------------------------------
     * Filter Aliases
     * ------------------------------------------------------------
     */

    public array $aliases = [
        // CodeIgniter filters
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,

        // ========================================================
        // CUSTOM AUTHENTICATION FILTERS
        // ========================================================

        // User Login Protection
        'auth'          => \App\Filters\AuthFilter::class,

        // Admin Login Protection
        'adminAuth'     => \App\Filters\AdminAuthFilter::class,
    ];


    /**
     * ------------------------------------------------------------
     * Required Filters
     * ------------------------------------------------------------
     *
     * These filters are always executed by CodeIgniter.
     */

    public array $required = [
        'before' => [
            'forcehttps',
            'pagecache',
        ],

        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];


    /**
     * ------------------------------------------------------------
     * Global Filters
     * ------------------------------------------------------------
     *
     * Do NOT put auth/adminAuth here.
     *
     * Authentication is applied through Routes.php.
     */

    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],

        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];


    /**
     * ------------------------------------------------------------
     * Method Filters
     * ------------------------------------------------------------
     */

    public array $methods = [];


    /**
     * ------------------------------------------------------------
     * URI Filters
     * ------------------------------------------------------------
     */

    public array $filters = [];
}