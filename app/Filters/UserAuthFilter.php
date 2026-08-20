<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserAuthFilter implements FilterInterface
{
    /**
     * BEFORE REQUEST
     */
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $session = session();

        // User login आहे का?
        if ($session->get('userLoggedIn') !== true) {

            return redirect()->to(
                base_url('user/login')
            );
        }

        return null;
    }


    /**
     * AFTER REQUEST
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        return $response;
    }
}