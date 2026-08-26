<?php

namespace App\Filters;

use App\Models\User\VoterModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ApiTokenFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $header = $request->getHeaderLine('Authorization');

        if (empty($header)) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Authorization token required'
                ])
                ->setStatusCode(401);
        }

        if (!preg_match('/^Bearer\s+(\S+)$/i', trim($header), $matches)) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Invalid authorization format'
                ])
                ->setStatusCode(401);
        }

        $token = $matches[1];

        $voterModel = new VoterModel();

        $voter = $voterModel
            ->where('api_token', hash('sha256', $token))
            ->where('token_expiry >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$voter) {
            return service('response')
                ->setJSON([
                    'status'  => false,
                    'message' => 'Invalid or expired token'
                ])
                ->setStatusCode(401);
        }

        // Logged-in voter
        $request->voter = $voter;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Nothing required
    }
}