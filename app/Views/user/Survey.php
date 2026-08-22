<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>GovTrack Aura | Premium Governance Dashboard</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
    <!-- Bootstrap 5 Grid & Utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F4F2F5;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        :root {
            --soft-white: #F4F2F5;
            --lime-gold: #C3C848;
            --olive-green: #6B8A22;
            --teal-blue: #225661;
            --dark-olive: #454D28;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --shadow-sm: 0 12px 28px rgba(0, 0, 0, 0.05);
            --shadow-lift: 0 25px 35px -12px rgba(0, 0, 0, 0.15);
            --transition-smooth: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        /* ================================================================
           MAIN CONTENT
        ================================================================ */
        .main-content {
            position: relative;
            min-height: 100vh;
            max-width: none;
            margin: 0;
            margin-left: 280px;
            margin-top: 70px;
            padding: 1.5rem 2rem;
            transition: margin-left 0.3s ease;
            overflow-x: hidden;
            height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .sidebar-collapsed .main-content,
        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        .main-content::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }
        .main-content::-webkit-scrollbar-thumb {
            background: var(--lime-gold);
            border-radius: 10px;
        }
        .main-content::-webkit-scrollbar-thumb:hover {
            background: var(--olive-green);
        }

        .survey_dashboard {
            width: 100%;
            max-width: 100%;
        }

        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100%;
        }

        [class*="col-"] {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        /* ================================================================
           DASHBOARD CARDS - FIXED TO NOT AFFECT MODALS
        ================================================================ */
        .dashboard-card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--lime-gold), var(--olive-green), var(--teal-blue), var(--lime-gold));
            background-size: 300% 300%;
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .dashboard-card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .dashboard-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lift), 0 0 0 2px rgba(195, 200, 72, 0.2);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .stat-card { cursor: pointer; }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }
        .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
        }

        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: rgba(195, 200, 72, 0.1);
            color: var(--teal-blue);
            font-weight: 600;
            border-bottom: 2px solid var(--lime-gold);
            padding: 12px;
        }
        .table tbody td {
            padding: 12px;
            vertical-align: middle;
            color: var(--dark-olive);
        }
        .table-hover tbody tr:hover {
            background: rgba(195, 200, 72, 0.05);
            transition: background 0.2s;
            cursor: pointer;
        }
        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
        }

        .badge.bg-success {
            background: var(--olive-green) !important;
            font-weight: 500;
            padding: 5px 14px;
        }
        .rounded-pill {
            border-radius: 50px !important;
        }

        .progress-bar-custom {
            background: rgba(195, 200, 72, 0.2);
            border-radius: 20px;
            height: 8px;
            overflow: hidden;
        }
        .progress-fill {
            background: linear-gradient(90deg, var(--lime-gold), var(--olive-green));
            border-radius: 20px;
            height: 100%;
            width: 0%;
            transition: width 0.5s ease;
            position: relative;
            overflow: hidden;
        }
        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));
            animation: shimmerMove 1.8s infinite;
        }
        @keyframes shimmerMove {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .step-indicator {
            background: rgba(195, 200, 72, 0.15);
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--teal-blue);
        }

        .form-label {
            font-weight: 600;
            color: var(--teal-blue);
            margin-bottom: 8px;
            display: block;
        }
        .form-control, .form-select {
            background: white;
            border: 1px solid rgba(195, 200, 72, 0.6);
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.2s;
            width: 100%;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--lime-gold);
            box-shadow: 0 0 0 3px rgba(195, 200, 72, 0.3);
            outline: none;
        }
        .form-control.bg-light {
            background: rgba(195, 200, 72, 0.1);
        }

        .question-item {
            background: rgba(195, 200, 72, 0.05);
            border-radius: 20px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.25rem;
            transition: all 0.2s;
            border: 1px solid rgba(195, 200, 72, 0.2);
        }
        .question-text {
            font-weight: 700;
            color: var(--teal-blue);
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .alert-light {
            background: rgba(195, 200, 72, 0.1);
            border: 1px solid rgba(195, 200, 72, 0.2);
            border-radius: 16px;
            color: var(--teal-blue);
        }
        .text-muted {
            color: var(--dark-olive) !important;
            opacity: 0.7;
        }

        .btn-navigate {
            border-radius: 40px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-prev {
            background: rgba(195, 200, 72, 0.15);
            color: var(--teal-blue);
            border: 1px solid rgba(195, 200, 72, 0.3);
        }
        .btn-prev:hover {
            background: rgba(195, 200, 72, 0.25);
            transform: translateX(-3px);
        }
        .btn-next {
            background: linear-gradient(95deg, var(--lime-gold), var(--olive-green));
            color: #1F3F3A;
            position: relative;
            overflow: hidden;
        }
        .btn-next::after, .btn-submit-modern::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, rgba(255, 255, 255, 0) 10%, rgba(255, 255, 240, 0.6) 50%, rgba(255, 255, 255, 0) 90%);
            transform: rotate(25deg);
            transition: all 0.5s;
            opacity: 0;
        }
        .btn-next:hover::after, .btn-submit-modern:hover::after {
            left: 100%;
            opacity: 0.8;
        }
        .btn-next:hover {
            transform: translateX(3px);
        }

        .btn-submit-modern {
            background: linear-gradient(95deg, var(--olive-green), #8ab33a);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            padding: 12px 32px;
            border-radius: 40px;
        }
        .btn-submit-modern:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(107, 138, 34, 0.3);
        }
        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 8px 16px;
            background: rgba(195, 200, 72, 0.08);
            border-radius: 40px;
            border: 1px solid rgba(195, 200, 72, 0.3);
            transition: all 0.2s;
            cursor: pointer;
        }
        .radio-option:hover {
            background: rgba(195, 200, 72, 0.15);
            border-color: var(--lime-gold);
        }
        .radio-option input {
            margin: 0;
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: var(--olive-green);
        }
        .radio-option label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            color: var(--dark-olive);
        }

        .fade-page-transition {
            animation: pageFade 0.5s ease-out;
        }
        @keyframes pageFade {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUpSlide 0.6s ease-out forwards;
        }
        @keyframes fadeUpSlide {
            to { opacity: 1; transform: translateY(0); }
        }

        .stat-card-1 { animation-delay: 0.05s; }
        .stat-card-2 { animation-delay: 0.1s; }
        .stat-card-3 { animation-delay: 0.15s; }
        .stat-card-4 { animation-delay: 0.2s; }

        .required-field::after {
            content: ' *';
            color: #dc3545;
            font-weight: bold;
        }

        @media (max-width: 1024px) {
            .main-content { padding: 1.25rem 1.5rem; }
            .stat-number { font-size: 2rem; }
        }
        @media (max-width: 768px) {
            .main-content { padding: 1rem 1.25rem; margin-left: 0; }
            body.sidebar-collapsed .main-content { margin-left: 0; }
            .stat-number { font-size: 1.75rem; }
            .btn-navigate { padding: 8px 18px; font-size: 0.85rem; }
        }
        @media (max-width: 576px) {
            .main-content { padding: 0.875rem 1rem; }
            .stat-number { font-size: 1.5rem; }
            .form-control, .form-select { padding: 8px 12px; }
            .btn-submit-modern { width: 100%; }
            .radio-group { flex-direction: column; gap: 0.5rem; }
        }
        @media (min-width: 1920px) {
            .main-content { padding: 2rem 2.5rem; }
        }

        body.sidebar-expanded .main-content { margin-left: 280px; }
        body.sidebar-collapsed .main-content { margin-left: 80px; }

        .fw-semibold { font-weight: 600; }
        .fw-bold { font-weight: 700; }
        .me-1 { margin-right: 0.25rem; }
        .me-2 { margin-right: 0.5rem; }
        .ms-2 { margin-left: 0.5rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
        .mb-0 { margin-bottom: 0; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mb-5 { margin-bottom: 3rem; }
        .px-3 { padding-left: 1rem; padding-right: 1rem; }
        .px-4 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .gap-2 { gap: 0.5rem; }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .small { font-size: 0.8rem; }
        .border-0 { border: none !important; }
        .bi { display: inline-block; }
        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 100% !important;
        }

        .footer {
            position: relative;
            margin-top: 2rem;
            padding: 18px 25px;
            background: var(--glass-bg);
            border: 1px solid rgba(195, 200, 72, 0.30);
            border-radius: 24px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            overflow: hidden;
            transition: var(--transition-smooth);
        }
        .footer::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--lime-gold), var(--olive-green), var(--teal-blue), var(--lime-gold));
            background-size: 300% 300%;
            border-radius: 26px;
            z-index: -1;
            opacity: 0;
            transition: 0.5s ease;
        }
        .footer:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }
        .footer:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lift);
        }
        .footer p {
            margin: 0;
            color: var(--dark-olive);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }
        .footer a {
            color: var(--teal-blue);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            transition: 0.3s ease;
        }
        .footer a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0;
            height: 2px;
            background: var(--lime-gold);
            transition: 0.3s ease;
        }
        .footer a:hover {
            color: var(--olive-green);
        }
        .footer a:hover::after {
            width: 100%;
        }
        @media (max-width: 768px) {
            .footer { padding: 15px; border-radius: 18px; margin-top: 1.5rem; }
            .footer p { font-size: 0.85rem; line-height: 1.6; }
        }

        /* ================================================================
           SURVEY HISTORY
        ================================================================ */
        .survey-history-table {
            min-width: 1050px;
        }

        .survey-history-table thead th {
            white-space: nowrap;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .survey-history-table tbody tr {
            transition: all 0.25s ease;
        }

        .survey-history-table tbody tr:hover {
            transform: translateY(-2px);
        }

        .history-number {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(195, 200, 72, 0.15);
            color: var(--teal-blue);
            font-weight: 700;
        }

        .survey-id-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: rgba(34, 86, 97, 0.08);
            color: var(--teal-blue);
            font-size: 0.78rem;
            font-weight: 700;
        }

        .history-title {
            color: var(--teal-blue);
            font-weight: 700;
            margin-bottom: 3px;
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .history-category {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 30px;
            background: rgba(195, 200, 72, 0.12);
            color: var(--dark-olive);
            font-size: 0.78rem;
            font-weight: 600;
            max-width: 170px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .answer-preview {
            display: flex;
            flex-direction: column;
            gap: 4px;
            max-width: 160px;
        }

        .answer-chip {
            display: block;
            background: rgba(195, 200, 72, 0.08);
            border: 1px solid rgba(195, 200, 72, 0.2);
            color: var(--dark-olive);
            padding: 4px 8px;
            border-radius: 7px;
            font-size: 0.72rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .answer-more {
            font-size: 0.72rem;
            color: var(--teal-blue);
            font-weight: 700;
        }

        .history-date {
            white-space: nowrap;
            font-size: 0.78rem;
            color: var(--dark-olive);
        }

        .history-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
        }

        .history-action-btn {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .history-action-btn.view {
            background: rgba(34, 86, 97, 0.10);
            color: var(--teal-blue);
        }

        .history-action-btn.edit {
            background: rgba(195, 200, 72, 0.18);
            color: var(--dark-olive);
        }

        .history-action-btn.delete {
            background: rgba(220, 53, 69, 0.10);
            color: #dc3545;
        }

        .history-action-btn:hover {
            transform: translateY(-3px) scale(1.05);
        }

        .history-action-btn.view:hover {
            background: var(--teal-blue);
            color: white;
        }

        .history-action-btn.edit:hover {
            background: var(--lime-gold);
            color: var(--teal-blue);
        }

        .history-action-btn.delete:hover {
            background: #dc3545;
            color: white;
        }

        .empty-history {
            padding: 20px;
        }

        .empty-history-icon {
            width: 65px;
            height: 65px;
            margin: auto;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(195, 200, 72, 0.12);
            color: var(--teal-blue);
            font-size: 1.6rem;
        }

        @media (max-width: 768px) {
            .survey-history-table {
                min-width: 950px;
            }

            .history-actions {
                gap: 5px;
            }

            .history-action-btn {
                width: 31px;
                height: 31px;
                font-size: 0.75rem;
            }
        }

        /* ================================================================
           MODAL FIXES - CRITICAL FOR FIXING BLUR/TRANSPARENCY
           These styles ensure modals appear above backdrop with solid background
        ================================================================ */
        
        /* Modal container - ensure highest z-index and no filters */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1055 !important;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
            filter: none !important;
            -webkit-filter: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        /* Modal backdrop - solid and behind modal */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040 !important;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5) !important;
            filter: none !important;
            -webkit-filter: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        /* Modal dialog - ensure proper positioning */
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 1.75rem auto;
            pointer-events: none;
            max-width: 1140px;
            filter: none !important;
            -webkit-filter: none !important;
            transform: none !important;
        }

        /* Modal content - SOLID WHITE background, no blur, above everything */
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #ffffff !important;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 20px !important;
            outline: 0;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
            filter: none !important;
            -webkit-filter: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            opacity: 1 !important;
            z-index: 1060 !important;
        }

        /* Modal header - SOLID white */
        .modal-header {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            background-color: #ffffff !important;
            background-image: none !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Modal body - SOLID white */
        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1.5rem;
            background-color: #ffffff !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Modal footer - SOLID white */
        .modal-footer {
            display: flex;
            flex-shrink: 0;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            padding: 1rem 1.5rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: 20px !important;
            border-bottom-left-radius: 20px !important;
            background-color: #ffffff !important;
            background-image: none !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Modal title - ensure readable */
        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
            color: var(--teal-blue) !important;
            font-weight: 700 !important;
            text-shadow: none !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Ensure all modal text is readable */
        .modal-body label,
        .modal-body input,
        .modal-body select,
        .modal-body textarea,
        .modal-body .form-label,
        .modal-body .question-text,
        .modal-body .question-item,
        .modal-body .alert,
        .modal-body p,
        .modal-body h6,
        .modal-body .form-control,
        .modal-body .form-select {
            color: #212529 !important;
            text-shadow: none !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Modal form controls - solid background */
        .modal-body .form-control,
        .modal-body .form-select {
            background-color: #ffffff !important;
            border: 1px solid #ced4da !important;
            color: #212529 !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        .modal-body .form-control.bg-light,
        .modal-body .form-select.bg-light {
            background-color: #f8f9fa !important;
        }

        /* Modal question items - solid background */
        .modal-body .question-item {
            background-color: #f8f9fa !important;
            border: 1px solid #e9ecef !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        .modal-body .alert-light {
            background-color: #f8f9fa !important;
            border-color: #e9ecef !important;
            color: #212529 !important;
        }

        /* Modal close button - ensure visible */
        .modal-header .btn-close {
            background-color: transparent !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Modal dialog scrollable */
        .modal-dialog-scrollable {
            height: calc(100% - 3.5rem);
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: auto;
            max-height: calc(100vh - 200px);
        }

        /* Modal open state - ensure no filter leakage */
        .modal.show {
            display: block !important;
            filter: none !important;
            -webkit-filter: none !important;
            opacity: 1 !important;
        }

        /* Override any parent filters that might affect modals */
        .modal * {
            filter: none !important;
            -webkit-filter: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            opacity: 1 !important;
        }

        /* Ensure modal backdrop doesn't affect modal content */
        .modal-backdrop.show {
            opacity: 1 !important;
        }

        /* Fix for any card styles leaking into modals */
        .modal .dashboard-card {
            background: #ffffff !important;
            border: none !important;
            box-shadow: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            transform: none !important;
            opacity: 1 !important;
        }

        .modal .dashboard-card::before {
            display: none !important;
        }

        /* Ensure modal text is always sharp */
        .modal-body,
        .modal-header,
        .modal-footer {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Fix for modal fade animation */
        .modal.fade .modal-dialog {
            transition: transform .3s ease-out;
            transform: translate(0, -50px);
        }

        .modal.fade.show .modal-dialog {
            transform: none !important;
        }

        /* Ensure modal backdrop is fully opaque */
        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.fade.show {
            opacity: 1 !important;
        }

        /* Prevent body scroll when modal is open */
        body.modal-open {
            overflow: hidden !important;
            padding-right: 0 !important;
        }

        /* Modal centered */
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 3.5rem);
        }

        /* Fix for any conflicting z-index */
        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Ensure modal content is always on top */
        .modal-content {
            position: relative;
            z-index: 1060 !important;
        }
    </style>
</head>
<body>
    <?php include "common/header.php"; ?>

    <main class="main-content fade-page-transition">
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="container-fluid survey_dashboard px-3 px-lg-4">

            <!-- STATISTICS ROW -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6 fade-up stat-card-1">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="activeSurveysCount">12</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-bar-chart-steps me-1"></i> Active Surveys</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-2">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="participatedCount">28</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-people-fill me-1"></i> Participated</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-3">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="pendingCount">4</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-hourglass-split me-1"></i> Pending Response</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-4">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="participationRate">92</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-graph-up me-1"></i> Participation Rate%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTIVE SURVEYS TABLE -->
            <!--div class="card border-0 shadow-sm dashboard-card mb-4 fade-up">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-clipboard-data-fill me-2 text-primary"></i>
                        Active Constituency Surveys
                    </h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Survey ID</th>
                                    <th>Survey Title</th>
                                    <th>MLA</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($activeSurveys)): ?>
                                    <?php foreach ($activeSurveys as $row): ?>
                                        <tr>
                                            <td><?= esc($row['id']) ?></td>
                                            <td><?= esc($row['title']) ?></td>
                                            <td><?= esc($row['mla_name'] ?? $row['mla_id'] ?? 'N/A') ?></td>
                                            <td><?= esc($row['end_date'] ?? 'N/A') ?></td>
                                            <td>
                                                <span class="badge bg-success">
                                                    <?= esc($row['status']) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No Active Surveys Found
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div-->

            <!-- STEPPER SURVEY FORM -->
            <div class="card border-0 shadow-lg dashboard-card mb-4 fade-up" id="responseFormCard">
                <div class="card-header bg-white border-0 pt-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-send-check-fill me-2 text-success"></i> Submit Survey Response</h5>
                        <div class="step-indicator mt-2 mt-sm-0">
                            <span id="questionCounter">1</span> / <span id="totalQuestions">12</span> Questions
                        </div>
                    </div>
                    <div class="progress-bar-custom mt-3">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="surveyResponseForm" method="post">
                        <!-- Hidden Fields -->
                        <input type="hidden" name="survey_id" id="surveyIdHidden">
                        <input type="hidden" name="mla_id" id="mlaIdHidden" value="<?= esc($voter['mla_id'] ?? '') ?>">
                        <input type="hidden" name="voter_id" value="<?= esc($voter['voter_id'] ?? '') ?>">

                        <!-- Voter Information Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-upc-scan"></i> Survey ID
                                </label>
                                <input type="text" class="form-control" id="surveyIdField" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-person-badge"></i> Voter ID
                                </label>
                                <input type="text" class="form-control bg-light" id="voterIdField" value="<?= esc($voter['voter_id'] ?? '') ?>" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-building"></i> MLA ID
                                </label>
                                <input type="text" class="form-control bg-light" id="mlaIdField" value="<?= esc($voter['mla_id'] ?? '') ?>" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-calendar-event"></i> Submission
                                </label>
                                <input type="datetime-local" class="form-control bg-light" id="submissionTimestamp" readonly>
                            </div>
                        </div>

                        

                        <!-- Location Information Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold required-field">
                                    <i class="bi bi-geo-alt-fill"></i> District
                                </label>
                                <input type="text" class="form-control" id="districtField" name="district" 
                                       value="<?= esc($voter['district_name'] ?? '') ?>" 
                                       placeholder="Enter your district">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold required-field">
                                    <i class="bi bi-pin-map-fill"></i> Constituency
                                </label>
                                <input type="text" class="form-control" id="constituencyField" name="constituency" 
                                       value="<?= esc($voter['constituency_name'] ?? '') ?>" 
                                       placeholder="Enter your constituency">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold required-field">
                                    <i class="bi bi-house-heart"></i> Village / Town
                                </label>
                                <input type="text" class="form-control" id="villageField" name="village" 
                                       value="<?= esc($voter['village'] ?? '') ?>" 
                                       placeholder="Enter your village or town name">
                            </div>
                        </div>

                        <!-- Survey Category Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold required-field">
                                    <i class="bi bi-file-text"></i> Survey Category
                                </label>
                                <select class="form-select" name="survey_category" id="surveyTypeSelect" required>
                                    <option value="">-- Select Survey Type --</option>
                                    <?php foreach ($activeSurveys ?? [] as $survey): ?>
                                        <option value="<?= esc($survey['title']) ?>" data-survey-id="<?= esc($survey['id']) ?>">
                                            <?= esc($survey['title']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Question Container -->
                        <div id="questionContainer" class="mb-4"></div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
                            <button type="button" id="prevBtn" class="btn btn-navigate btn-prev">
                                <i class="bi bi-arrow-left"></i> Previous
                            </button>
                            <div class="text-muted small fst-italic">
                                ⚡ Step <span id="stepNumber">1</span> of <span id="totalSteps">12</span>
                            </div>
                            <button type="button" id="nextBtn" class="btn btn-navigate btn-next">
                                Next <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end mt-4" id="submitBtnWrapper" style="display: none;">
                            <button type="button" id="submitBtn" class="btn btn-submit-modern px-5 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-check-circle me-2"></i> Submit Response
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SURVEY HISTORY -->
            <div class="card border-0 shadow-sm dashboard-card mb-4 fade-up" id="surveyHistoryCard">
                <div class="card-header bg-white border-0 pt-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <h5 class="mb-1 fw-bold">
                                <i class="bi bi-clock-history me-2 text-secondary"></i>
                                Survey History
                            </h5>
                            <small class="text-muted">
                                Your submitted survey responses
                            </small>
                        </div>
                        <span class="step-indicator">
                            <i class="bi bi-file-earmark-check me-1"></i>
                            <span id="historyCount">
                                <?= !empty($responses) ? count($responses) : 0 ?>
                            </span>
                            Surveys
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle survey-history-table">
                            <thead>
                                <tr>
                                    <th width="8%">#</th>
                                    <th width="15%">Survey ID</th>
                                    <th width="25%">Survey</th>
                                    <th width="18%">Category</th>
                                    <th width="14%">Answers</th>
                                    <th width="15%">Submitted</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="historyTableBody">
                                <?php if (!empty($responses)): ?>
                                    <?php foreach ($responses as $index => $row): ?>
                                        <?php
                                            $answers = [];
                                            if (!empty($row['answers'])) {
                                                $decodedAnswers = json_decode($row['answers'], true);
                                                if (is_array($decodedAnswers)) {
                                                    $answers = $decodedAnswers;
                                                }
                                            }
                                            $historyId = $row['id'] ?? '';
                                            $surveyId = $row['survey_id'] ?? '';
                                            $surveyTitle = $row['survey_title'] ?? 'Survey';
                                            $category = $row['survey_category'] ?? $row['category'] ?? 'N/A';
                                            $submittedAt = $row['submitted_at'] ?? 'N/A';
                                            $shortAnswers = [];
                                            foreach ($answers as $answer) {
                                                if (count($shortAnswers) >= 2) break;
                                                $shortAnswers[] = $answer;
                                            }
                                        ?>
                                        <tr id="history-row-<?= esc($historyId) ?>" data-history-id="<?= esc($historyId) ?>">
                                            <td>
                                                <span class="history-number"><?= $index + 1 ?></span>
                                            </td>
                                            <td>
                                                <span class="survey-id-badge"><?= esc($surveyId) ?></span>
                                            </td>
                                            <td>
                                                <div class="history-title"><?= esc($surveyTitle) ?></div>
                                                <small class="text-muted"><?= count($answers) ?> responses</small>
                                            </td>
                                            <td>
                                                <span class="history-category"><?= esc($category) ?></span>
                                            </td>
                                            <td>
                                                <?php if (!empty($answers)): ?>
                                                    <div class="answer-preview">
                                                        <?php foreach ($shortAnswers as $answer): ?>
                                                            <span class="answer-chip" title="<?= esc($answer) ?>">
                                                                <?= esc(mb_strimwidth($answer, 0, 25, '...')) ?>
                                                            </span>
                                                        <?php endforeach; ?>
                                                        <?php if (count($answers) > 2): ?>
                                                            <span class="answer-more">+<?= count($answers) - 2 ?> more</span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-muted">No answers</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="history-date">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    <?= esc($submittedAt) ?>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="history-actions">

    <!-- View Survey -->
    <button type="button"
            class="history-action-btn view"
            title="View Survey"
            aria-label="View Survey"
            onclick="viewSurveyByIndex(<?= (int)$index ?>)">
        <i class="bi bi-eye-fill"></i>
    </button>

    <!-- Edit Survey -->
    <button type="button"
            class="history-action-btn edit"
            title="Edit Survey"
            aria-label="Edit Survey"
            onclick="editSurveyByIndex(<?= (int)$index ?>)">
        <i class="bi bi-pencil-square"></i>
    </button>

    <!-- Delete Survey -->
    <button type="button"
            class="history-action-btn delete"
            title="Delete Survey"
            aria-label="Delete Survey"
            onclick="deleteSurvey(<?= (int)$historyId ?>)">
        <i class="bi bi-trash3-fill"></i>
    </button>

</div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr id="noHistoryRow">
                                        <td colspan="7" class="text-center text-muted py-5">
                                            <div class="empty-history">
                                                <div class="empty-history-icon">
                                                    <i class="bi bi-clock-history"></i>
                                                </div>
                                                <h6 class="fw-bold mt-3">No Survey History Found</h6>
                                                <p class="small mb-0">Your submitted surveys will appear here.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- MLA ANALYTICS -->
            <div class="card border-0 shadow-sm dashboard-card fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-graph-up me-2 text-info"></i> MLA Survey Analytics</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="totalResponsesAnalytics">12540</h2>
                            <p class="text-muted">Total Responses</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="participationRateAnalytics">78</h2>
                            <p class="text-muted">Participation Rate%</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="citizenRatingAnalytics">4.6</h2>
                            <p class="text-muted">Avg Rating</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="positiveFeedbackAnalytics">91</h2>
                            <p class="text-muted">Positive Feedback%</p>
                        </div>
                    </div>
                    <div class="alert alert-light text-center small mt-2">
                        📊 Real-time analytics refresh on each new submission
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>

    <!-- ================================================================ -->
    <!-- VIEW SURVEY MODAL - MOVED OUTSIDE MAIN CONTENT TO AVOID PARENT CONFLICTS -->
    <!-- ================================================================ -->
    <div class="modal fade" id="viewSurveyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-eye-fill me-2"></i>
                        Survey Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Survey ID</label>
                            <input type="text" class="form-control bg-light" id="viewSurveyId" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Survey Title</label>
                            <input type="text" class="form-control bg-light" id="viewSurveyTitle" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Category</label>
                            <input type="text" class="form-control bg-light" id="viewSurveyCategory" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Submitted At</label>
                            <input type="text" class="form-control bg-light" id="viewSubmittedAt" readonly>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Voter ID</label>
                            <input type="text" class="form-control bg-light" id="viewVoterId" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">MLA ID</label>
                            <input type="text" class="form-control bg-light" id="viewMlaId" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">District</label>
                            <input type="text" class="form-control bg-light" id="viewDistrict" readonly>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Constituency</label>
                            <input type="text" class="form-control bg-light" id="viewConstituency" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Village / Town</label>
                            <input type="text" class="form-control bg-light" id="viewVillage" readonly>
                        </div>
                    </div>

                    <hr>
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-list-check me-2"></i>
                        Survey Answers
                    </h6>
                    <div id="viewAnswersContainer"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-navigate btn-prev" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================ -->
    <!-- EDIT SURVEY MODAL - MOVED OUTSIDE MAIN CONTENT TO AVOID PARENT CONFLICTS -->
    <!-- ================================================================ -->
    <div class="modal fade" id="editSurveyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Survey Response
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editHistoryId">

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Survey ID</label>
                            <input type="text" class="form-control bg-light" id="editSurveyId" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category</label>
                            <input type="text" class="form-control bg-light" id="editSurveyCategory" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Submitted At</label>
                            <input type="text" class="form-control bg-light" id="editSubmittedAt" readonly>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">District</label>
                            <input type="text" class="form-control" id="editDistrictName" readonly>
                            <input type="hidden" class="form-control" id="editDistrict">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Constituency</label>
                            <input type="text" class="form-control" id="editConstituencyName" readonly>
                            <input type="hidden" class="form-control" id="editConstituency">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Village / Town</label>
                            <input type="text" class="form-control" id="editVillage">
                        </div>
                    </div>

                    <hr>
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-list-check me-2"></i>
                        Edit Answers
                    </h6>
                    <div id="editAnswersContainer"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-navigate btn-prev" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-submit-modern" id="saveEditSurveyBtn">
                        <i class="bi bi-check-circle me-2"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================ -->
    <!-- JAVASCRIPT -->
    <!-- ================================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ================================================================
        // 1. SURVEY QUESTIONS FROM DATABASE
        // ================================================================
        const QUESTIONS_BY_SURVEY = <?= json_encode($questionsBySurvey ?? [], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

        /*
            "Election Survey": [
                { text: "1. मतदान केंद्रांची व्यवस्था समाधानकारक होती का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "सुधारणा हवी"] },
                { text: "2. मतदान प्रक्रिया पारदर्शक होती का?", type: "select", options: ["निवडा", "होय, पूर्णपणे", "काही प्रमाणात", "नाही", "माहिती नाही"] },
                { text: "3. मतदानासाठी पुरेशी सुरक्षा व्यवस्था होती का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. मतदान केंद्रावर कर्मचारी सहकार्य करत होते का?", type: "select", options: ["निवडा", "खूप चांगले", "समाधानकारक", "असमाधानकारक", "खूप वाईट"] },
                { text: "5. मतदानासाठी लागणारा वेळ योग्य होता का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. मतदार यादी अचूक होती का?", type: "select", options: ["निवडा", "होय, पूर्णपणे", "बहुतांश", "अचूक नव्हती", "माहिती नाही"] },
                { text: "7. मतदान केंद्र सहज उपलब्ध होते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. दिव्यांग मतदारांसाठी सुविधा उपलब्ध होत्या का?", type: "select", options: ["निवडा", "होय", "नाही", "अंशतः"] },
                { text: "9. निवडणूक माहिती वेळेवर मिळाली का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा"] },
                { text: "10. मतदान प्रक्रियेवर विश्वास आहे का?", type: "select", options: ["निवडा", "होय, पूर्ण", "काही प्रमाणात", "नाही", "अनिश्चित"] },
                { text: "11. निवडणुकीत कोणताही गैरप्रकार दिसला का?", type: "select", options: ["निवडा", "नाही", "होय, थोडा", "होय, मोठा"] },
                { text: "12. एकूण निवडणूक व्यवस्थेबद्दल तुमचे समाधान किती आहे?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Road Development Survey": [
                { text: "1. रस्त्यांची गुणवत्ता कशी आहे?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. रस्त्यांवर खड्डे आहेत का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बरेच", "सर्व ठिकाणी"] },
                { text: "3. रस्त्यांची नियमित देखभाल होते का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "4. मुख्य रस्ते स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. वाहतूक सुरळीत चालते का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "सतत अडथळे", "अतिशय वाईट"] },
                { text: "6. रस्त्यांवर दिशा दर्शक फलक आहेत का?", type: "select", options: ["निवडा", "होय, पुरेसे", "काही ठिकाणी", "फार कमी", "अजिबात नाही"] },
                { text: "7. पावसाळ्यात रस्त्यांची स्थिती चांगली राहते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. नवीन रस्त्यांची कामे वेळेवर पूर्ण होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा", "माहिती नाही"] },
                { text: "9. पादचारी मार्ग उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "10. रस्त्यांवरील अपघात कमी झाले आहेत का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढले आहेत"] },
                { text: "11. रस्ते सुरक्षित वाटतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण रस्ते विकासाबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Water Supply Survey": [
                { text: "1. नियमित पाणीपुरवठा होतो का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "अनियमित", "अजिबात नाही"] },
                { text: "2. पिण्याच्या पाण्याची गुणवत्ता चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "3. पाणीपुरवठा पुरेशा प्रमाणात होतो का?", type: "select", options: ["निवडा", "होय, पुरेसा", "कमी", "अपुरा", "अतिशय कमी"] },
                { text: "4. पाणी वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "5. पाणीपुरवठ्यात वारंवार अडथळे येतात का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "वारंवार", "सतत"] },
                { text: "6. गळतीची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "मोठ्या प्रमाणात"] },
                { text: "7. पाणीपुरवठा विभाग तक्रारी सोडवतो का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "8. उन्हाळ्यात पाणी उपलब्ध असते का?", type: "select", options: ["निवडा", "होय, पुरेसे", "कमी", "अपुरे", "अजिबात नाही"] },
                { text: "9. पाण्याचा दाब योग्य असतो का?", type: "select", options: ["निवडा", "होय", "कमी", "जास्त", "अनियमित"] },
                { text: "10. पाणी बिल योग्य आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "जास्त", "कमी"] },
                { text: "11. पाणी साठवण सुविधा पुरेशा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "12. एकूण पाणीपुरवठ्याबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Drainage Survey": [
                { text: "1. ड्रेनेज व्यवस्था चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. पावसाळ्यात पाणी साचते का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "3. नाले नियमित साफ केले जातात का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "4. सांडपाणी योग्यरित्या वाहून जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. दुर्गंधीची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "तीव्र"] },
                { text: "6. ड्रेनेज ब्लॉकेज वारंवार होते का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "वारंवार", "सतत"] },
                { text: "7. तक्रारींवर तत्काळ कारवाई होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. नवीन ड्रेनेज लाईनची गरज आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "9. पूरस्थिती कमी झाली आहे का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढली आहे"] },
                { text: "10. ड्रेनेजमुळे आरोग्य समस्या निर्माण होतात का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "गंभीर"] },
                { text: "11. ड्रेनेजची देखभाल नियमित होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "12. एकूण ड्रेनेज व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Street Light Survey": [
                { text: "1. सर्व रस्त्यांवर स्ट्रीट लाईट आहेत का?", type: "select", options: ["निवडा", "होय, सर्व", "बहुतांश", "काही ठिकाणी", "अजिबात नाही"] },
                { text: "2. रात्री लाईट व्यवस्थित चालू असतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "3. खराब लाईट वेळेवर दुरुस्त होतात का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "4. सार्वजनिक ठिकाणी पुरेसा प्रकाश आहे का?", type: "select", options: ["निवडा", "होय, पुरेसा", "कमी", "अपुरा", "अजिबात नाही"] },
                { text: "5. महिलांसाठी रात्री सुरक्षित वातावरण आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. नवीन लाईटची गरज आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "7. एलईडी लाईटचा वापर केला जातो का?", type: "select", options: ["निवडा", "होय, सर्व", "बहुतांश", "काही ठिकाणी", "अजिबात नाही"] },
                { text: "8. तक्रारींवर तत्काळ प्रतिसाद मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "9. अंधारे भाग कमी झाले आहेत का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढले आहेत"] },
                { text: "10. वीज बचतीची व्यवस्था आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "माहिती नाही"] },
                { text: "11. स्ट्रीट लाईटची देखभाल नियमित होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "12. एकूण स्ट्रीट लाईट सुविधेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Sanitation Survey": [
                { text: "1. परिसर स्वच्छ ठेवला जातो का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "2. नियमित कचरा संकलन होते का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "अनियमित", "अजिबात नाही"] },
                { text: "3. सार्वजनिक शौचालये स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. कचरा वेळेवर उचलला जातो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "5. रस्त्यावर कचरा पडलेला दिसतो का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "मोठ्या प्रमाणात"] },
                { text: "6. डासांची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "कमी", "मध्यम", "गंभीर"] },
                { text: "7. स्वच्छता कर्मचारी नियमित येतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. कचरा वर्गीकरण केले जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. सार्वजनिक ठिकाणे स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. स्वच्छतेबद्दल जनजागृती आहे का?", type: "select", options: ["निवडा", "होय, चांगली", "काही प्रमाणात", "फार कमी", "अजिबात नाही"] },
                { text: "11. तक्रारींवर कारवाई होते का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "12. एकूण स्वच्छता व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Health Survey": [
                { text: "1. सरकारी आरोग्य सेवा सहज उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "2. डॉक्टर वेळेवर उपलब्ध असतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "3. औषधे सहज मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. रुग्णालये स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. आपत्कालीन सेवा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. लसीकरण सेवा योग्य आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. आरोग्य केंद्रात पुरेसे कर्मचारी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरे"] },
                { text: "8. तपासणी सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. माता-बाल आरोग्य सेवा चांगली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. आरोग्य तक्रारींवर तत्काळ उपचार मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "11. आरोग्य योजनांची माहिती मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण आरोग्य सेवेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Agriculture Survey": [
                { text: "1. सिंचन सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय, पुरेशा", "कमी", "अपुरा", "अजिबात नाही"] },
                { text: "2. खत वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "3. बियाणे दर्जेदार मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. सरकारी योजना मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. पीक विम्याचा लाभ मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "6. शेतीसाठी वीज पुरवठा पुरेसा आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरा"] },
                { text: "7. कृषी अधिकारी मदत करतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. बाजारभाव योग्य मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. साठवण सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "10. शेतीसाठी कर्ज सहज मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "अवघड"] },
                { text: "11. आधुनिक तंत्रज्ञानाचा वापर होतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण कृषी सुविधेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Education Survey": [
                { text: "1. शाळांची गुणवत्ता चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. शिक्षक नियमित उपस्थित असतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "3. वर्गखोल्या पुरेशा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरा"] },
                { text: "4. डिजिटल शिक्षण उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. विद्यार्थ्यांना आवश्यक सुविधा मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. ग्रंथालय उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही"] },
                { text: "7. प्रयोगशाळा सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "8. शिष्यवृत्ती वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "9. खेळाची सुविधा आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. शाळा सुरक्षित आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. पालक-शिक्षक संवाद चांगला आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण शिक्षण व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Employment Survey": [
                { text: "1. स्थानिक रोजगाराच्या संधी आहेत का?", type: "select", options: ["निवडा", "होय, चांगल्या", "कमी", "फार कमी", "अजिबात नाही"] },
                { text: "2. सरकारी रोजगार योजना प्रभावी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. कौशल्य विकास प्रशिक्षण मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. बेरोजगारांसाठी मदत उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. उद्योगांना प्रोत्साहन दिले जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. रोजगार मेळावे आयोजित होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "7. महिलांसाठी रोजगार संधी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. युवकांसाठी प्रशिक्षण उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. स्वरोजगारासाठी मदत मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. रोजगार कार्यालय प्रभावी आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. नवीन उद्योग येत आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण रोजगार व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Smart Village Survey": [
                { text: "1. गावात मोफत Wi-Fi उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "2. ऑनलाइन सरकारी सेवा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. CCTV सुरक्षा व्यवस्था आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "4. डिजिटल पेमेंटचा वापर होतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. ई-गव्हर्नन्स सेवा प्रभावी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. स्मार्ट पाणी व्यवस्थापन आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. सौर ऊर्जा वापरली जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. स्मार्ट शिक्षण सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. स्मार्ट आरोग्य सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. डिजिटल माहिती फलक आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "11. पर्यावरणपूरक सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण स्मार्ट व्हिलेज विकासाबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "MLA Performance Survey": [
                { text: "1. आमदार नागरिकांना सहज भेटतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "2. जनतेच्या तक्रारींवर कारवाई करतात का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "3. विकासकामे वेळेत पूर्ण करतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. मतदारसंघात नियमित भेट देतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "5. शिक्षण क्षेत्रात योगदान दिले आहे का?", type: "select", options: ["निवडा", "होय, चांगले", "काही प्रमाणात", "नाही", "माहिती नाही"] },
                { text: "6. आरोग्य सुविधांमध्ये सुधारणा केली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. रस्ते विकासासाठी काम केले आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. पाणीपुरवठा सुधारला आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. रोजगार निर्मितीसाठी प्रयत्न केले आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. भ्रष्टाचारमुक्त कामकाज आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. जनतेशी संवाद प्रभावी आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण आमदारांच्या कामगिरीबद्दल तुमचे समाधान किती आहे?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            "Infrastructure Survey": [
                { text: "1. सार्वजनिक पायाभूत सुविधा चांगल्या आहेत का?", type: "select", options: ["निवडा", "उत्तम", "चांगल्या", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. रस्ते आणि पूल सुरक्षित आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. सार्वजनिक वाहतूक सुविधा योग्य आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. बसस्थानके व्यवस्थित आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. रेल्वे सुविधा समाधानकारक आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. सार्वजनिक इमारतींची देखभाल होते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. वीज पुरवठा नियमित आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. इंटरनेट सुविधा चांगली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. पादचारी सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "10. नवीन विकासकामे वेळेवर पूर्ण होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा"] },
                { text: "11. नागरिकांच्या गरजेनुसार सुविधा वाढवल्या जातात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण पायाभूत सुविधांबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ]
        */

        // ================================================================
        // 2. APPLICATION LOGIC
        // ================================================================
        let currentQIndex = 0;
        let currentCategory = '';
        let currentSurveyId = '';
        let currentQuestions = [];
        let answersArray = [];
        let surveyHistory = <?= json_encode($responses); ?>;
        let ratingValues = [8, 7];
        let positiveFlags = [true, true];

       

        // DOM Elements
        const questionContainer = document.getElementById('questionContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitWrapper = document.getElementById('submitBtnWrapper');
        const progressFill = document.getElementById('progressFill');
        const questionCounterSpan = document.getElementById('questionCounter');
        const totalQuestionsSpan = document.getElementById('totalQuestions');
        const stepNumberSpan = document.getElementById('stepNumber');
        const totalStepsSpan = document.getElementById('totalSteps');
        const timestampField = document.getElementById('submissionTimestamp');
        const surveyTypeSelect = document.getElementById('surveyTypeSelect');

        // Helper: timestamp
        function setCurrentTimestamp() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            timestampField.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        }
        setCurrentTimestamp();
        setInterval(setCurrentTimestamp, 60000);

        // Escape HTML
        function escapeHtml(str) { 
            if (!str) return ''; 
            return String(str).replace(/[&<>]/g, function(m) { 
                return m === '&' ? '&amp;' : (m === '<' ? '&lt;' : '&gt;'); 
            }); 
        }

        // Get questions for selected category
        function getQuestionsForSurvey(surveyId) {
            return QUESTIONS_BY_SURVEY[String(surveyId)] || [];
        }

        // Get questions for history row
        function getQuestionsForHistory(row) {
            return getQuestionsForSurvey(row.survey_id ?? '');
        }

        function normalizeAnswers(answers) {
            if (Array.isArray(answers)) {
                return answers;
            }

            return answers && typeof answers === 'object' ? Object.values(answers) : [];
        }

        function getAnswerMap(answers) {
            if (!answers || typeof answers !== 'object') {
                return {};
            }

            if (!Array.isArray(answers)) {
                return answers;
            }

            return answers.reduce(function(answerMap, answer, index) {
                answerMap[index] = answer;
                return answerMap;
            }, {});
        }

        // Render current question
        function renderCurrentQuestion() {
            if (!currentCategory || currentQuestions.length === 0) {
                questionContainer.innerHTML = `
                    <div class="alert alert-light text-center py-4" style="border-radius: 20px; border: 1px dashed var(--lime-gold);">
                        <i class="fas fa-info-circle me-2" style="color: var(--teal-blue);"></i>
                        <strong>Select a Survey Category</strong> to see questions.
                    </div>
                `;
                updateProgressAndButtons();
                return;
            }

            const q = currentQuestions[currentQIndex];
            if (!q) {
                questionContainer.innerHTML = `<div class="alert alert-danger">Question not found</div>`;
                return;
            }

            let html = `<div class="question-item">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="fw-bold" style="color: var(--teal-blue);">${currentQIndex + 1}</span>
                    <h5 class="mb-0 fw-semibold" style="color: var(--teal-blue);">${escapeHtml(q.text)}</h5>
                </div>`;

            if (q.type === "select") {
                let opts = '<option value="">-- Select an option --</option>';
                q.options.forEach(function(opt) {
                    const isSelected = String(answersArray[currentQIndex]) === String(opt.id)
                        || answersArray[currentQIndex] === opt.text;
                    const optionId = escapeHtml(opt.id);
                    const optionText = escapeHtml(opt.text);
                    opts += `<option value="${optionId}" ${isSelected ? 'selected' : ''}>${optionText}</option>`;
                });
                html += `<select class="form-select question-input" data-qidx="${currentQIndex}">${opts}</select>`;
            }
            else if (q.type === "text") {
                html += `<input type="text" class="form-control question-input" data-qidx="${currentQIndex}" placeholder="${q.placeholder || 'आपले उत्तर'}" value="${escapeHtml(answersArray[currentQIndex] || '')}">`;
            }
            else if (q.type === "textarea") {
                html += `<textarea class="form-control question-input" data-qidx="${currentQIndex}" rows="3" placeholder="${q.placeholder || 'आपले सूचन...'}">${escapeHtml(answersArray[currentQIndex] || '')}</textarea>`;
            }
            else if (q.type === "rating") {
                let ratingHtml = `<select class="form-select question-input" data-qidx="${currentQIndex}"><option value="">-- Select an option --</option>`;
                q.options.forEach(function(opt) {
                    const isSelected = String(answersArray[currentQIndex]) === String(opt.id)
                        || answersArray[currentQIndex] === opt.text;
                    const optionId = escapeHtml(opt.id);
                    const optionText = escapeHtml(opt.text);
                    ratingHtml += `<option value="${optionId}" ${isSelected ? 'selected' : ''}>${optionText}</option>`;
                });
                ratingHtml += `</select>`;
                html += ratingHtml;
            }

            html += `</div>`;
            questionContainer.innerHTML = html;

            document.querySelectorAll('.question-input').forEach(function(el) {
                const idx = parseInt(el.dataset.qidx);
                el.addEventListener('change', function() { answersArray[idx] = el.value; });
                el.addEventListener('input', function() { answersArray[idx] = el.value; });
            });

            updateProgressAndButtons();
        }

        function updateProgressAndButtons() {
            const total = currentQuestions.length;
            if (total === 0) {
                progressFill.style.width = '0%';
                questionCounterSpan.innerText = '0';
                stepNumberSpan.innerText = '0';
                totalQuestionsSpan.innerText = '0';
                if (totalStepsSpan) totalStepsSpan.innerText = '0';
                prevBtn.disabled = true;
                nextBtn.style.display = 'none';
                submitWrapper.style.display = 'none';
                return;
            }

            const percent = ((currentQIndex + 1) / total) * 100;
            progressFill.style.width = `${percent}%`;
            questionCounterSpan.innerText = currentQIndex + 1;
            stepNumberSpan.innerText = currentQIndex + 1;
            totalQuestionsSpan.innerText = total;
            if (totalStepsSpan) totalStepsSpan.innerText = total;
            prevBtn.disabled = (currentQIndex === 0);
            
            if (currentQIndex === total - 1) {
                nextBtn.style.display = "none";
                submitWrapper.style.display = "block";
            } else {
                nextBtn.style.display = "inline-flex";
                submitWrapper.style.display = "none";
            }
        }

        function saveCurrentInput() {
            const active = document.querySelector('.question-input');
            if (active) {
                const idx = parseInt(active.dataset.qidx);
                answersArray[idx] = active.value;
            }
        }

        function nextQuestion() {
            saveCurrentInput();
            const ans = answersArray[currentQIndex];
            if (!ans || ans === "" || ans === "निवडा") {
                alert("कृपया या प्रश्नाचे उत्तर द्या / Please answer before proceeding.");
                return;
            }
            if (currentQIndex < currentQuestions.length - 1) {
                currentQIndex++;
                renderCurrentQuestion();
            }
        }

        function prevQuestion() {
            saveCurrentInput();
            if (currentQIndex > 0) {
                currentQIndex--;
                renderCurrentQuestion();
            }
        }

        // ================================================================
        // VIEW SURVEY - FIXED: Proper modal opening with correct data
        // ================================================================

        function viewSurveyByIndex(index) {
            const survey = surveyHistory[index];
            if (!survey) {
                alert('Survey record not found.');
                return;
            }

            const formData = new FormData();
            formData.append('id', survey.id);

            fetch('<?= base_url("user/survey/view") ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (!data.status) {
                    throw new Error(data.message || 'Unable to load survey.');
                }

                const response = data.response || survey;
                response.response_answers = data.answers || [];
                viewSurvey(response);
            })
            .catch(function(error) {
                console.error('View survey error:', error);
                alert(error.message || 'Something went wrong while loading the survey.');
            });
        }

        function viewSurvey(row) {
            if (!row) {
                alert('Survey record not found.');
                return;
            }

            // Populate all fields
            document.getElementById('viewSurveyId').value = row.survey_id ?? '';
            document.getElementById('viewSurveyTitle').value = row.survey_title ?? 'Survey';
            document.getElementById('viewSurveyCategory').value = row.survey_category ?? row.category ?? '';
            document.getElementById('viewSubmittedAt').value = row.submitted_at ?? '';
            document.getElementById('viewVoterId').value = row.voter_id ?? '';
            document.getElementById('viewMlaId').value = row.mla_id ?? '';
            document.getElementById('viewDistrict').value = row.district_name ?? '';
            document.getElementById('viewConstituency').value = row.constituency_name ?? '';
            document.getElementById('viewVillage').value = row.village ?? '';

            // Prefer normalized answer rows from survey_responses_answers.
            if (Array.isArray(row.response_answers) && row.response_answers.length > 0) {
                const container = document.getElementById('viewAnswersContainer');
                container.innerHTML = '';

                row.response_answers.forEach(function(answer, index) {
                    container.insertAdjacentHTML('beforeend', `
                        <div class="question-item">
                            <div class="d-flex align-items-start gap-3">
                                <span class="history-number">${index + 1}</span>
                                <div class="flex-grow-1">
                                    <div class="question-text">${escapeHtml(answer.question || `Question ${index + 1}`)}</div>
                                    <div class="alert alert-light mb-0">
                                        <strong>Answer:</strong>
                                        ${escapeHtml(answer.option_text || answer.answers_id || '')}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                const modalElement = document.getElementById('viewSurveyModal');
                const modal = new bootstrap.Modal(modalElement, { backdrop: true, keyboard: true, focus: true });
                modal.show();
                return;
            }

            // Fallback for older responses stored only in the JSON column.
            let answers = [];
            try {
                answers = row.answers ? JSON.parse(row.answers) : [];
            } catch (error) {
                answers = [];
            }
            answers = normalizeAnswers(answers);

            const questions = getQuestionsForHistory(row);
            const container = document.getElementById('viewAnswersContainer');
            container.innerHTML = '';

            if (answers.length === 0) {
                container.innerHTML = `<div class="alert alert-light">No answers found.</div>`;
            } else {
                answers.forEach(function(answer, index) {
                    const question = questions[index];
                    const questionText = question?.text ?? `Question ${index + 1}`;
                    const selectedOption = question?.options?.find(function(option) {
                        return String(option.id) === String(answer) || option.text === answer;
                    });
                    const answerText = selectedOption?.text ?? answer;
                    
                    container.insertAdjacentHTML('beforeend', `
                        <div class="question-item">
                            <div class="d-flex align-items-start gap-3">
                                <span class="history-number">${index + 1}</span>
                                <div class="flex-grow-1">
                                    <div class="question-text">${escapeHtml(questionText)}</div>
                                    <div class="alert alert-light mb-0">
                                        <strong>Answer:</strong>
                                        ${escapeHtml(String(answerText))}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }

            // Open modal using Bootstrap 5 API
            const modalElement = document.getElementById('viewSurveyModal');
            const modal = new bootstrap.Modal(modalElement, {
                backdrop: true,
                keyboard: true,
                focus: true
            });
            modal.show();
        }

        // ================================================================
        // EDIT SURVEY - FIXED: Proper modal opening with correct data
        // ================================================================

        function editSurveyByIndex(index) {
            const survey = surveyHistory[index];
            if (!survey) {
                alert('Survey record not found.');
                return;
            }

            const formData = new FormData();
            formData.append('id', survey.id);

            fetch('<?= base_url("user/survey/view") ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (!data.status) {
                    throw new Error(data.message || 'Unable to load survey.');
                }

                const response = data.response || survey;
                response.response_answers = data.answers || [];
                editSurvey(response);
            })
            .catch(function(error) {
                console.error('Edit survey load error:', error);
                alert(error.message || 'Something went wrong while loading the survey.');
            });
        }

        function editSurvey(row) {
            if (!row || !row.id) {
                alert('Unable to edit this survey because record ID is missing.');
                return;
            }

            document.getElementById('editHistoryId').value = row.id;
            document.getElementById('editSurveyId').value = row.survey_id ?? '';
            document.getElementById('editSurveyCategory').value = row.survey_category ?? row.category ?? '';
            document.getElementById('editSubmittedAt').value = row.submitted_at ?? '';
            document.getElementById('editDistrict').value = row.district ?? '';
            document.getElementById('editConstituency').value = row.constituency ?? '';
            document.getElementById('editDistrictName').value = row.district_name ?? '';
            document.getElementById('editConstituencyName').value = row.constituency_name ?? '';

            document.getElementById('editVillage').value = row.village ?? '';

            let answers = [];
            try {
                answers = row.answers ? JSON.parse(row.answers) : [];
            } catch (error) {
                answers = [];
            }
            const questions = getQuestionsForHistory(row);
            const answerMap = Array.isArray(row.response_answers) && row.response_answers.length > 0
                ? row.response_answers.reduce(function(map, answer) {
                    map[answer.question_id] = answer.answers_id;
                    return map;
                }, {})
                : getAnswerMap(answers);
            const container = document.getElementById('editAnswersContainer');
            container.innerHTML = '';

            questions.forEach(function(question, index) {
                const answer = answerMap[question.id] ?? answerMap[index] ?? '';
                const questionText = question.text ?? `Question ${index + 1}`;
                const answerOption = question?.options?.find(function(option) {
                    return String(option.id) === String(answer) || option.text === answer;
                });
                let inputHtml = `
                    <input type="text" class="form-control edit-answer-input" data-index="${index}" data-question-id="${escapeHtml(question.id)}" value="${escapeHtml(String(answerOption?.text ?? answer))}">
                `;

                if (question?.type === 'select') {
                    let optionsHtml = '<option value="">-- Select an option --</option>';
                    question.options.forEach(function(option) {
                        const selected = String(option.id) === String(answer) || option.text === answer ? 'selected' : '';
                        optionsHtml += `<option value="${escapeHtml(option.id)}" ${selected}>${escapeHtml(option.text)}</option>`;
                    });
                    inputHtml = `
                        <select class="form-select edit-answer-input" data-index="${index}" data-question-id="${escapeHtml(question?.id ?? '')}">
                            ${optionsHtml}
                        </select>
                    `;
                }

                container.insertAdjacentHTML('beforeend', `
                    <div class="question-item">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="fw-bold" style="color: var(--teal-blue);">${index + 1}</span>
                            <div class="question-text mb-0">${escapeHtml(questionText)}</div>
                        </div>
                        ${inputHtml}
                    </div>
                `);
            });

            // Open modal using Bootstrap 5 API
            const modalElement = document.getElementById('editSurveyModal');
            const modal = new bootstrap.Modal(modalElement, {
                backdrop: true,
                keyboard: true,
                focus: true
            });
            modal.show();
        }

        // ================================================================
        // SAVE EDIT SURVEY
        // ================================================================

        document.getElementById('saveEditSurveyBtn').addEventListener('click', function() {
            const button = this;
            const id = document.getElementById('editHistoryId').value;
            const district = document.getElementById('editDistrict').value.trim();
            const constituency = document.getElementById('editConstituency').value.trim();
            const village = document.getElementById('editVillage').value.trim();

            if (!id) {
                alert('Invalid survey record.');
                return;
            }

            if (!district) {
                alert('Please enter district.');
                return;
            }

            if (!constituency) {
                alert('Please enter constituency.');
                return;
            }

            if (!village) {
                alert('Please enter village.');
                return;
            }

            const answers = {};
            document.querySelectorAll('.edit-answer-input').forEach(function(input) {
                answers[input.dataset.questionId || input.dataset.index] = input.value;
            });

            button.disabled = true;
            button.innerHTML = `<i class="bi bi-spinner bi-spin me-2"></i>Saving...`;

            const formData = new FormData();
            formData.append('id', id);
            formData.append('district', district);
            formData.append('constituency', constituency);
            formData.append('village', village);
            formData.append('answers', JSON.stringify(answers));

            fetch('<?= base_url("user/survey/update") ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                button.disabled = false;
                button.innerHTML = `<i class="bi bi-check-circle me-2"></i>Save Changes`;

                if (data.status) {
                    alert(data.message || 'Survey updated successfully.');
                    
                    const index = surveyHistory.findIndex(function(item) {
                        return String(item.id) === String(id);
                    });
                    if (index !== -1) {
                        surveyHistory[index].district = district;
                        surveyHistory[index].constituency = constituency;
                        surveyHistory[index].village = village;
                        surveyHistory[index].answers = JSON.stringify(answers);
                    }

                    refreshHistoryUI();
                    updateAnalytics();

                    const modal = bootstrap.Modal.getInstance(document.getElementById('editSurveyModal'));
                    if (modal) {
                        modal.hide();
                    }
                } else {
                    alert(data.message || 'Unable to update survey.');
                }
            })
            .catch(function(error) {
                console.error('Edit error:', error);
                button.disabled = false;
                button.innerHTML = `<i class="bi bi-check-circle me-2"></i>Save Changes`;
                alert('Something went wrong while updating the survey.');
            });
        });

        // ================================================================
        // DELETE SURVEY
        // ================================================================

        function deleteSurvey(id) {
            if (!id) {
                alert('Invalid survey record.');
                return;
            }

            const confirmed = confirm('Are you sure you want to delete this survey response?\n\nThis action cannot be undone.');
            if (!confirmed) {
                return;
            }

            const formData = new FormData();
            formData.append('id', id);

            fetch('<?= base_url("user/survey/delete") ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.status) {
                    surveyHistory = surveyHistory.filter(function(row) {
                        return String(row.id) !== String(id);
                    });

                    refreshHistoryUI();
                    updateAnalytics();
                    alert(data.message || 'Survey deleted successfully.');
                } else {
                    alert(data.message || 'Unable to delete survey.');
                }
            })
            .catch(function(error) {
                console.error('Delete error:', error);
                alert('Something went wrong while deleting the survey.');
            });
        }

        // ================================================================
        // REFRESH HISTORY UI
        // ================================================================

        function refreshHistoryUI() {
            const tbody = document.getElementById('historyTableBody');
            const historyCount = document.getElementById('historyCount');

            if (!tbody) return;

            tbody.innerHTML = '';

            if (!Array.isArray(surveyHistory) || surveyHistory.length === 0) {
                tbody.innerHTML = `
                    <tr id="noHistoryRow">
                        <td colspan="7" class="text-center text-muted py-5">
                            <div class="empty-history">
                                <div class="empty-history-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <h6 class="fw-bold mt-3">No Survey History Found</h6>
                                <p class="small mb-0">Your submitted surveys will appear here.</p>
                            </div>
                        </td>
                    </tr>
                `;

                if (historyCount) {
                    historyCount.innerText = '0';
                }
                return;
            }

            surveyHistory.sort(function(a, b) {
                const dateA = new Date(a.submitted_at || 0).getTime();
                const dateB = new Date(b.submitted_at || 0).getTime();
                return dateB - dateA;
            });

            surveyHistory.forEach(function(row, index) {
                let answers = [];
                try {
                    answers = row.answers ? JSON.parse(row.answers) : [];
                } catch (error) {
                    answers = [];
                }
                answers = normalizeAnswers(answers);

                const surveyId = row.survey_id ?? '';
                const surveyTitle = row.survey_title ?? 'Survey';
                const category = row.survey_category ?? row.category ?? 'N/A';
                const historyId = row.id ?? '';
                const submittedAt = row.submitted_at ?? 'N/A';
                const questions = getQuestionsForHistory(row);

                let answerPreview = '';
                answers.slice(0, 2).forEach(function(answer) {
                    const question = questions[answers.indexOf(answer)];
                    const selectedOption = question?.options?.find(function(option) {
                        return String(option.id) === String(answer) || option.text === answer;
                    });
                    const answerText = String(selectedOption?.text ?? answer);
                    const shortAnswer = answerText.substring(0, 25);
                    answerPreview += `
                        <span class="answer-chip" title="${escapeHtml(answerText)}">
                            ${escapeHtml(shortAnswer)}${String(answer).length > 25 ? '...' : ''}
                        </span>
                    `;
                });

                if (answers.length > 2) {
                    answerPreview += `<span class="answer-more">+${answers.length - 2} more</span>`;
                }

                const rowHtml = `
                    <tr id="history-row-${historyId}" data-history-id="${historyId}">
                        <td>
                            <span class="history-number">${index + 1}</span>
                        </td>
                        <td>
                            <span class="survey-id-badge">${escapeHtml(String(surveyId))}</span>
                        </td>
                        <td>
                            <div class="history-title">${escapeHtml(String(surveyTitle))}</div>
                            <small class="text-muted">${answers.length} responses</small>
                        </td>
                        <td>
                            <span class="history-category">${escapeHtml(String(category))}</span>
                        </td>
                        <td>
                            <div class="answer-preview">${answerPreview || '<span class="text-muted">No answers</span>'}</div>
                        </td>
                        <td>
                            <div class="history-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                ${escapeHtml(String(submittedAt))}
                            </div>
                        </td>
                        <td>
                            <div class="history-actions">
                                <button type="button" class="history-action-btn view" title="View Survey" onclick="viewSurveyByIndex(${index})">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                <button type="button" class="history-action-btn edit" title="Edit Survey" onclick="editSurveyByIndex(${index})">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button" class="history-action-btn delete" title="Delete Survey" onclick="deleteSurvey(${historyId})">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;

                tbody.insertAdjacentHTML('beforeend', rowHtml);
            });

            if (historyCount) {
                historyCount.innerText = surveyHistory.length;
            }
        }

        // ================================================================
        // UPDATE ANALYTICS
        // ================================================================

        function updateAnalytics() {
            const total = <?= isset($responses) ? count($responses) : 0 ?>;
            const totalResponsesElem = document.getElementById('totalResponsesAnalytics');
            if (totalResponsesElem) totalResponsesElem.innerText = total.toLocaleString();
            const participatedElem = document.getElementById('participatedCount');
            if (participatedElem) participatedElem.innerText = total;
            const pendingVal = Math.max(0, 12 - total);
            const pendingElem = document.getElementById('pendingCount');
            if (pendingElem) pendingElem.innerText = pendingVal.toString();

            let avgRating = 4.2;
            if (ratingValues.length) {
                avgRating = ratingValues.reduce(function(a, b) { return a + b; }, 0) / ratingValues.length;
                avgRating = Math.round(avgRating * 10) / 10;
            }
            const ratingElem = document.getElementById('citizenRatingAnalytics');
            if (ratingElem) ratingElem.innerText = avgRating;

            let posPercent = 84;
            if (positiveFlags.length) {
                const posCount = positiveFlags.filter(function(f) { return f === true; }).length;
                posPercent = Math.round((posCount / positiveFlags.length) * 100);
            }
            const positiveElem = document.getElementById('positiveFeedbackAnalytics');
            if (positiveElem) positiveElem.innerText = posPercent;

            let partRate = total === 0 ? 6 : Math.min(94, 28 + Math.floor(total / 1.7));
            partRate = Math.min(96, partRate);
            const partRateAnalytics = document.getElementById('participationRateAnalytics');
            const partRateMain = document.getElementById('participationRate');
            if (partRateAnalytics) partRateAnalytics.innerText = partRate;
            if (partRateMain) partRateMain.innerText = partRate;
        }

        // ================================================================
        // LOAD CATEGORY
        // ================================================================

        function loadCategory(category, surveyId) {
            currentCategory = category;
            currentSurveyId = surveyId || '';
            currentQuestions = getQuestionsForSurvey(currentSurveyId);
            answersArray = new Array(currentQuestions.length).fill("");
            currentQIndex = 0;
            
            if (currentQuestions.length === 0) {
                questionContainer.innerHTML = `
                    <div class="alert alert-light text-center py-4" style="border-radius: 20px; border: 1px dashed var(--lime-gold);">
                        <i class="fas fa-info-circle me-2" style="color: var(--teal-blue);"></i>
                        <strong>Select a Survey Category</strong> to see questions.
                    </div>
                `;
                updateProgressAndButtons();
            } else {
                renderCurrentQuestion();
            }
        }

        // Survey type change
        surveyTypeSelect.addEventListener('change', function() {
            const category = this.value;
            const id = this.options[this.selectedIndex]?.dataset.surveyId || '';
            document.getElementById('surveyIdHidden').value = id;
            document.getElementById('surveyIdField').value = id;
            loadCategory(category, id);
        });

        // Submit handler
        function handleSubmit() {
            saveCurrentInput();
            
            for (let i = 0; i < currentQuestions.length; i++) {
                let ans = answersArray[i];
                if (!ans || ans === "" || ans === "निवडा") {
                    alert(`प्रश्न क्रमांक ${i + 1} चे उत्तर आवश्यक आहे.`);
                    return;
                }
            }
            
            const district = document.getElementById('districtField').value.trim();
            const constituency = document.getElementById('constituencyField').value.trim();
            const village = document.getElementById('villageField').value.trim();
            const surveyType = document.getElementById('surveyTypeSelect').value;
            const surveyId = document.getElementById('surveyIdHidden').value;
            
            if (!district) {
                alert("कृपया जिल्हा भरा. / Please enter your district.");
                document.getElementById('districtField').focus();
                return;
            }
            
            if (!constituency) {
                alert("कृपया मतदारसंघ भरा. / Please enter your constituency.");
                document.getElementById('constituencyField').focus();
                return;
            }
            
            if (!village) {
                alert("कृपया गावाचे नाव भरा. / Please enter your village name.");
                document.getElementById('villageField').focus();
                return;
            }
            
            if (!surveyType) {
                alert("कृपया सर्वेक्षण प्रकार निवडा. / Please select a survey type.");
                document.getElementById('surveyTypeSelect').focus();
                return;
            }
            
            if (!surveyId) {
                alert("कृपया योग्य सर्वेक्षण प्रकार निवडा. / Please select a valid survey type.");
                return;
            }

            const answersByQuestionId = {};
            currentQuestions.forEach(function(question, index) {
                answersByQuestionId[question.id] = answersArray[index];
            });

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-spinner bi-spin me-2"></i> Submitting...';

            const formData = new FormData();
            formData.append('survey_id', surveyId);
            formData.append('mla_id', document.getElementById('mlaIdHidden').value || '');
            formData.append('district', district);
            formData.append('constituency', constituency);
            formData.append('village', village);
            formData.append('survey_category', surveyType);
            formData.append('answers', JSON.stringify(answersByQuestionId));

            fetch('<?= base_url("user/survey/save") ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i> Submit Response';
                
                if (data.status) {
                    alert(data.message || 'Survey submitted successfully!');
                    
                    if (data.response) {
                        surveyHistory.unshift(data.response);
                        refreshHistoryUI();
                        updateAnalytics();
                    }
                    
                    document.getElementById('surveyTypeSelect').value = '';
                    document.getElementById('surveyIdHidden').value = '';
                    document.getElementById('surveyIdField').value = '';
                    currentQuestions = [];
                    answersArray = [];
                    currentQIndex = 0;
                    loadCategory('', '');
                    
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert(data.message || 'Failed to submit survey. Please try again.');
                    console.error('Submission error:', data);
                }
            })
            .catch(function(error) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i> Submit Response';
                alert('An error occurred while submitting. Please check your connection and try again.');
                console.error('Fetch error:', error);
            });
        }

        // Event Listeners
        prevBtn.addEventListener('click', prevQuestion);
        nextBtn.addEventListener('click', nextQuestion);
        document.getElementById('submitBtn').addEventListener('click', handleSubmit);

        document.getElementById('surveyResponseForm').addEventListener('keydown', function(e) {
            if (e.key === "Enter" && e.target.tagName !== "TEXTAREA") {
                e.preventDefault();
                return false;
            }
        });

        // Initialize
        loadCategory('', '');
        refreshHistoryUI();
        updateAnalytics();

        console.log('✅ Dynamic Survey Module loaded successfully.');
        console.log('📊 Total surveys:', Object.keys(QUESTIONS_BY_SURVEY).length);
        console.log('📝 Survey history count:', surveyHistory.length);
    </script>
    <script src="<?= base_url('assets/user/js/navbar.js') ?>"></script>
</body>

</html>