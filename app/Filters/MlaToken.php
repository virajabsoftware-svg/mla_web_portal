<?php

namespace App\Filters;

use App\Models\MlaModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MlaToken implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        // Authorization header
        $header = $request->getHeaderLine('Authorization');

        if (empty($header)) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Authorization token required'
                ])
                ->setStatusCode(401);
        }

        // Bearer token check
        if (!preg_match('/^Bearer\s+(\S+)$/i', trim($header), $matches)) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Invalid authorization format'
                ])
                ->setStatusCode(401);
        }

        $token = $matches[1];

        // Hash received token
        $hashedToken = hash('sha256', $token);

        // Find MLA
        $mlaModel = new MlaModel();

        $mla = $mlaModel
            ->where('api_token', $hashedToken)
            ->where('token_expiry >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$mla) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Invalid or expired token'
                ])
                ->setStatusCode(401);
        }

        // Store logged-in MLA
        $request->mla = $mla;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Nothing required
    }
    
}