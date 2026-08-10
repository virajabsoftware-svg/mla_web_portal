<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>View Rating Question</title>
    
    <!-- ============================================================
         REFERENCE HEADER DEPENDENCIES
         ============================================================ -->
    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap 4.0.0 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Popper.js 1.12.9 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <!-- Bootstrap 4.0.0 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Header CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    
    <!-- Font Awesome 6.0.0-beta3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts: Inter + Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.0-alpha1 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- ============================================================
         PAGE-SPECIFIC CSS (merged with reference global CSS)
         ============================================================ -->
    <style>
        /* ============================================================
           CSS VARIABLES — EXACTLY FROM REFERENCE CODE
           ============================================================ */
        :root {
            --pure-white: #ffffff;
            --cream: #fef8f0;
            --beige-light: #faf6ed;
            --beige: #f5ede1;
            --beige-dark: #e8dccc;
            --gold-light: #f5e7c8;
            --gold: #d4af37;
            --gold-dark: #b8960c;
            --gold-glow: rgba(212, 175, 55, 0.35);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03), 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.08);
            --shadow-gold: 0 12px 30px rgba(212, 175, 55, 0.2);
            --shadow-gold-lg: 0 20px 40px rgba(212, 175, 55, 0.25);
            --radius-sm: 12px;
            --radius-md: 18px;
            --radius-lg: 20px;
            --radius-xl: 24px;
            --radius-xxl: 32px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        /* ============================================================
           GLOBAL RESET & BODY — MERGED FROM REFERENCE
           ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(145deg, var(--beige-light) 0%, var(--cream) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c2418;
            padding-bottom: 3rem;
        }

        /* ============================================================
           SCROLLBAR STYLING — FROM REFERENCE
           ============================================================ */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1e8db;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold-dark);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }

        /* ============================================================
           PAGE CONTAINER
           ============================================================ */
        .cream-container {
            padding-top: 30px !important;
        }

        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ============================================================
           GOLD GRADIENT TEXT — FROM REFERENCE
           ============================================================ */
        .gold-gradient-text {
            background: linear-gradient(135deg, #b37b2e, var(--gold-dark), #d4af37, #e8c97a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
        }

        /* ============================================================
           BADGE CREAM GOLD — FROM REFERENCE
           ============================================================ */
        .badge-cream-gold {
            background: var(--beige-dark);
            color: #7a5a2a;
            font-weight: 600;
            border-left: 4px solid var(--gold);
            box-shadow: var(--shadow-sm);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            padding: 0.5rem 1.5rem;
            font-size: 0.85rem;
        }

        /* ============================================================
           GOLD DIVIDER — FROM REFERENCE
           ============================================================ */
        .gold-divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
            margin: 0.5rem auto;
            border-radius: 4px;
        }

        /* ============================================================
           PREMIUM CARD — FROM REFERENCE MLA CARD STYLING
           ============================================================ */
        .premium-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
        }

        .premium-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold-light);
        }

        .premium-card .card-header {
            background: linear-gradient(135deg, #faf3e6, #f5ede1);
            border-bottom: 2px solid var(--gold-light);
            padding: 1.5rem 2rem;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .premium-card .card-header h1,
        .premium-card .card-header h5 {
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c1f0f;
        }

        .premium-card .card-body {
            padding: 2rem;
            background: rgba(255, 252, 245, 0.5);
        }

        /* ============================================================
           BUTTONS — FROM REFERENCE
           ============================================================ */
        .btn-warm-gold {
            background: linear-gradient(115deg, #d4af37, #b8860b);
            border: none;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 60px;
            box-shadow: var(--shadow-gold);
            transition: var(--transition-fast);
            color: #2c1f0f;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-warm-gold:hover {
            transform: translateY(-2px);
            background: linear-gradient(115deg, #e0bc4a, #c9951a);
            box-shadow: 0 12px 22px rgba(180, 130, 30, 0.3);
            color: #2c1f0f;
        }

        .btn-outline-cream {
            border: 1px solid var(--gold);
            background: transparent;
            color: #8b6946;
            font-weight: 600;
            border-radius: 60px;
            padding: 10px 24px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            transition: var(--transition-fast);
        }

        .btn-outline-cream:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
            color: #8b6946;
        }

        .btn-secondary {
            background: var(--beige);
            border: none;
            color: #5a442a;
            font-weight: 600;
            border-radius: 40px;
            padding: 10px 24px;
            transition: var(--transition-fast);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-secondary:hover {
            background: #e0d5bf;
            transform: translateY(-2px);
            color: #5a442a;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        /* ============================================================
           TABLE — FROM REFERENCE PREMIUM TABLE
           ============================================================ */
        .premium-table-wrapper {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            padding: 0.5rem;
            border: 1px solid #f3ecd9;
            box-shadow: var(--shadow-sm);
            overflow-x: auto;
        }

        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .premium-table tr {
            background: rgba(255, 252, 245, 0.7);
            transition: all 0.2s ease;
            border-radius: 12px;
        }

        .premium-table tr:hover {
            background: #fffcf0;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.08);
        }

        .premium-table th {
            background: linear-gradient(135deg, #faf3e6, #f5ede1);
            color: #7a5f3a;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 14px 20px;
            border: none;
            border-bottom: 2px solid var(--gold-light);
            width: 200px;
        }

        .premium-table td {
            padding: 14px 20px;
            border: none;
            border-bottom: 1px solid #f1e8db;
            vertical-align: middle;
            font-size: 0.95rem;
            color: #2c2418;
        }

        .premium-table tr:last-child td {
            border-bottom: none;
        }

        .premium-table th:first-child {
            border-radius: 16px 0 0 16px;
        }

        .premium-table td:last-child {
            border-radius: 0 16px 16px 0;
        }

        /* ============================================================
           BADGES — FROM REFERENCE
           ============================================================ */
        .badge-premium {
            background: linear-gradient(110deg, #d4af37, #f3e5ab);
            color: #2c2418;
            font-weight: 600;
            padding: 0.35rem 0.9rem;
            border-radius: 40px;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .badge-active {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .badge-inactive {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #fce4e4;
            color: #c62828;
            border: 1px solid #ef9a9a;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        /* ============================================================
           OPTIONS TABLE INSIDE VIEW
           ============================================================ */
        .options-inner-table {
            border-collapse: separate;
            border-spacing: 0 4px;
            max-width: 500px;
        }

        .options-inner-table thead th {
            background: var(--beige-light);
            color: #7a5f3a;
            font-weight: 700;
            font-size: 0.7rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 8px 14px;
            border: none;
            border-bottom: 2px solid var(--gold-light);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .options-inner-table tbody td {
            padding: 8px 14px;
            border: none;
            border-bottom: 1px solid #f1e8db;
            font-size: 0.9rem;
            color: #2c2418;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .options-inner-table tbody tr:hover td {
            background: #fffcf0;
        }

        .options-inner-table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .options-inner-table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .options-inner-table tbody td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .options-inner-table tbody td:last-child {
            border-radius: 0 12px 12px 0;
        }

        /* ============================================================
           FOOTER — FROM REFERENCE
           ============================================================ */
        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 1rem 2rem !important;
            text-align: center;
            margin: 2rem 20px 25px 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
        }

        .footer p {
            margin: 0;
            color: #666 !important;
            font-size: 0.9rem;
            font-weight: 500;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .footer a {
            color: #b8860b !important;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #d4af37 !important;
        }

        /* ============================================================
           RESPONSIVE — FROM REFERENCE
           ============================================================ */
        @media (max-width: 768px) {
            .cream-container {
                padding-top: 20px !important;
            }

            .premium-card .card-header {
                padding: 1rem 1.25rem;
            }

            .premium-card .card-header h1 {
                font-size: 1.5rem;
            }

            .premium-card .card-body {
                padding: 1rem;
            }

            .premium-table th,
            .premium-table td {
                padding: 10px 14px;
                font-size: 0.85rem;
            }

            .btn-warm-gold,
            .btn-outline-cream,
            .btn-secondary {
                padding: 8px 18px;
                font-size: 0.85rem;
            }

            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }

            .badge-cream-gold {
                font-size: 0.75rem;
                padding: 0.3rem 1rem;
            }

            .options-inner-table {
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .premium-card .card-header h1 {
                font-size: 1.2rem;
            }

            .premium-table th,
            .premium-table td {
                padding: 8px 10px;
                font-size: 0.75rem;
            }

            .premium-table th {
                width: 120px;
                font-size: 0.7rem;
            }

            .btn-warm-gold,
            .btn-outline-cream,
            .btn-secondary {
                padding: 6px 14px;
                font-size: 0.75rem;
            }

            .badge-active,
            .badge-inactive {
                font-size: 0.6rem;
                padding: 2px 10px;
            }

            .options-inner-table thead th,
            .options-inner-table tbody td {
                font-size: 0.7rem;
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid cream-container">
        <!-- EXISTING HEADER INCLUDE - KEPT EXACTLY AS IS -->
        <?php include "common/header.php"; ?>

        <!-- Hero Section -->
        <div class="text-center mb-4">
            <span class="badge badge-cream-gold px-4 py-2 rounded-pill">
                <i class="fas fa-eye me-2"></i> QUESTION DETAILS
            </span>
            <h1 class="display-5 fw-bold mt-3 gold-gradient-text">
                <i class="fas fa-eye me-3"></i> View Question #<?= $question['question_no'] ?>
            </h1>
            <div class="gold-divider"></div>
            <p class="mt-2" style="color:#9b7c54; font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">
                <i class="fas fa-info-circle me-2"></i> Complete details of the rating question
            </p>
        </div>

        <!-- Back Button -->
        <div class="mb-4">
            <a href="<?= base_url('admin/ratingquestion') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>

        <!-- Main Card -->
        <div class="premium-card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2" style="color: var(--gold-dark);"></i> Question #<?= $question['question_no'] ?></h5>
            </div>
            <div class="card-body">
                <div class="premium-table-wrapper">
                    <table class="premium-table">
                        <tr>
                            <th>Question Number</th>
                            <td><strong><?= $question['question_no'] ?></strong></td>
                        </tr>
                        <tr>
                            <th>Question Text</th>
                            <td><?= esc($question['question']) ?></td>
                        </tr>
                        <tr>
                            <th>Question Type</th>
                            <td>
                                <span class="badge-premium">
                                    <?= ucfirst($question['question_type']) ?>
                                </span>
                            </td>
                        </tr>
                        
                        <?php if ($question['question_type'] === 'select' || $question['question_type'] === 'checkbox_group'): ?>
                            <?php
                                // The data is already decoded in the controller, so use it directly
                                $options = $question['options'] ?? [];
                                $ratings = $question['option_ratings'] ?? [];
                                
                                // If they are strings, decode them
                                if (is_string($options)) {
                                    $options = json_decode($options, true) ?: [];
                                }
                                if (is_string($ratings)) {
                                    $ratings = json_decode($ratings, true) ?: [];
                                }
                            ?>
                            <tr>
                                <th>Options &amp; Ratings</th>
                                <td>
                                    <?php if (!empty($options) && is_array($options)): ?>
                                        <table class="table table-sm options-inner-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Option</th>
                                                    <th>Rating Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($options as $i => $opt): ?>
                                                    <tr>
                                                        <td><?= esc($opt) ?></td>
                                                        <td><?= isset($ratings[$i]) ? $ratings[$i] : 0 ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <span class="text-muted" style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">No options defined</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php elseif ($question['question_type'] === 'range'): ?>
                            <tr>
                                <th>Range Settings</th>
                                <td>
                                    <strong style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">Minimum:</strong> <?= $question['min_value'] ?? 1 ?> &nbsp;|&nbsp;
                                    <strong style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">Maximum:</strong> <?= $question['max_value'] ?? 10 ?>
                                </td>
                            </tr>
                        <?php elseif ($question['question_type'] === 'textarea'): ?>
                            <tr>
                                <th>Textarea Settings</th>
                                <td>
                                    <strong style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">Placeholder:</strong> <?= esc($question['placeholder'] ?? 'N/A') ?><br>
                                    <strong style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">Rows:</strong> <?= $question['rows'] ?? 3 ?>
                                </td>
                            </tr>
                        <?php elseif ($question['question_type'] === 'text'): ?>
                            <tr>
                                <th>Text Input Settings</th>
                                <td>
                                    <strong style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">Placeholder:</strong> <?= esc($question['placeholder'] ?? 'N/A') ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="<?= $question['status'] == 1 ? 'badge-active' : 'badge-inactive' ?>">
                                    <?= $question['status'] == 1 ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Sort Order</th>
                            <td><?= $question['sort_order'] ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?= $question['created_at'] ?? 'N/A' ?></td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td><?= $question['updated_at'] ?? 'N/A' ?></td>
                        </tr>
                    </table>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="<?= base_url('admin/ratingquestion/edit/' . $question['id']) ?>" class="btn btn-warm-gold">
                        <i class="fas fa-edit me-2"></i>Edit Question
                    </a>
                    <a href="<?= base_url('admin/ratingquestion') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Header JS (if required by header.php) -->
    <script src="header.js"></script>
</body>
</html>