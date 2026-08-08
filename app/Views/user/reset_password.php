<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Voter Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
            padding: 2.5rem 2rem;
            max-width: 500px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .brand-icon-wrap {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .brand-icon-wrap i {
            font-size: 3.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .auth-title {
            font-weight: 700;
            color: #1a1a2e;
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
        }
        .auth-subtitle {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1.8rem;
        }
        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
        }
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            background: #f9fafb;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: #ffffff;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(102, 126, 234, 0.5);
            color: white;
        }
        .btn-outline-teal {
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            background: transparent;
            transition: all 0.3s ease;
        }
        .btn-outline-teal:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: transparent;
        }
        .footer-secure {
            text-align: center;
            margin-top: 1.5rem;
            color: #9ca3af;
            font-size: 0.8rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }
        .footer-secure i {
            color: #10b981;
        }
        .password-requirements {
            font-size: 0.8rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }
        @media (max-width: 576px) {
            .auth-card {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="brand-icon-wrap">
        <i class="bi bi-key-fill"></i>
    </div>

    <h3 class="auth-title text-center">Reset Password</h3>
    <p class="auth-subtitle text-center">
        Enter your new password below
        <?php if (isset($email) && !empty($email)): ?>
            <br><small class="text-muted">For: <strong><?= esc($email) ?></strong></small>
        <?php endif; ?>
    </p>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('user/update-password') ?>" method="post" id="resetForm">
        <?= csrf_field() ?>
        
        <input type="hidden" name="token" value="<?= esc($token ?? '') ?>">

        <div class="mb-3">
            <label for="password" class="form-label">
                <i class="bi bi-lock me-1"></i> New Password <span class="text-danger">*</span>
            </label>
            <input type="password"
                   class="form-control"
                   id="password"
                   name="password"
                   placeholder="Enter new password (min 6 characters)"
                   required
                   minlength="6">
            <div class="password-requirements">
                <small>Password must be at least 6 characters long.</small>
            </div>
        </div>

        <div class="mb-4">
            <label for="password_confirm" class="form-label">
                <i class="bi bi-check-circle me-1"></i> Confirm Password <span class="text-danger">*</span>
            </label>
            <input type="password"
                   class="form-control"
                   id="password_confirm"
                   name="password_confirm"
                   placeholder="Re-enter new password"
                   required>
            <div class="form-text text-muted small" id="passwordMatchMessage">
                <i class="bi bi-info-circle"></i> Enter the same password twice to confirm.
            </div>
        </div>

        <button type="submit" class="btn btn-gradient" id="submitBtn">
            <i class="bi bi-check2-circle me-2"></i> Update Password
        </button>

        <a href="<?= base_url('user/login') ?>" class="btn btn-outline-teal mt-2">
            <i class="bi bi-arrow-left me-2"></i> Back to Login
        </a>

        <div class="footer-secure">
            <i class="bi bi-shield-lock-fill"></i> Protected by 256-bit SSL Encryption
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ==========================================
// PASSWORD MATCH VALIDATION
// ==========================================

document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password_confirm');
    const message = document.getElementById('passwordMatchMessage');

    function validatePasswordMatch() {
        if (password.value === '' && passwordConfirm.value === '') {
            message.innerHTML = '<i class="bi bi-info-circle"></i> Enter the same password twice to confirm.';
            message.className = 'form-text text-muted small';
            return;
        }

        if (password.value === passwordConfirm.value) {
            message.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i> Passwords match!';
            message.className = 'form-text text-success small';
        } else {
            message.innerHTML = '<i class="bi bi-exclamation-circle-fill text-danger"></i> Passwords do not match!';
            message.className = 'form-text text-danger small';
        }
    }

    password.addEventListener('input', validatePasswordMatch);
    passwordConfirm.addEventListener('input', validatePasswordMatch);

    // ==========================================
    // FORM SUBMIT VALIDATION
    // ==========================================

    document.getElementById('resetForm').addEventListener('submit', function(e) {
        if (password.value !== passwordConfirm.value) {
            e.preventDefault();
            alert('⚠️ Passwords do not match. Please fix and try again.');
            passwordConfirm.focus();
            return false;
        }

        if (password.value.length < 6) {
            e.preventDefault();
            alert('⚠️ Password must be at least 6 characters long.');
            password.focus();
            return false;
        }

        if (!confirm('Are you sure you want to change your password?')) {
            e.preventDefault();
            return false;
        }
    });
});
</script>

</body>
</html>