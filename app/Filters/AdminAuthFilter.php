<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuthFilter implements FilterInterface
{
    /**
     * =========================================================
     * BEFORE REQUEST
     * =========================================================
     */
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        // -----------------------------------------------------
        // Get current URI path
        // -----------------------------------------------------

        $path = trim(
            $request->getUri()->getPath(),
            '/'
        );


        // -----------------------------------------------------
        // IMPORTANT:
        // Admin login page must ALWAYS be accessible.
        //
        // Otherwise:
        // /admin/login
        //      ↓
        // AdminAuthFilter
        //      ↓
        // /admin/login
        //      ↓
        // LOOP
        // -----------------------------------------------------

        if ($path === 'admin/login') {
            return null;
        }


        // -----------------------------------------------------
        // Check Admin Session
        // -----------------------------------------------------

        if (session()->get('isLoggedIn') !== true) {

            return redirect()->to(
                base_url('admin/login')
            );
        }


        // -----------------------------------------------------
        // Admin is logged in
        // -----------------------------------------------------

        return null;
    }


    /**
     * =========================================================
     * AFTER REQUEST
     * =========================================================
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Nothing required
    }
}