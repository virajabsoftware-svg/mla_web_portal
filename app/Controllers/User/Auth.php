<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\VoterModel;
use App\Models\StateModel;
use App\Models\MlaModel;

class Auth extends BaseController
{
    protected $voterModel;

    public function __construct()
    {
        $this->voterModel = new VoterModel();
    }

    // =====================================================
    // LOGIN / REGISTER PAGE
    // =====================================================

    public function index()
    {
        $stateModel = new StateModel();

        return view('user/login', [
            'states' => $stateModel
                ->orderBy('state_name', 'ASC')
                ->findAll(),
        ]);
    }

    public function googleLogin()
    {
        $clientId = (string) getenv('google.clientId');
        $clientSecret = (string) getenv('google.clientSecret');

        if ($clientId === '' || $clientSecret === '') {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Google login is not configured yet.');
        }

        $state = bin2hex(random_bytes(32));
        session()->set('google_oauth_state', $state);

        $query = http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => base_url('user/google-callback'),
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'state' => $state,
            'access_type' => 'online',
            'prompt' => 'select_account',
        ]);

        return redirect()->to(
            'https://accounts.google.com/o/oauth2/v2/auth?' . $query
        );
    }

    public function googleCallback()
    {
        $state = (string) $this->request->getGet('state');
        $savedState = (string) session()->get('google_oauth_state');
        session()->remove('google_oauth_state');

        if ($state === '' || $savedState === '' || !hash_equals($savedState, $state)) {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Invalid Google login request.');
        }

        if ((string) $this->request->getGet('error') !== '') {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Google login was cancelled.');
        }

        $code = (string) $this->request->getGet('code');
        if ($code === '') {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Google authorization code is missing.');
        }

        $token = $this->googleRequest(
            'https://oauth2.googleapis.com/token',
            [
                'code' => $code,
                'client_id' => (string) getenv('google.clientId'),
                'client_secret' => (string) getenv('google.clientSecret'),
                'redirect_uri' => base_url('user/google-callback'),
                'grant_type' => 'authorization_code',
            ]
        );

        if (empty($token['id_token'])) {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Unable to verify Google login.');
        }

        $profile = $this->googleRequest(
            'https://oauth2.googleapis.com/tokeninfo?id_token=' .
            rawurlencode($token['id_token'])
        );

        if (
            ($profile['aud'] ?? '') !== (string) getenv('google.clientId') ||
            ($profile['email_verified'] ?? '') !== 'true' ||
            empty($profile['email'])
        ) {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Google account verification failed.');
        }

        $user = $this->voterModel->findByEmail(strtolower($profile['email']));
        if (!$user) {
            return redirect()->to(base_url('user/login'))
                ->with('error', 'Please register this email in the voter portal first.');
        }

        session()->regenerate(true);
        session()->set([
            'user_logged_in' => true,
            'user_id' => $user['id'],
            'voter_id' => $user['voter_id'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'profile_photo' => $user['profile_photo'],
            'logged_in' => true,
        ]);

        return redirect()->to(base_url('user/dashboard'))
            ->with('success', 'Google login successful.');
    }

    private function googleRequest(string $url, array $data = []): array
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => $data !== [],
            CURLOPT_POSTFIELDS => $data !== [] ? http_build_query($data) : null,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER => ['Accept: application/json'],
        ]);

        $response = curl_exec($curl);
        $status = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($response === false || $status < 200 || $status >= 300) {
            return [];
        }

        $decoded = json_decode($response, true);
        return is_array($decoded) ? $decoded : [];
    }

    // =====================================================
    // REGISTER
    // =====================================================

    public function register()
    {
        $model = $this->voterModel;

        // =========================
        // Profile Photo Upload
        // =========================

        $photoName = '';

        $photo = $this->request->getFile('profile_photo');

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array(
                strtolower($photo->getExtension()),
                $allowed,
                true
            )) {

                $photoName = $photo->getRandomName();

                $uploadPath = FCPATH . 'uploads/profile/';

                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $photo->move(
                    $uploadPath,
                    $photoName
                );

            } else {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Only JPG, PNG and WEBP images allowed'
                    );
            }
        }

        // =========================
        // Insert User Data
        // =========================

        $data = [

            'voter_id' => $this->request->getPost('voter_id'),
            'full_name' => $this->request->getPost('full_name'),
            'dob' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'state' => $this->request->getPost('state_id'),
            'district' => $this->request->getPost('district_id'),
            'constituency' => $this->request->getPost('constituency_id'),
            'locality' => $this->request->getPost('locality'),
            'pincode' => $this->request->getPost('pincode'),
            'profile_photo' => $photoName,
            'mla_id' => $this->request->getPost('mla_id'),
            'status' => 'pending'
        ];

        if ($model->insert($data)) {


           /*
            // Get newly created user ID
            $userId = $model->getInsertID();
            // Regenerate session ID for security
            session()->regenerate(true);
            // Set login session
            session()->set([

                'user_logged_in' => true,
                'user_id' => $userId,
                'voter_id' => $data['voter_id'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'profile_photo' => $data['profile_photo'],
                'logged_in' => true,

            ]);*/

            return redirect()
                ->to(base_url('user/dashboard'))
                ->with(
                    'success',
                    'Registration successful. Welcome!'
                );
        } 
        else
     {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        "<br>",
                        $model->errors()
                    )
                );
        }
    }

    // =====================================================
    // LOGIN
    // =====================================================

    public function login()
    {
        $model = $this->voterModel;

        $email = trim(
            (string) $this->request->getPost('email')
        );

        $password = (string) $this->request->getPost('password');

        $user = $model
            ->where('email', $email)
            ->first();

        if ($user) {

            if (password_verify(
                $password,
                $user['password']
            )) {

                session()->regenerate(true);

                session()->set([

                    'user_logged_in' => true,
                    'user_id' => $user['id'],
                    'voter_id' => $user['voter_id'],
                    'full_name' => $user['full_name'],
                    'email' => $user['email'],
                    'profile_photo' => $user['profile_photo'],
                    'logged_in' => true,

                ]);

                return redirect()
                    ->to(base_url('user/dashboard'))
                    ->with(
                        'success',
                        'Login Successfully'
                    );
            }
        }

        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                'Invalid Email or Password'
            );
    }

    // =====================================================
    // LOGOUT
    // =====================================================

    public function logout()
    {
        session()->remove([
            'user_logged_in',
            'user_id',
            'voter_id',
            'full_name',
            'email',
            'profile_photo',
            'logged_in',
        ]);

        session()->destroy();

        return redirect()
            ->to(base_url('user/login'))
            ->with(
                'success',
                'Logout Successfully'
            );
    }

    // =====================================================
    // CHECK VOTER ID
    // =====================================================

    public function checkVoterId()
    {
        $voterId = trim(
            (string) $this->request->getPost('voter_id')
        );

        if ($voterId === '') {

            return $this->response->setJSON([
                'exists' => false,
                'message' => 'Voter ID is required.'
            ]);
        }

        $exists = $this->voterModel
            ->where('voter_id', $voterId)
            ->first();

        return $this->response->setJSON([

            'exists' => !empty($exists),

            'message' => !empty($exists)
                ? 'Voter ID is already registered.'
                : 'Voter ID is available.'
        ]);
    }

    // =====================================================
    // GET MLA
    // =====================================================

    public function getMla($constituencyId)
    {
        $mla = (new MlaModel())
            ->select(
                'mlas.*, states.state_name, districts.district_name, constituencies.constituency_name'
            )
            ->join(
                'states',
                'states.id = mlas.state_id'
            )
            ->join(
                'districts',
                'districts.id = mlas.district_id'
            )
            ->join(
                'constituencies',
                'constituencies.id = mlas.constituency_id'
            )
            ->where(
                'mlas.constituency_id',
                $constituencyId
            )
            ->where(
                'mlas.status',
                'Active'
            )
            ->first();

        return $this->response->setJSON([

            'success' => $mla !== null,

            'mla' => $mla,

        ]);
    }

    // =====================================================
    // FORGOT PASSWORD
    // Single view is user/login.php
    // =====================================================

    public function forgotPassword()
    {
        /*
         * No separate view.
         * Redirect to login page where forgot password
         * window is already present.
         */

        return redirect()->to(base_url('user/login'));
    }

    private function forgotPasswordResponse( string $message, string $step = 'email',
        bool $success = false,
        ?int $expiresAt = null
    )
    {
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => $success,
                'message' => $message,
                'step' => $step,
                'csrfToken' => csrf_hash(),
                'expiresAt' => $expiresAt,
            ]);
        }

        return redirect()
            ->to(base_url('user/login'))
            ->with('forgot_step', $step)
            ->with($success ? 'success' : 'error', $message);
    }

    // =====================================================
    // SEND RESET OTP
    // =====================================================

   public function sendResetOtp()
{
    $email = trim(
        (string) $this->request->getPost('email')
    );

    // -------------------------
    // Validate Email
    // -------------------------

    if ($email === '') {
        return $this->forgotPasswordResponse(
            'Email address is required.'
        );
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $this->forgotPasswordResponse(
            'Please enter a valid email address.'
        );
    }

    // -------------------------
    // Find User
    // -------------------------

    $user = $this->voterModel
        ->where('email', $email)
        ->first();

    if (!$user) {
        return $this->forgotPasswordResponse(
            'No account found with this email address.'
        );
    }

    // -------------------------
    // Generate OTP
    // -------------------------

    $otp = (string) random_int(100000, 999999);

    $expiresAt = time() + (10 * 60);

    // -------------------------
    // Store OTP in Session
    // -------------------------

    session()->set([
        'reset_email' => $email,
        'reset_otp' => $otp,
        'reset_otp_expires' => $expiresAt,
        'reset_otp_verified' => false,
        'forgot_step' => 'otp'
    ]);

    // Send OTP through the configured SMTP mail service.

    $emailService = \Config\Services::email();
    $emailService->setTo($email);
    $emailService->setSubject('Voter Portal - Password Reset OTP');
    $emailService->setMailType('html');
    $emailService->setMessage(
        '<h2>Password Reset Request</h2>' .
        '<p>Your OTP is: <strong>' . $otp . '</strong></p>' .
        '<p>This OTP is valid for 10 minutes.</p>'
    );

    if (!$emailService->send()) {
        log_message(
            'error',
            'OTP email failed: ' .
            $emailService->printDebugger(['headers', 'subject'])
        );

        session()->remove([
            'reset_email',
            'reset_otp',
            'reset_otp_expires',
            'reset_otp_verified',
            'forgot_step'
        ]);

        return $this->forgotPasswordResponse(
            'Unable to send OTP. Please try again later.'
        );
    }

    // -------------------------
    // OTP Sent Successfully
    // -------------------------

    return $this->forgotPasswordResponse(
        'OTP has been sent to your registered email address.',
        'otp',
            true,
            $expiresAt
    );
}

    // =====================================================
    // VERIFY RESET OTP
    // =====================================================

    public function verifyResetOtp()
    {
        // -------------------------
        // Check OTP Session
        // -------------------------

        $email = session()->get('reset_email');

        if (!$email) {
            return $this->forgotPasswordResponse(
                'Please request a password reset first.'
            );
        }

        // -------------------------
        // Get OTP
        // -------------------------

        $otp = trim(
            (string) $this->request->getPost('otp')
        );

        if ($otp === '') {
            return $this->forgotPasswordResponse(
                'Please enter the OTP.',
                'otp'
            );
        }

        // -------------------------
        // Session OTP
        // -------------------------

        $sessionOtp = session()->get('reset_otp');

        $expiresAt = session()->get(
            'reset_otp_expires'
        );

        // -------------------------
        // Check Expiry
        // -------------------------

        if (
            !$expiresAt ||
            time() > $expiresAt
        ) {

            session()->remove([
                'reset_otp',
                'reset_otp_expires',
                'reset_otp_verified'
            ]);

            return $this->forgotPasswordResponse(
                'OTP has expired. Please request a new OTP.'
            );
        }

        // -------------------------
        // Check OTP
        // -------------------------

        if ((string) $otp !== (string) $sessionOtp) {
            return $this->forgotPasswordResponse(
                'Invalid OTP. Please try again.',
                'otp'
            );
        }

        // -------------------------
        // OTP Verified
        // -------------------------

        session()->set([
            'reset_otp_verified' => true,
            'forgot_step' => 'reset'
        ]);

        // OTP cannot be reused
        session()->remove([
            'reset_otp',
            'reset_otp_expires'
        ]);

        return $this->forgotPasswordResponse(
            'OTP verified successfully. You can now reset your password.',
            'reset',
            true
        );
    }

    // =====================================================
    // RESET PASSWORD
    // =====================================================

    public function resetPassword()
    {
        // -------------------------
        // OTP Verification Required
        // -------------------------

        if (!session()->get('reset_otp_verified')) {
            return $this->forgotPasswordResponse(
                'Please verify the OTP first.'
            );
        }

        // -------------------------
        // Get Email
        // -------------------------

        $email = session()->get('reset_email');

        if (!$email) {
            return $this->forgotPasswordResponse(
                'Password reset session expired.'
            );
        }

        // -------------------------
        // Get Password
        // -------------------------

        $password = (string) $this->request
            ->getPost('password');

        $confirmPassword = (string) $this->request
            ->getPost('confirm_password');

        // -------------------------
        // Validate Password
        // -------------------------

        if (
            empty($password) ||
            empty($confirmPassword)
        ) {
            return $this->forgotPasswordResponse(
                'Both password fields are required.',
                'reset'
            );
        }

        if (strlen($password) < 8) {
            return $this->forgotPasswordResponse(
                'Password must be at least 8 characters.',
                'reset'
            );
        }

        if ($password !== $confirmPassword) {
            return $this->forgotPasswordResponse(
                'Passwords do not match.',
                'reset'
            );
        }

        // -------------------------
        // Find User
        // -------------------------

        $user = $this->voterModel
            ->where('email', $email)
            ->first();

        if (!$user) {

            session()->remove([
                'reset_email',
                'reset_otp_verified',
                'forgot_step'
            ]);

            return $this->forgotPasswordResponse(
                'User account not found.'
            );
        }

        // -------------------------
        // Hash Password
        // -------------------------

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        // -------------------------
        // Update Password
        // -------------------------

        $updated = $this->voterModel
            ->where('email', $email)
            ->set([
                'password' => $hashedPassword
            ])
            ->update();

        if (!$updated) {
            return $this->forgotPasswordResponse(
                'Unable to reset password. Please try again.',
                'reset'
            );
        }

        // -------------------------
        // Clear Reset Session
        // -------------------------

        session()->remove([
            'reset_email',
            'reset_otp_verified',
            'reset_otp',
            'reset_otp_expires',
            'forgot_step'
        ]);

        // -------------------------
        // Back to Login
        // -------------------------

        return $this->forgotPasswordResponse(
            'Password reset successfully. You can now login.',
            'email',
            true
        );
    }
}