<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    // =====================================================
    // ADMIN LOGIN PAGE
    // =====================================================

    public function login()
    {
       
        if (session()->get('admin_logged_in') === true) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/login');
    }


    // =====================================================
    // ADMIN LOGIN CHECK
    // =====================================================

    public function loginCheck()
    {
        $email    = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        // Validation
        if ($email === '' || $password === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email and Password are required.');
        }

        $adminModel = new AdminModel();

        $admin = $adminModel
            ->where('email', $email)
            ->first();

        // Invalid email
        if (!$admin) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid Email or Password.');
        }

        // Invalid password
        if (!password_verify($password, $admin['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid Email or Password.');
        }


        // =================================================
        // LOGIN SUCCESS
        // =================================================

        // Session ID regenerate - security
        session()->regenerate(true);

        session()->set([
            'admin_logged_in' => true,

            'admin_id'        => $admin['id'],

            'admin_email'     => $admin['email'],

            'admin_name'      => $admin['name'] ?? '',

            'admin_role'      => 'admin',
        ]);


        // =================================================
        // REDIRECT TO ADMIN DASHBOARD
        // =================================================

        return redirect()->to(
            base_url('admin/dashboard')
        );
    }


    // =====================================================
    // ADMIN LOGOUT
    // =====================================================

    public function logout()
    {
        // Remove admin session
        session()->remove([
            'admin_logged_in',
            'admin_id',
            'admin_email',
            'admin_name',
            'admin_role',
        ]);

        // Destroy session
        session()->destroy();

        // Back to login
        return redirect()
            ->to(base_url('admin/login'))
            ->with('success', 'You have been logged out successfully.');
    }
}