<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $session = session();

        // Admin login check
        if ($session->get('admin_logged_in') !== true) {

            return redirect()
                ->to(base_url('admin/login'))
                ->with('error', 'Please login as admin first.');
        }

        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Prevent browser caching of protected pages
        $response->setHeader(
            'Cache-Control',
            'no-store, no-cache, must-revalidate, max-age=0'
        );

        $response->setHeader(
            'Pragma',
            'no-cache'
        );

        $response->setHeader(
            'Expires',
            '0'
        );

        return $response;
    }
}