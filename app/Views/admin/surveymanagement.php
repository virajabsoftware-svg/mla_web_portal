<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System - Survey Management</title>
    <!-- Existing CSS dependencies (preserved) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
     
      
    <style>
        /* ===================================================== */
        /* PREMIUM SURVEY DASHBOARD - White + Beige + Gold Theme */
        /* ===================================================== */

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
            --radius-lg: 24px;
            --radius-xl: 28px;
            --radius-xxl: 32px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, var(--beige-light) 50%, var(--beige) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #1E293B;
            min-height: 100vh;
        }

        .survey_section {
            padding: 35px;
        }

        /* HEADER */
        .survey_header {
            position: relative;
            overflow: hidden;
            padding: 45px;
            border-radius: var(--radius-xxl);
            background: linear-gradient(135deg, var(--gold-dark), var(--gold), var(--gold-light), #1e293b);
            box-shadow: var(--shadow-gold-lg);
            margin-bottom: 35px;
        }

        .survey_header::before {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12), transparent);
            border-radius: 50%;
            top: -180px;
            right: -120px;
            animation: floatGlow 6s ease-in-out infinite;
        }

        .survey_header::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15), transparent);
            border-radius: 50%;
            bottom: -120px;
            left: -80px;
            animation: floatGlowDelayed 8s ease-in-out infinite;
        }

        @keyframes floatGlow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(15px) scale(1.05); }
        }

        @keyframes floatGlowDelayed {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-15px) scale(1.08); }
        }

        .survey_header h2 {
            color: white;
            font-size: 36px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .survey_header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            max-width: 600px;
            line-height: 1.7;
            position: relative;
            z-index: 2;
        }

        .header_btn {
            position: relative;
            overflow: hidden;
            border: none;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            color: white;
            padding: 14px 28px;
            border-radius: 48px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all var(--transition-base);
            box-shadow: var(--shadow-md);
            z-index: 2;
            cursor: pointer;
        }

        .header_btn i {
            margin-right: 8px;
        }

        .header_btn::before {
            content: "";
            position: absolute;
            width: 120%;
            height: 120%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            top: -130%;
            left: -130%;
            transform: rotate(25deg);
            transition: 0.6s;
        }

        .header_btn:hover::before {
            top: 100%;
            left: 100%;
        }

        .header_btn:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: var(--shadow-gold);
        }

        .header_btn:active {
            transform: scale(0.97);
        }

        /* STAT CARDS */
        .stat_card {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            padding: 28px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            height: 100%;
            cursor: pointer;
        }

        .stat_card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-light), var(--gold-dark), var(--gold));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .stat_card::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 255, 0.25) 40%, transparent 60%);
            transform: rotate(25deg);
            transition: transform 0.6s ease;
            opacity: 0;
            pointer-events: none;
        }

        .stat_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .stat_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .stat_card:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(50%);
        }

        @keyframes borderPulse {
            0%, 100% { opacity: 0.4; filter: blur(2px); }
            50% { opacity: 0.8; filter: blur(4px); }
        }

        .stat_icon {
            width: 65px;
            height: 65px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: white;
            margin-bottom: 18px;
            box-shadow: var(--shadow-gold);
            transition: all var(--transition-base);
        }

        .stat_card:hover .stat_icon {
            transform: scale(1.05);
        }

        .blue { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); }
        .green { background: linear-gradient(135deg, var(--gold-light), var(--gold)); }
        .orange { background: linear-gradient(135deg, var(--gold-dark), #b8860b); }
        .red { background: linear-gradient(135deg, #c0392b, var(--gold-dark)); }

        .stat_card h3 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .stat_card p {
            font-size: 14px;
            font-weight: 600;
            color: #64748B;
            margin: 0;
        }

        /* MLA SURVEY TABLE */
        .mla_survey_section {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .mla_survey_section:hover {
            box-shadow: var(--shadow-gold);
        }

        .mla_survey_section .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mla_survey_section .section-title i {
            color: var(--gold);
        }

        .mla_count_table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .mla_count_table thead th {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            padding: 15px 20px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .mla_count_table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .mla_count_table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .mla_count_table tbody tr {
            background: rgba(255, 255, 255, 0.8);
            transition: all var(--transition-base);
            cursor: default;
        }

        .mla_count_table tbody tr:hover {
            transform: scale(1.01);
            box-shadow: var(--shadow-gold);
            background: white;
        }

        .mla_count_table tbody td {
            padding: 15px 20px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-left: none;
            border-right: none;
            font-size: 14px;
            color: #1E293B;
        }

        .mla_count_table tbody td:first-child {
            border-left: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px 0 0 12px;
        }

        .mla_count_table tbody td:last-child {
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 0 12px 12px 0;
        }

        .mla_count_badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
            color: var(--gold-dark);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .mla_count_badge.high {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.05));
            color: #EF4444;
            border-color: rgba(239, 68, 68, 0.2);
        }

        .mla_count_badge.medium {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.05));
            color: #F59E0B;
            border-color: rgba(245, 158, 11, 0.2);
        }

        .mla_count_badge.low {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(16, 185, 129, 0.05));
            color: #10B981;
            border-color: rgba(16, 185, 129, 0.2);
        }

        /* Survey List Table */
        .survey_list_section {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .survey_list_section:hover {
            box-shadow: var(--shadow-gold);
        }

        .survey_list_section .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .survey_table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .survey_table thead th {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            padding: 12px 15px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            white-space: nowrap;
        }

        .survey_table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .survey_table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .survey_table tbody tr {
            background: rgba(255, 255, 255, 0.8);
            transition: all var(--transition-base);
        }

        .survey_table tbody tr:hover {
            transform: scale(1.01);
            box-shadow: var(--shadow-gold);
            background: white;
        }

        .survey_table tbody td {
            padding: 12px 15px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-left: none;
            border-right: none;
            font-size: 13px;
            color: #1E293B;
            vertical-align: middle;
        }

        .survey_table tbody td:first-child {
            border-left: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px 0 0 12px;
        }

        .survey_table tbody td:last-child {
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 0 12px 12px 0;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.active {
            background: #dcfce7;
            color: #166534;
        }

        .status-badge.pending {
            background: #fef9c3;
            color: #854d0e;
        }

        .status-badge.closed {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 8px;
            border: none;
            font-size: 13px;
            font-weight: 600;
            transition: all var(--transition-fast);
            cursor: pointer;
            margin: 0 2px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn.view-btn {
            background: #e0f2fe;
            color: #0369a1;
        }

        .action-btn.view-btn:hover {
            background: #bae6fd;
        }

        .action-btn.edit-btn {
            background: #fef3c7;
            color: #92400e;
        }

        .action-btn.edit-btn:hover {
            background: #fde68a;
        }

        .action-btn.delete-btn {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn.delete-btn:hover {
            background: #fca5a5;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--radius-xl);
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-gold-lg);
        }

        .modal-header {
            border-bottom: 2px solid var(--gold-light);
            background: linear-gradient(135deg, var(--cream), var(--beige-light));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .modal-header .modal-title {
            font-weight: 700;
            color: #0F172A;
        }

        .modal-body {
            padding: 25px 30px;
        }

        .modal-footer {
            border-top: 2px solid var(--gold-light);
            background: var(--beige-light);
            border-radius: 0 0 var(--radius-xl) var(--radius-xl);
        }

        .form-control, .form-select {
            border-radius: var(--radius-sm);
            border: 1px solid #e2e8f0;
            padding: 10px 15px;
            transition: all var(--transition-fast);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-glow);
        }

        .form-label {
            font-weight: 600;
            color: #1E293B;
            margin-bottom: 6px;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 48px;
            font-weight: 700;
            transition: all var(--transition-base);
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
            color: white;
        }

        .btn-gold-outline {
            background: transparent;
            color: var(--gold-dark);
            border: 2px solid var(--gold);
            padding: 8px 25px;
            border-radius: 48px;
            font-weight: 600;
            transition: all var(--transition-base);
        }

        .btn-gold-outline:hover {
            background: var(--gold);
            color: white;
        }

        /* Footer */
        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 1rem 2rem !important;
            text-align: center;
            margin: 2rem 20px 25px 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .footer p {
            margin: 0;
            color: #666 !important;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .survey_section { padding: 20px; }
            .survey_header { padding: 30px; text-align: center; }
            .survey_header h2 { font-size: 28px; }
            .text-lg-end { text-align: center !important; margin-top: 20px; }
        }

        @media (max-width: 768px) {
            .survey_section { padding: 15px; }
            .survey_header { padding: 25px; }
            .survey_header h2 { font-size: 24px; }
            .stat_card h3 { font-size: 26px; }
            .stat_icon { width: 50px; height: 50px; font-size: 20px; }
            .mla_survey_section { padding: 15px; }
            .survey_list_section { padding: 15px; }
            
            .survey_table thead { display: none; }
            .survey_table tbody tr { display: block; margin-bottom: 15px; border-radius: var(--radius-md); padding: 15px; background: white; box-shadow: var(--shadow-sm); }
            .survey_table tbody td { display: flex; justify-content: space-between; align-items: center; padding: 8px 12px !important; border: none !important; border-bottom: 1px solid rgba(0,0,0,0.05) !important; border-radius: 0 !important; }
            .survey_table tbody td:last-child { border-bottom: none; }
            .survey_table tbody td::before { content: attr(data-label); font-weight: 700; color: #64748B; font-size: 12px; }

            .mla_count_table thead { display: none; }
            .mla_count_table tbody tr { display: block; margin-bottom: 15px; border-radius: var(--radius-md); padding: 15px; background: white; box-shadow: var(--shadow-sm); }
            .mla_count_table tbody td { display: flex; justify-content: space-between; align-items: center; padding: 8px 12px !important; border: none !important; border-bottom: 1px solid rgba(0,0,0,0.05) !important; border-radius: 0 !important; }
            .mla_count_table tbody td:last-child { border-bottom: none; }
            .mla_count_table tbody td::before { content: attr(data-label); font-weight: 700; color: #64748B; font-size: 12px; }
        }

        @media (max-width: 576px) {
            .survey_header h2 { font-size: 20px !important; }
            .survey_header p { font-size: 12px; }
        }

        .floating { animation: floatCard 4s ease-in-out infinite; }
        @keyframes floatCard { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-6px); } }

        .stat_card, .analytics_box, .mla_survey_section, .survey_list_section {
            animation: fadeInUp 0.5s ease backwards;
        }
        .stat_card:nth-child(1) { animation-delay: 0.05s; }
        .stat_card:nth-child(2) { animation-delay: 0.1s; }
        .stat_card:nth-child(3) { animation-delay: 0.15s; }
        .stat_card:nth-child(4) { animation-delay: 0.2s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--beige); border-radius: 4px; }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold-dark); }

        .question-item {
            background: var(--beige-light);
            border-radius: var(--radius-sm);
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid var(--gold);
        }

        .option-item {
            background: white;
            padding: 8px 15px;
            margin: 3px 0;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .counter-number {
            animation: countPop 0.4s ease-out;
        }
        @keyframes countPop {
            0% { transform: scale(0.8); opacity: 0; }
            60% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>

<body class="inner_page widgets">
    <?php include "common/header.php"; ?>  
    <div class="container-fluid survey_section">

        <!-- HEADER -->
        <div class="survey_header mb-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2>
                        <i class="fa-solid fa-chart-simple me-2"></i> Smart Survey Management Dashboard
                    </h2>
                    <p>
                        AI-based public feedback, sentiment analysis, MLA analytics & participation monitoring system.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <button class="header_btn" onclick="openCreateSurveyModal()">
                        <i class="fa-solid fa-plus"></i>
                        Create New Survey
                    </button>
                </div>
            </div>
        </div>

        <!-- STATS CARDS -->
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat_card pulse-card">
                    <div class="stat_icon blue">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                    </div>
                    <h3 id="surveyCount">0</h3>
                    <p><i class="fa-solid fa-chart-line me-1"></i> Total Surveys</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat_card">
                    <div class="stat_icon green">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h3 id="responseCount">0</h3>
                    <p><i class="fa-solid fa-message me-1"></i> Total Responses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat_card">
                    <div class="stat_icon orange">
                        <i class="fa-solid fa-face-smile"></i>
                    </div>
                    <h3 id="satisfaction">0%</h3>
                    <p><i class="fa-solid fa-star me-1"></i> Citizen Satisfaction</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat_card">
                    <div class="stat_icon red">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3 id="participation">0%</h3>
                    <p><i class="fa-solid fa-person-walking-arrow-right me-1"></i> Participation Rate</p>
                </div>
            </div>
        </div>

        <!-- SURVEY LIST -->
        <div class="survey_list_section">
            <div class="section-title">
                <i class="fas fa-list me-2"></i> Survey Management
                <span style="font-size: 14px; font-weight: 400; color: #64748B; margin-left: auto;">
                    <i class="fas fa-edit me-1"></i> Create, manage, and monitor surveys
                </span>
            </div>

            <div class="table-responsive">
                <table class="survey_table" id="surveyTable">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 15%;">Category</th>
                            <th style="width: 15%;">MLA</th>
                            <th style="width: 10%;">Responses</th>
                            <th style="width: 12%;">Status</th>
                            <th style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="surveyBody">
                        <!-- Dynamic content -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MLA SURVEY COUNT SECTION -->
        <div class="mla_survey_section">
            <div class="section-title">
                <i class="fas fa-user-tie me-2"></i> MLA-wise Survey Count
                <span style="font-size: 14px; font-weight: 400; color: #64748B; margin-left: auto;">
                    <i class="fas fa-chart-bar me-1"></i> Total surveys conducted by each MLA
                </span>
            </div>

            <div class="table-responsive">
                <table class="mla_count_table" id="mlaCountTable">
                    <thead>
                        <tr>
                            <th style="width: 30%;">MLA Name</th>
                            <th style="width: 25%;">Total Surveys</th>
                            <th style="width: 25%;">Total Responses</th>
                            <th style="width: 20%;">Avg. Participation</th>
                        </tr>
                    </thead>
                    <tbody id="mlaCountBody">
                        <!-- Dynamic content -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="container-fluid">
        <div class="footer">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- ===================================================== -->
    <!-- MODALS -->
    <!-- ===================================================== -->

    <!-- Create/Edit Survey Modal -->
    <div class="modal fade" id="surveyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="surveyModalTitle">Create New Survey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="surveyForm">
                        <input type="hidden" name="id" id="surveyId" value="">
                        
                        <div class="mb-3">
                            <label class="form-label">Survey Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="surveyTitle" required placeholder="Enter survey title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="survey_category" id="surveyCategory" placeholder="e.g., Infrastructure, Health, Education">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="surveyDescription" rows="3" placeholder="Describe the survey purpose"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">MLA</label>
                                <select class="form-select" name="mla_id" id="surveyMla">
                                    <option value="0">No MLA Assigned</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status" id="surveyStatus">
                                    <option value="Active">Active</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="surveyStartDate">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="surveyEndDate">
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Constituency</label>
                            <input type="text" class="form-control" name="constituency" id="surveyConstituency" placeholder="Constituency name">
                        </div> -->

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-1">
                                    <i class="fas fa-list-check me-2 text-warning"></i>
                                    Survey Questions
                                </h6>

                                <small class="text-muted">
                                    Manage questions for this survey
                                </small>
                            </div>

                            <button type="button"
                                    class="btn btn-sm btn-gold"
                                    id="addQuestionFromEditFormBtn"
                                    onclick="addQuestionFromEdit()"
                                    style="display:none;">
                                <i class="fas fa-plus me-1"></i>
                                Add Question
                            </button>
                        </div>

                        <div id="editSurveyQuestions">
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-spinner fa-spin"></i>
                                Loading questions...
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gold-outline" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary" id="addQuestionFromEditBtn" style="display: none;" onclick="addQuestionFromEdit()">
                        <i class="fas fa-plus me-1"></i> Add Question
                    </button>
                    <button type="button" class="btn btn-gold" id="saveSurveyBtn">Save Survey</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Survey Modal -->
    <div class="modal fade" id="viewSurveyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSurveyTitle">Survey Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewSurveyBody">
                    <!-- Dynamic content -->
                </div>
                <div class="modal-footer">
                    <!--button type="button" class="btn btn-outline-primary" id="addQuestionFromViewBtn">
                        <i class="fas fa-plus me-1"></i> Add New Question
                    </button-->
                    <button type="button" class="btn btn-gold-outline" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Question Modal -->
    <div class="modal fade" id="questionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalTitle">Add Survey Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="questionForm">
                    <div class="modal-body">
                        <input type="hidden" name="survey_id" id="questionSurveyId">
                        <div class="mb-3">
                            <label class="form-label" for="questionText">Question <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="questionText" name="question" rows="3" required minlength="3" placeholder="Enter the question citizens should answer"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label" for="questionType">Answer Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="questionType" name="question_type" required>
                                    <option value="select">Dropdown</option>
                                    <!--option value="radio">Radio Button</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="text">Text Input</option>
                                    <option value="textarea">Text Area</option-->
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="questionOrder">Display Order</label>
                                <input type="number" class="form-control" id="questionOrder" name="sort_order" min="0" value="1">
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="questionRequired" name="is_required" value="1" checked>
                                    <label class="form-check-label" for="questionRequired">Required</label>
                                </div>
                            </div>
                        </div>
                        <div id="questionOptionsGroup" class="mb-3">
                            <label class="form-label">Answer Options</label>
                            <input type="text" class="form-control mb-2" name="options[]" placeholder="Option 1">
                            <input type="text" class="form-control mb-2" name="options[]" placeholder="Option 2">
                            <input type="text" class="form-control" name="options[]" placeholder="Option 3">
                            <small class="text-muted">Options are used for dropdown, radio and checkbox questions.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" id="questionSubmitBtn">Add Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this survey? This action cannot be undone.</p>
                    <p><strong>Note:</strong> All questions, options, and responses associated with this survey will also be deleted.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gold-outline" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
        <div id="toastNotification" class="alert" style="display: none; border-radius: var(--radius-sm); box-shadow: var(--shadow-lg); min-width: 300px; padding: 15px 20px;">
            <span id="toastMessage"></span>
            <button type="button" class="btn-close float-end" onclick="hideToast()"></button>
        </div>
    </div>

    <!-- jQuery, Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // =====================================================
    // GLOBAL VARIABLES
    // =====================================================
    let currentSurveyId = null;
    let currentQuestionId = null;
    let deleteTargetId = null;
    let isEditMode = false;
    let isQuestionEditMode = false;

    // =====================================================
    // TOAST NOTIFICATION
    // =====================================================
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toastNotification');
        const msg = document.getElementById('toastMessage');
        
        toast.className = 'alert alert-' + type + ' alert-dismissible fade show';
        toast.style.display = 'block';
        msg.textContent = message;
        
        setTimeout(() => {
            hideToast();
        }, 5000);
    }

    function hideToast() {
        document.getElementById('toastNotification').style.display = 'none';
    }

    // =====================================================
    // COUNTER ANIMATION
    // =====================================================
    function animateCounter(elementId, targetValue, suffix = '') {
        const element = document.getElementById(elementId);
        if (!element) return;

        let current = 0;
        const numericValue = typeof targetValue === 'string' ? parseInt(targetValue) : targetValue;
        const isPercentage = suffix === '%' || targetValue.toString().includes('%');
        const increment = numericValue / 50;

        const timer = setInterval(() => {
            current += increment;
            if (current >= numericValue) {
                element.textContent = targetValue + (isPercentage ? '' : suffix);
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + (isPercentage ? '%' : suffix);
            }
        }, 20);
    }

    // =====================================================
    // LOAD DASHBOARD DATA
    // =====================================================
    function loadDashboard() {
        fetch("<?= base_url('admin/survey-management/data') ?>")
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    // Update stats
                    const stats = data.stats;
                    animateCounter("surveyCount", stats.total_surveys || 0);
                    animateCounter("responseCount", stats.total_responses || 0);
                    animateCounter("satisfaction", stats.satisfaction || 0, '%');
                    animateCounter("participation", stats.participation || 0, '%');

                    // Render survey list
                    renderSurveys(data.surveys || []);
                    
                    // Render MLA count
                    renderMLACount(data.mlaCount || []);
                } else {
                    showToast('Failed to load dashboard data', 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error loading dashboard', 'danger');
            });
    }

    // =====================================================
    // RENDER SURVEYS
    // =====================================================
    function renderSurveys(surveys) {
        const tbody = document.getElementById("surveyBody");
        if (!tbody) return;

        if (surveys.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4" style="color: #64748B;">
                        <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                        No surveys found. Create your first survey!
                    </td>
                </tr>
            `;
            return;
        }

        let html = "";
        surveys.forEach((survey, index) => {
            const statusClass = survey.status ? survey.status.toLowerCase() : 'pending';
            const statusLabel = survey.status || 'Pending';
            const responses = survey.actual_responses || survey.responses || 0;
            const mlaName = survey.mla_name || 'Not Assigned';

            html += `
                <tr>
                    <td data-label="Title">
                        <strong>${escapeHtml(survey.title || 'Untitled')}</strong>
                        <br><small class="text-muted">${escapeHtml(survey.survey_code || '')}</small>
                    </td>
                    <td data-label="Category">${escapeHtml(survey.survey_category || '-')}</td>
                    <td data-label="MLA">${escapeHtml(mlaName)}</td>
                    <td data-label="Responses">
                        <span class="mla_count_badge">${responses}</span>
                    </td>
                    <td data-label="Status">
                        <span class="status-badge ${statusClass}">${statusLabel}</span>
                    </td>
                    <td data-label="Actions">
                        <button class="action-btn view-btn" onclick="viewSurvey(${survey.id})" title="View Survey">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-btn edit-btn" onclick="editSurvey(${survey.id})" title="Edit Survey">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-btn delete-btn" onclick="confirmDelete(${survey.id})" title="Delete Survey">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
    }

    // =====================================================
    // RENDER MLA COUNT
    // =====================================================
    function renderMLACount(data) {
        const tbody = document.getElementById("mlaCountBody");
        if (!tbody) return;

        if (!data || data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center py-4" style="color: #64748B;">
                        <i class="fas fa-user-tie fa-2x d-block mb-2"></i>
                        No MLAs found
                    </td>
                </tr>
            `;
            return;
        }

        let html = "";
        data.forEach((mla, index) => {
            let badge = "low";
            if (mla.total_surveys >= 5) badge = "high";
            else if (mla.total_surveys >= 2) badge = "medium";

            const participation = mla.avg_participation || 0;

            html += `
                <tr>
                    <td data-label="MLA Name">
                        <strong>${index + 1}. ${escapeHtml(mla.mla_name)}</strong>
                    </td>
                    <td data-label="Total Surveys">
                        <span class="mla_count_badge ${badge}">
                            ${mla.total_surveys} Surveys
                        </span>
                    </td>
                    <td data-label="Total Responses">
                        <span class="mla_count_badge">
                            ${mla.total_responses}
                        </span>
                    </td>
                    <td data-label="Avg Participation">
                        <div class="progress" style="width:100px;height:6px;display:inline-block;margin-right:8px;">
                            <div class="progress-bar" style="width:${Math.min(participation, 100)}%; background:#d4af37;"></div>
                        </div>
                        ${Math.round(participation)}%
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
    }

    // =====================================================
    // LOAD MLAS FOR DROPDOWN
    // =====================================================
    function loadMlas() {
        fetch("<?= base_url('admin/survey-management/get-mlas') ?>")
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    const select = document.getElementById('surveyMla');
                    select.innerHTML = '<option value="0">No MLA Assigned</option>';
                    data.data.forEach(mla => {
                        select.innerHTML += `<option value="${mla.id}">${escapeHtml(mla.mla_name)} (${escapeHtml(mla.mla_code)})</option>`;
                    });
                }
            })
            .catch(error => console.error('Error loading MLAs:', error));
    }

    // =====================================================
    // CREATE NEW SURVEY
    // =====================================================
        function openCreateSurveyModal() 
        {

            isEditMode = false;

            document.getElementById('surveyModalTitle').textContent = 'Create New Survey';
            document.getElementById('surveyId').value = '';
            document.getElementById('surveyForm').reset();
            document.getElementById('surveyStatus').value = 'Active';
            currentSurveyId = null;
            document.getElementById('addQuestionFromEditBtn').style.display ='none';

            document.getElementById('addQuestionFromEditFormBtn').style.display ='none';

            document.getElementById('editSurveyQuestions').innerHTML = ` <div class="text-center text-muted py-3">
                    Save the survey first to add questions.
                </div>
            `;
            const modal = new bootstrap.Modal(
                document.getElementById('surveyModal')
            );

            modal.show();
        }

    // =====================================================
    // EDIT SURVEY
    // =====================================================
    function editSurvey(id) {
        isEditMode = true;
        currentSurveyId = id;
        document.getElementById('surveyModalTitle').textContent = 'Edit Survey';
        
        // Load survey data
        fetch(`<?= base_url('admin/survey-management/get/') ?>${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    const survey = data.data;
                    document.getElementById('surveyId').value = survey.id;
                    document.getElementById('surveyTitle').value = survey.title || '';
                    document.getElementById('surveyCategory').value = survey.survey_category || '';
                    document.getElementById('surveyDescription').value = survey.description || '';
                    document.getElementById('surveyMla').value = survey.mla_id || 0;
                    document.getElementById('surveyStatus').value = survey.status || 'Active';
                    document.getElementById('surveyStartDate').value = survey.start_date || '';
                    document.getElementById('surveyEndDate').value = survey.end_date || '';
                   // document.getElementById('surveyConstituency').value = survey.constituency || '';
                    document.getElementById('addQuestionFromEditBtn').style.display = 'inline-block';
                    document.getElementById('addQuestionFromEditFormBtn').style.display = 'inline-block';
                    loadEditSurveyQuestions(survey.id);
                    const modal = new bootstrap.Modal(
                    document.getElementById('surveyModal')
                    );

                    modal.show();
                } else {
                    showToast('Failed to load survey data', 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error loading survey data', 'danger');
            });
    }

    // =====================================================
    // SAVE SURVEY
    // =====================================================
    document.getElementById('saveSurveyBtn').addEventListener('click', function() {
        const form = document.getElementById('surveyForm');
        const formData = new FormData(form);
        const surveyId = document.getElementById('surveyId').value;
        
        const url = surveyId 
            ? `<?= base_url('admin/survey-management/update/') ?>${surveyId}`
            : '<?= base_url('admin/survey-management/create') ?>';

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                showToast(data.message || 'Survey saved successfully', 'success');
                bootstrap.Modal.getInstance(document.getElementById('surveyModal')).hide();
                if (!surveyId && data.survey_id) {
                    openQuestionModal(data.survey_id);
                }
                loadDashboard();
            } else {
                let errorMsg = data.message || 'Failed to save survey';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).join(', ');
                }
                showToast(errorMsg, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error saving survey', 'danger');
        });
    });

    function addQuestionFromEdit() {
        if (!currentSurveyId) {
            showToast('Please save the survey before adding questions.', 'danger');
            return;
        }

        bootstrap.Modal.getInstance(document.getElementById('surveyModal')).hide();
        openQuestionModal(currentSurveyId);
    }

    function openQuestionModal(surveyId) 
    {

            currentQuestionId = null;
            isQuestionEditMode = false; 
            document.getElementById('questionForm').reset();
            document.getElementById('questionSurveyId').value = surveyId;
            document.getElementById('questionRequired').checked = true;
            document.getElementById('questionOrder').value = 1;
            document.getElementById('questionModalTitle').textContent = 'Add Survey Question';
            document.getElementById('questionSubmitBtn').textContent ='Add Question';
            bootstrap.Modal.getOrCreateInstance(
                document.getElementById('questionModal')
            ).show();
    }

    function editQuestion(question) {
        currentQuestionId = question.id;
        isQuestionEditMode = true;
        document.getElementById('questionSurveyId').value = currentSurveyId;
        document.getElementById('questionText').value = question.question || '';
        document.getElementById('questionType').value = question.question_type || 'select';
        document.getElementById('questionOrder').value = question.sort_order || 0;
        document.getElementById('questionRequired').checked = Number(question.is_required) === 1;
        document.getElementById('questionModalTitle').textContent = 'Edit Survey Question';
        document.getElementById('questionSubmitBtn').textContent = 'Update Question';

        const optionInputs = document.querySelectorAll('#questionOptionsGroup input[name="options[]"]');
        optionInputs.forEach((input, index) => {
            input.value = question.options && question.options[index]
                ? question.options[index].option_text
                : '';
        });
        document.getElementById('questionOptionsGroup').style.display =
            ['select', 'radio', 'checkbox'].includes(question.question_type) ? 'block' : 'none';

        bootstrap.Modal.getOrCreateInstance(document.getElementById('questionModal')).show();
    }

    function editQuestionFromButton(button) {
        try {
            editQuestion(JSON.parse(button.dataset.question));
        } catch (error) {
            showToast('Unable to load question details', 'danger');
        }
    }

    const addQuestionFromViewBtn = document.getElementById('addQuestionFromViewBtn');

    if (addQuestionFromViewBtn) {
        addQuestionFromViewBtn.addEventListener('click', function() {
            bootstrap.Modal.getInstance(
                document.getElementById('viewSurveyModal')
            ).hide();

            openQuestionModal(currentSurveyId);
        });
    }

    document.getElementById('questionType').addEventListener('change', function() {
        const optionType = ['select', 'radio', 'checkbox'].includes(this.value);
        document.getElementById('questionOptionsGroup').style.display = optionType ? 'block' : 'none';
    });

    document.getElementById('questionForm').addEventListener('submit', function(event)
    {
            event.preventDefault();

            const form = this;
            const formData = new FormData(form);

            const url = isQuestionEditMode
                ? `<?= base_url('admin/survey-management/update-question/') ?>${currentQuestionId}`
                : "<?= base_url('admin/survey-management/add-question') ?>";

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {

                if (!data.status) {
                    showToast(
                        data.message || 'Unable to add question',
                        'danger'
                    );
                    return;
                }

                showToast(
                    data.message || 'Question added successfully',
                    'success'
                );

                if (isQuestionEditMode) 
                {

                    bootstrap.Modal.getInstance(
                        document.getElementById('questionModal')
                    ).hide();

                    isQuestionEditMode = false;
                    currentQuestionId = null;

                    // Refresh question list
                    if (currentSurveyId) {
                        loadEditSurveyQuestions(currentSurveyId);
                    }

                    return;
                }

                // Keep modal open
                // Reset only question fields
                document.getElementById('questionText').value = '';

                document.getElementById('questionOrder').value =
                    parseInt(document.getElementById('questionOrder').value || 0) + 1;

                // Reset options
                const optionInputs = document.querySelectorAll(
                    '#questionOptionsGroup input[name="options[]"]'
                );

                optionInputs.forEach((input, index) => {
                    input.value = '';
                    input.placeholder = 'Option ' + (index + 1);
                });

                // Required checked
                document.getElementById('questionRequired').checked = true;

                // Focus question field
                document.getElementById('questionText').focus();

            })
            .catch(error => {
                console.error(error);
                showToast(
                    'Unable to add question',
                    'danger'
                );
            });
    });

    function loadEditSurveyQuestions(surveyId) 
    {

    const container = document.getElementById('editSurveyQuestions');

    container.innerHTML = `
        <div class="text-center text-muted py-3">
            <i class="fas fa-spinner fa-spin"></i>
            Loading questions...
        </div>
    `;

    fetch(`<?= base_url('admin/survey-management/get/') ?>${surveyId}`)
        .then(response => response.json())
        .then(data => {

            if (!data.status) {
                container.innerHTML = `
                    <div class="alert alert-danger">
                        Unable to load questions.
                    </div>
                `;
                return;
            }

            const survey = data.data;
            const questions = survey.questions || [];

            if (questions.length === 0) {

                container.innerHTML = `
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-circle-question fa-2x mb-2"></i>

                        <p class="mb-2">
                            No questions added yet.
                        </p>

                        <button type="button"
                                class="btn btn-sm btn-gold"
                                onclick="addQuestionFromEdit()">
                            <i class="fas fa-plus me-1"></i>
                            Add First Question
                        </button>
                    </div>
                `;

                return;
            }

            let html = '';

            questions.forEach((q, index) => {

                html += `
                    <div class="question-item mb-3">

                        <div class="d-flex justify-content-between align-items-start gap-3">

                            <div class="flex-grow-1">

                                <div class="mb-2">
                                    <strong>
                                        Q${index + 1}.
                                    </strong>

                                    ${escapeHtml(q.question)}
                                </div>

                                <div>
                                    <small class="text-muted">
                                        Type:
                                        <strong>
                                            ${escapeHtml(q.question_type || 'select')}
                                        </strong>

                                        &nbsp; | &nbsp;

                                        Required:
                                        <strong>
                                            ${Number(q.is_required) === 1 ? 'Yes' : 'No'}
                                        </strong>

                                        &nbsp; | &nbsp;

                                        Order:
                                        <strong>
                                            ${q.sort_order || index + 1}
                                        </strong>
                                    </small>
                                </div>

                                ${
                                    q.options && q.options.length
                                    ? `
                                        <div class="mt-2">

                                            <small class="text-muted">
                                                <strong>Options:</strong>
                                            </small>

                                            <div class="mt-1">
                                                ${
                                                    q.options.map(opt => `
                                                        <span class="option-item d-inline-block">
                                                            ${escapeHtml(opt.option_text)}
                                                        </span>
                                                    `).join('')
                                                }
                                            </div>

                                        </div>
                                    `
                                    : ''
                                }

                            </div>

                            <div>
                                <button type="button"
                                        class="btn btn-sm btn-outline-primary"
                                        data-question='${escapeHtml(JSON.stringify(q))}'
                                        onclick="editQuestionFromButton(this)">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </button>
                            </div>

                        </div>

                    </div>
                `;
            });

            container.innerHTML = html;

        })
        .catch(error => {

            console.error(error);

            container.innerHTML = `
                <div class="alert alert-danger">
                    Error loading questions.
                </div>
            `;
        });
}

    /*document.getElementById('questionForm').addEventListener('submit', function(event) {
        event.preventDefault();

        fetch("<?= base_url('admin/survey-management/add-question') ?>", {
            method: 'POST',
            body: new FormData(this),
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        })
            .then(response => response.json())
            .then(data => {
                if (!data.status) {
                    showToast(data.message || 'Unable to add question', 'danger');
                    return;
                }

                showToast(data.message || 'Question added successfully', 'success');
                bootstrap.Modal.getInstance(document.getElementById('questionModal')).hide();
            })
            .catch(() => showToast('Unable to add question', 'danger'));
    });*/

    // =====================================================
    // VIEW SURVEY
    // =====================================================
    function viewSurvey(id) {
        currentSurveyId = id;
        fetch(`<?= base_url('admin/survey-management/get/') ?>${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    const survey = data.data;
                    document.getElementById('viewSurveyTitle').textContent = survey.title || 'Survey Details';
                    
                    let html = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> ${escapeHtml(survey.title)}</p>
                                <p><strong>Code:</strong> ${escapeHtml(survey.survey_code)}</p>
                                <p><strong>Category:</strong> ${escapeHtml(survey.survey_category || '-')}</p>
                                <p><strong>Status:</strong> <span class="status-badge ${survey.status ? survey.status.toLowerCase() : 'pending'}">${survey.status || 'Pending'}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>MLA:</strong> ${escapeHtml(survey.mla_name || 'Not Assigned')}</p>
                                <p><strong>Constituency:</strong> ${escapeHtml(survey.constituency || '-')}</p>
                                <p><strong>Responses:</strong> ${survey.response_count || 0}</p>
                                <p><strong>Dates:</strong> ${survey.start_date || 'N/A'} to ${survey.end_date || 'N/A'}</p>
                            </div>
                        </div>
                        <hr>
                        <h6><strong>Description:</strong></h6>
                        <p>${escapeHtml(survey.description || 'No description provided.')}</p>
                        <hr>
                        <h6><strong>Questions (${survey.questions ? survey.questions.length : 0})</strong></h6>
                    `;

                    if (survey.questions && survey.questions.length > 0) {
                       survey.questions.forEach((q, index) => {
    html += `
                                <div class="question-item">
                                    <div>
                                        <strong>Q${index + 1}:</strong>
                                        ${escapeHtml(q.question)}
                                    </div>

                                    <div class="mt-2">
                                        <small class="text-muted">
                                            Type: ${escapeHtml(q.question_type || 'select')}
                                            |
                                            Required: ${Number(q.is_required) === 1 ? 'Yes' : 'No'}
                                        </small>
                                    </div>

                                    ${
                                        q.options && q.options.length > 0
                                        ? `
                                            <div class="mt-2">
                                                <small>
                                                    <strong>Options:</strong>
                                                </small>

                                                <div class="mt-1">
                                                    ${q.options.map(opt => `
                                                        <span class="option-item d-inline-block">
                                                            ${escapeHtml(opt.option_text)}
                                                        </span>
                                                    `).join('')}
                                                </div>
                                            </div>
                                        `
                                        : ''
                                    }
                                </div>
                            `;
                        });
                    } else {
                        html += `<p class="text-muted">No questions added yet.</p>`;
                    }

                    document.getElementById('viewSurveyBody').innerHTML = html;
                    const modal = new bootstrap.Modal(document.getElementById('viewSurveyModal'));
                    modal.show();
                } else {
                    showToast('Failed to load survey details', 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error loading survey details', 'danger');
            });
    }

    // =====================================================
    // DELETE SURVEY
    // =====================================================
    function confirmDelete(id) {
        deleteTargetId = id;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (!deleteTargetId) return;

        fetch(`<?= base_url('admin/survey-management/delete/') ?>${deleteTargetId}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                showToast(data.message || 'Survey deleted successfully', 'success');
                bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                deleteTargetId = null;
                loadDashboard();
            } else {
                showToast(data.message || 'Failed to delete survey', 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error deleting survey', 'danger');
        });
    });

    // =====================================================
    // UTILITY FUNCTIONS
    // =====================================================
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // =====================================================
    // INITIALIZATION
    // =====================================================
    document.addEventListener("DOMContentLoaded", function() {
        loadMlas();
        loadDashboard();
    });
    </script>
    <script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>