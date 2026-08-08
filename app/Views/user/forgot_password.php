<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Forgot Password</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f7fb;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .forgot-card {
            width: 100%;
            max-width: 450px;

            background: #ffffff;

            padding: 35px;

            border-radius: 15px;

            box-shadow: 0 10px 35px rgba(0,0,0,0.08);
        }

        .forgot-card h2 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .forgot-card p {
            color: #6c757d;
        }

        .btn-reset {
            width: 100%;
            padding: 12px;
            font-weight: 600;
        }

    </style>

</head>

<body>

<div class="forgot-card">

    <h2>Forgot Password?</h2>

    <p>
        Enter your registered email address and
        we will send you a password reset link.
    </p>

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>

    <?php endif; ?>


    <form
        action="<?= base_url('user/forgot-password') ?>"
        method="post"
    >

        <?= csrf_field() ?>

        <div class="mb-3">

            <label
                for="email"
                class="form-label"
            >
                Email Address
            </label>

            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                placeholder="Enter your registered email"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary btn-reset"
        >
            Send Reset Link
        </button>

    </form>


    <div class="text-center mt-4">

        <a href="<?= base_url('user/login') ?>">
            ← Back to Login
        </a>

    </div>

</div>

</body>

</html>