<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * =====================================================
     * FILTER ALIASES
     * =====================================================
     */
    public array $aliases = [

        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,

        'forcehttps' =>
            \CodeIgniter\Filters\ForceHTTPS::class,

        'pagecache' =>
            PageCache::class,

        'performance' =>
            PerformanceMetrics::class,

        // -------------------------------------------------
        // ADMIN AUTH
        // -------------------------------------------------

        'adminauth' =>
            \App\Filters\AdminAuthFilter::class,

        // -------------------------------------------------
        // USER AUTH
        // -------------------------------------------------

        'userauth' =>
            \App\Filters\UserAuthFilter::class,
    ];


    /**
     * =====================================================
     * REQUIRED FILTERS
     * =====================================================
     */
    public array $required = [

        'before' => [
        ],

        'after' => [
            'performance',
            'toolbar',
        ],
    ];


    /**
     * =====================================================
     * GLOBAL FILTERS
     * =====================================================
     *
     * IMPORTANT:
     * userauth आणि adminauth इथे ठेवू नका.
     *
     * ते फक्त Routes मध्ये वापरले जातील.
     */
    public array $globals = [

        'before' => [
        ],

        'after' => [
        ],
    ];


    /**
     * =====================================================
     * HTTP METHODS
     * =====================================================
     */
    public array $methods = [];


    /**
     * =====================================================
     * FILTERS
     * =====================================================
     */
    public array $filters = [];
}