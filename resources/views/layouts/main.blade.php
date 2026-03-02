<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKEMBANG')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #EC1E88;
            --primary-dark: #c4166e;
            --primary-light: #f9a8d4;
            --primary-soft: #fce4f3;
            --secondary: #6c757d;
            --white: #ffffff;
            --bg-light: #fdf2f8;
            --bg-gradient: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 100%);
            --text-dark: #1a1a2e;
            --text-muted: #6c757d;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --shadow-sm: 0 1px 3px rgba(236, 30, 136, 0.08);
            --shadow-md: 0 4px 15px rgba(236, 30, 136, 0.12);
            --shadow-lg: 0 10px 30px rgba(236, 30, 136, 0.18);
            --shadow-primary: 0 4px 15px rgba(236, 30, 136, 0.25);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-gradient);
            color: var(--text-dark);
            min-height: 100vh;
            background-attachment: fixed;
        }

        .navbar-sikembang {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            box-shadow: var(--shadow-lg);
        }

        .navbar-sikembang .navbar-brand,
        .navbar-sikembang .nav-link,
        .navbar-sikembang .navbar-text {
            color: #ffffff !important;
            font-weight: 500;
        }

        .navbar-sikembang .nav-link:hover {
            color: rgba(255,255,255,0.75) !important;
        }

        .sidebar {
            min-height: 100vh;
            color: #ffffff;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: var(--radius-sm);
            margin: 4px 12px;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #ffffff;
        }

        .sidebar .nav-link i {
            width: 24px;
            margin-right: 10px;
            text-align: center;
        }

        .btn-primary-sikembang {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            color: #ffffff;
            padding: 10px 24px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary-sikembang:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #9a1058 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: var(--shadow-primary);
        }

        .btn-primary-sikembang:active {
            transform: translateY(0);
        }

        .btn-outline-sikembang {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            padding: 8px 22px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-sikembang:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-color: var(--primary);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: var(--shadow-primary);
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 0.85rem;
            border-radius: 6px;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .card {
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            background: var(--white);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-sikembang {
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--white);
            overflow: hidden;
        }

        .card-sikembang:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            border-bottom: 1px solid rgba(236, 30, 136, 0.1);
            padding: 16px 20px;
            font-weight: 600;
        }

        .card-header-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border-radius: var(--radius-md) var(--radius-md) 0 0 !important;
            border: none;
            padding: 16px 20px;
        }

        .card-header-primary h5,
        .card-header-primary h6 {
            margin: 0;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
        }

        .badge-primary-sikembang {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border: none;
            padding: 14px 16px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table thead th:first-child {
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
        }

        .table thead th:last-child {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: var(--primary-soft);
        }

        .table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-color: rgba(236, 30, 136, 0.08);
        }

        .table-hover tbody tr:hover {
            background: var(--primary-soft);
        }

        .form-control,
        .form-select {
            border: 2px solid #e5e7eb;
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border-radius: var(--radius-md);
            padding: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card .stat-number {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .stat-card .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .stat-card i {
            font-size: 2.5rem;
            opacity: 0.25;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .stat-card-gradient-pink {
            background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
        }

        .stat-card-gradient-green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .stat-card-gradient-orange {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .stat-card-gradient-blue {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        }

        .stat-card-gradient-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }

        .stat-card-gradient-red {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .badge-risiko-rendah { 
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white; 
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge-risiko-sedang { 
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white; 
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge-risiko-tinggi { 
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white; 
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge.bg-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
            color: white;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
        }

        .badge.bg-info {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%) !important;
        }

        .badge.bg-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
        }

        .badge.bg-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%) !important;
        }

        .alert {
            border: none;
            border-radius: var(--radius-sm);
            padding: 16px 20px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }

        .alert-info {
            background: linear-gradient(135deg, #cffafe 0%, #a5f3fc 100%);
            color: #155e75;
            border-left: 4px solid #06b6d4;
        }

        .chat-bubble-ibu {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border-radius: 18px 18px 4px 18px;
            padding: 12px 16px;
            max-width: 75%;
            align-self: flex-end;
            box-shadow: var(--shadow-sm);
        }

        .chat-bubble-bidan {
            background: #f3f4f6;
            color: var(--text-dark);
            border-radius: 18px 18px 18px 4px;
            padding: 12px 16px;
            max-width: 75%;
            box-shadow: var(--shadow-sm);
        }

        .timeline-item {
            border-left: 3px solid var(--primary);
            padding-left: 24px;
            margin-bottom: 24px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            width: 14px;
            height: 14px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            position: absolute;
            left: -7.5px;
            top: 4px;
            box-shadow: 0 0 0 3px var(--white);
        }

        .page-header {
            background: var(--white);
            padding: 20px 24px;
            border-radius: var(--radius-md);
            margin-bottom: 24px;
            box-shadow: var(--shadow-sm);
        }

        .page-header h4 {
            margin: 0;
            color: var(--text-dark);
            font-weight: 700;
        }

        .page-header .breadcrumb {
            margin: 8px 0 0;
            padding: 0;
            background: transparent;
        }

        .page-header .breadcrumb-item {
            font-size: 0.875rem;
        }

        .page-header .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .page-header .breadcrumb-item.active {
            color: var(--text-muted);
        }

        .empty-state {
            text-align: center;
            padding: 60px 30px;
            color: var(--text-muted);
            background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 100%);
            border-radius: 20px;
            margin: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(236, 30, 136, 0.1);
            border: 2px dashed rgba(236, 30, 136, 0.2);
        }

        .empty-state::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(236, 30, 136, 0.05) 0%, transparent 70%);
            animation: emptyPulse 3s ease-in-out infinite;
        }

        @keyframes emptyPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--primary);
            margin-bottom: 24px;
            position: relative;
            z-index: 1;
            opacity: 0.5;
            display: inline-block;
            padding: 20px;
        }

        .empty-state h5 {
            color: var(--text-dark);
            margin-bottom: 12px;
            font-weight: 700;
            font-size: 1.35rem;
            position: relative;
            z-index: 1;
        }

        .empty-state p {
            color: #6b7280;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
            max-width: 400px;
            margin: 0 auto 24px auto;
            line-height: 1.6;
        }

        .empty-state .btn {
            height: 40px;
            position: relative;
            z-index: 1;
            padding: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(236, 30, 136, 0.25);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .empty-state .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(236, 30, 136, 0.4);
        }

        .empty-state .btn i {
            font-size: 1rem;
            width: auto;
            height: auto;
            padding: 0;
            color: var(--white);
            margin: 0;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .avatar-sm {
            width: 32px;
            height: 32px;
            font-size: 0.75rem;
        }

        .avatar-lg {
            width: 56px;
            height: 56px;
            font-size: 1.25rem;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination .page-link {
            color: var(--primary);
            border: none;
            border-radius: var(--radius-sm);
            margin: 0 4px;
            padding: 8px 14px;
        }

        .pagination .page-link:hover {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .modal-content {
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: var(--radius-md) var(--radius-md) 0 0;
            border: none;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .dropdown-menu {
            border: none;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-lg);
            padding: 8px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 10px 16px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--primary-soft);
            color: var(--primary);
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide {
            animation: slideIn 0.4s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .table-datatable {
            width: 100% !important;
        }
        
        .table-datatable td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            padding: 20px;
        }

        .dataTables_length {
            margin-bottom: 15px;
        }

        .dataTables_length select {
            border: 2px solid #e5e7eb;
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            margin: 0 8px;
            background: var(--white) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 0.75rem center/12px 12px;
            color: var(--text-dark);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 30px !important;
        }

        .dataTables_length select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
            background-color: var(--white);
        }

        .dataTables_length select:hover {
            border-color: var(--primary);
        }

        .dataTables_filter {
            margin-bottom: 15px;
        }

        .dataTables_filter label {
            font-weight: 500;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dataTables_filter input {
            border: 2px solid #e5e7eb;
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            padding-left: 38px;
            width: 250px;
            transition: all 0.3s ease;
            background: var(--white) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E") no-repeat 12px center;
            background-size: 16px;
        }

        .dataTables_filter input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
        }

        .dataTables_filter input::placeholder {
            color: #9ca3af;
        }

        .dataTables_info {
            font-weight: 500;
            color: var(--text-muted);
            padding-top: 12px !important;
            display: none !important;
        }

        .dataTables_paginate {
            padding-top: 20px !important;
            display: flex !important;
            justify-content: center !important;
            gap: 6px;
        }

        .dataTables_paginate .paginate_button {
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 16px !important;
            margin: 0 2px !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            color: var(--text-dark) !important;
            background: #ffffff !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
            min-width: 44px;
            text-align: center;
        }

        .dataTables_paginate .paginate_button:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 20px rgba(236, 30, 136, 0.35) !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            box-shadow: 0 4px 15px rgba(236, 30, 136, 0.4) !important;
            transform: translateY(-2px) !important;
        }

        .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #9a1058 100%) !important;
            box-shadow: 0 6px 20px rgba(236, 30, 136, 0.5) !important;
        }

        .dataTables_paginate .paginate_button.disabled {
            opacity: 0.35;
            cursor: not-allowed;
            box-shadow: none !important;
        }

        .dataTables_paginate .paginate_button.disabled:hover {
            background: #ffffff !important;
            color: var(--text-dark) !important;
            transform: none !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
        }

        .dataTables_paginate .paginate_button i {
            font-size: 0.9rem;
        }

        .dt-panels {
            background: var(--white) !important;
            border-radius: var(--radius-md) !important;
            box-shadow: var(--shadow-lg) !important;
        }

        .dt-panels .dt-panels-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            border-radius: var(--radius-md) var(--radius-md) 0 0 !important;
        }

        table.dataTable {
            border-collapse: collapse !important;
            margin: 0 !important;
        }

        table.dataTable thead tr th {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            border: none !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        table.dataTable thead th:first-child {
            border-radius: 12px 0 0 0 !important;
        }

        table.dataTable thead th:last-child {
            border-radius: 0 12px 0 0 !important;
        }

        table.dataTable tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(236, 30, 136, 0.08);
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        table.dataTable tbody tr:hover {
            background-color: var(--primary-soft) !important;
        }

        table.dataTable tbody td {
            padding: 14px 16px !important;
            vertical-align: middle;
            border: none !important;
        }

        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        .dataTables_scrollHead {
            border-radius: 12px 12px 0 0;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .dataTables_scrollBody {
            border-radius: 0 0 12px 12px;
            border: none !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-top: none !important;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 4px;
            box-shadow: var(--shadow-sm);
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            content: "\002B" !important;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            font-size: 14px;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr.parent > td:first-child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr.parent > th:first-child:before {
            content: "\2212" !important;
            background: linear-gradient(135deg, var(--primary-dark) 0%, #9a1058 100%);
        }

        table.dataTable > tbody > tr.child span.dtr-title {
            font-weight: 600;
            color: var(--primary);
        }

        .dataTables_scrollHead {
            border-radius: var(--radius-md) var(--radius-md) 0 0;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .dataTables_scrollBody {
            border-radius: 0 0 var(--radius-md) var(--radius-md);
            border: none !important;
            box-shadow: var(--shadow-sm);
            border-top: none !important;
        }

        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        .dt-input {
            border: 2px solid #e5e7eb !important;
            border-radius: var(--radius-sm) !important;
            padding: 8px 12px !important;
        }

        .dt-input:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1) !important;
        }

        .dt-search {
            margin-bottom: 15px;
        }

        .dt-search label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .dt-search .dt-input {
            border: 2px solid #e5e7eb;
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            width: 250px;
        }

        .dt-length label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .dt-length select {
            border: 2px solid #e5e7eb;
            border-radius: var(--radius-sm);
            padding: 8px 12px;
        }

        .dt-length select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
        }

        div.dataTables_wrapper div.dataTables_processing {
            background: linear-gradient(to right, var(--white), var(--primary-soft), var(--white));
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            color: var(--primary);
            font-weight: 600;
            padding: 20px;
        }

        div.dataTables_wrapper div.dataTables_processing:after {
            display: none;
        }

        div.dataTables_wrapper div.dataTables_processing:before {
            display: inline-block;
            content: "";
            width: 40px;
            height: 40px;
            margin-right: 10px;
            vertical-align: middle;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            animation: dt-loading 1s infinite linear;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: white;
            line-height: 40px;
            text-align: center;
            content: "\f110" !important;
        }

        @keyframes dt-loading {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Modern DataTables Wrapper */
        .dataTables_wrapper {
            padding: 24px;
            background: #fafafa;
            border-radius: 0 0 16px 16px;
        }

        .dataTables_wrapper .row {
            margin: 0;
            align-items: center;
            display: flex !important;
            flex-wrap: wrap;
            gap: 16px;
        }

        .dataTables_wrapper .row > div {
            padding: 0;
        }

        .dataTables_wrapper .col-sm-12 {
            padding: 0;
        }

        /* Length Menu Styling */
        div.dataTables_wrapper div.dataTables_length {
            display: flex;
            align-items: center;
        }

        div.dataTables_wrapper div.dataTables_length label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin: 0;
        }

        div.dataTables_wrapper div.dataTables_length select {
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            padding: 10px 40px 10px 16px !important;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 14px center !important;
            background-size: 14px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            font-weight: 500;
            cursor: pointer;
            min-width: 90px;
            height: 42px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        div.dataTables_wrapper div.dataTables_length select:hover {
            border-color: var(--primary) !important;
        }

        div.dataTables_wrapper div.dataTables_length select:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.15), 0 2px 8px rgba(0, 0, 0, 0.08) !important;
        }

        /* Search Box Styling */
        div.dataTables_wrapper div.dataTables_filter {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin: 0 !important;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin: 0;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            padding: 10px 16px 10px 44px !important;
            width: 240px !important;
            height: 42px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='%239ca3af' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E") no-repeat 14px center !important;
            background-size: 18px !important;
            font-weight: 500;
            font-size: 0.875rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        div.dataTables_wrapper div.dataTables_filter input:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.15), 0 2px 8px rgba(0, 0, 0, 0.08) !important;
            width: 300px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input::placeholder {
            color: #9ca3af;
        }

        /* Info (hidden) */
        div.dataTables_wrapper div.dataTables_info {
            display: none !important;
        }

        /* Pagination Styling - Super Modern */
        .dataTables_paginate {
            display: flex !important;
            justify-content: center !important;
            gap: 8px;
            padding: 16px 0 0 0 !important;
            margin-top: 8px;
            border-top: 1px solid #f3f4f6;
        }

        .dataTables_paginate .paginate_button {
            border: none !important;
            border-radius: 12px !important;
            padding: 10px 16px !important;
            margin: 0 !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            color: #4b5563 !important;
            background: #ffffff !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06) !important;
            min-width: 48px;
            min-height: 42px;
            text-align: center;
            cursor: pointer;
            border: 2px solid transparent !important;
        }

        .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled) {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 100%) !important;
            color: var(--primary) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(236, 30, 136, 0.25) !important;
            border-color: var(--primary) !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            box-shadow: 0 4px 15px rgba(236, 30, 136, 0.4) !important;
            transform: translateY(-2px) !important;
            border-color: transparent !important;
        }

        .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #9a1058 100%) !important;
            box-shadow: 0 6px 20px rgba(236, 30, 136, 0.5) !important;
            transform: translateY(-3px) !important;
        }

        .dataTables_paginate .paginate_button.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            box-shadow: none !important;
            background: #f9fafb !important;
        }

        .dataTables_paginate .paginate_button.disabled:hover {
            background: #f9fafb !important;
            color: #4b5563 !important;
            transform: none !important;
            box-shadow: none !important;
            border-color: transparent !important;
        }

        .dataTables_paginate .paginate_button i {
            font-size: 0.8rem;
            font-weight: 900;
        }

        /* Table Styling */
        table.dataTable {
            border-collapse: collapse !important;
            margin: 0 !important;
            border-radius: 16px 16px 0 0;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        table.dataTable thead tr th {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            border: none !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 0.7rem !important;
            letter-spacing: 1px;
            padding: 16px 20px !important;
            white-space: nowrap;
        }

        table.dataTable thead th:first-child {
            border-radius: 16px 0 0 0 !important;
        }

        table.dataTable thead th:last-child {
            border-radius: 0 16px 0 0 !important;
        }

        table.dataTable tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f3f4f6;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        table.dataTable tbody tr:hover {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 100%) !important;
        }

        table.dataTable tbody td {
            padding: 14px 20px !important;
            vertical-align: middle;
            border: none !important;
            font-size: 0.875rem;
            color: #374151;
        }

        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        /* Scroll styling */
        .dataTables_scrollHead {
            border-radius: 16px 16px 0 0;
            overflow: hidden;
        }

        .dataTables_scrollBody {
            border-radius: 0 0 16px 16px;
            border: none !important;
            border-top: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Empty state */
        div.dt-container.dt-empty-error tbody td:before {
            display: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dataTables_wrapper {
                padding: 16px;
            }

            .dataTables_wrapper .row {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 12px;
            }

            .dataTables_length, 
            .dataTables_filter {
                width: 100% !important;
                display: flex !important;
                justify-content: center !important;
            }

            div.dataTables_wrapper div.dataTables_length label,
            div.dataTables_wrapper div.dataTables_filter label {
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }

            div.dataTables_wrapper div.dataTables_length select,
            div.dataTables_wrapper div.dataTables_filter input {
                width: 100% !important;
                max-width: 100%;
            }

            .dataTables_paginate {
                flex-wrap: wrap;
                justify-content: center !important;
            }

            .dataTables_paginate .paginate_button {
                padding: 8px 12px !important;
                min-width: 40px;
                min-height: 36px;
                font-size: 0.8rem !important;
            }
        }

        /* Custom scrollbar for table */
        .dataTables_scrollBody::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 4px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        div.dataTables_wrapper div.dataTables_length label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0;
        }

        div.dataTables_wrapper div.dataTables_length select {
            border: 2px solid #e5e7eb !important;
            border-radius: 10px !important;
            padding: 8px 36px 8px 14px !important;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 12px center !important;
            background-size: 12px !important;
            transition: all 0.3s ease;
            font-weight: 500;
            cursor: pointer;
            min-width: 80px;
        }

        div.dataTables_wrapper div.dataTables_length select:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.15);
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-bottom: 0;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            font-weight: 600;
            color: var(--text-dark);
        }

        div.dataTables_wrapper div.dataTables_filter input {
            border: 2px solid #e5e7eb !important;
            border-radius: 10px !important;
            padding: 10px 14px 10px 40px !important;
            width: 220px !important;
            transition: all 0.3s ease;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%239ca3af' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E") no-repeat 14px center !important;
            background-size: 16px !important;
            font-weight: 500;
        }

        div.dataTables_wrapper div.dataTables_filter input:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.15);
            width: 280px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input::placeholder {
            color: #9ca3af;
        }

        div.dataTables_wrapper div.dataTables_info {
            display: none !important;
        }

        .dataTables_wrapper .row {
            margin: 0 20px;
            padding: 20px 0;
            align-items: center;
            display: flex !important;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
        }

        .dataTables_wrapper .row .col-auto {
            flex: 0 0 auto;
        }

        .dataTables_wrapper .col-sm-12 {
            padding: 0;
            overflow: hidden;
        }

        .dataTables_scroll {
            margin: 0;
        }

        .dataTables_scrollHead {
            border-radius: 12px 12px 0 0;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .dataTables_scrollBody {
            border-radius: 0 0 12px 12px;
            border: none !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-top: none !important;
        }

        .card .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }

        .card .dataTables_scrollHead,
        .card .dataTables_scrollBody {
            border-radius: 0;
            box-shadow: none;
        }

        .card .dataTables_scrollBody {
            border-top: 1px solid rgba(236, 30, 136, 0.1);
        }

        div.dt-container.dt-empty-error tbody td:before {
            display: none;
        }

        @media (max-width: 576px) {
            .dataTables_wrapper .row {
                justify-content: center !important;
                text-align: center;
            }

            .dataTables_wrapper div.dataTables_filter {
                text-align: center !important;
                width: 100%;
            }

            .dataTables_wrapper div.dataTables_filter label {
                justify-content: center;
                width: 100%;
            }

            .dataTables_wrapper div.dataTables_length {
                width: 100%;
                text-align: center;
            }

            .dataTables_wrapper div.dataTables_length label {
                justify-content: center;
            }

            .dataTables_paginate {
                width: 100%;
                justify-content: center !important;
            }
        }

        div.dataTables_wrapper div.dataTables_filter label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }

        table.table-datatable {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        table.table-datatable thead tr th {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            border: none !important;
        }

        table.table-datatable tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        table.table-datatable tbody tr:hover {
            background-color: var(--primary-soft) !important;
        }

        .dataTables_length select,
        .dataTables_filter input {
            border: 2px solid #e5e7eb !important;
            border-radius: 8px !important;
            padding: 8px 12px !important;
            transition: all 0.3s ease;
        }

        .dataTables_length select:focus,
        .dataTables_filter input:focus {
            border-color: var(--primary) !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
        }

        /* ============================================
           CUSTOM DATATABLES - MODERN UI OVERRIDE
           ============================================ */

        /* Override Bootstrap5 DataTables */
        table.dataTable {
            border-collapse: collapse !important;
            width: 100% !important;
            margin: 0 !important;
            border: none !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        table.dataTable thead {
            background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
        }

        table.dataTable thead th {
            background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 16px 20px !important;
            font-weight: 700 !important;
            font-size: 0.72rem !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        table.dataTable thead th:first-child {
            border-radius: 16px 0 0 0 !important;
        }

        table.dataTable thead th:last-child {
            border-radius: 0 16px 0 0 !important;
        }

        table.dataTable tbody tr {
            background: #ffffff !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid #f0f0f0;
        }

        table.dataTable tbody tr:nth-child(even) {
            background: #fafafa !important;
        }

        table.dataTable tbody tr:hover {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 100%) !important;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(236, 30, 136, 0.15);
        }

        table.dataTable tbody td {
            padding: 14px 20px !important;
            border: none !important;
            vertical-align: middle;
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
            background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%) !important;
            border: none !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 8px rgba(236, 30, 136, 0.3);
            color: #ffffff !important;
            font-weight: 900;
            width: 28px !important;
            height: 28px !important;
            line-height: 28px !important;
            font-size: 14px;
        }

        /* DataTables Wrapper */
        div.dataTables_wrapper {
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        div.dataTables_wrapper div.row {
            margin: 0;
            padding: 20px 24px;
            background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
            border-radius: 0 0 16px 16px;
            display: flex !important;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        div.dataTables_wrapper div.row > div {
            padding: 0;
        }

        /* Length Menu */
        div.dataTables_length {
            display: flex;
            align-items: center;
        }

        div.dataTables_length label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin: 0;
        }

        div.dataTables_length select {
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            padding: 10px 40px 10px 16px !important;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 14px center !important;
            background-size: 14px !important;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            min-width: 100px;
            height: 44px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
        }

        div.dataTables_length select:hover {
            border-color: #EC1E88 !important;
            box-shadow: 0 4px 12px rgba(236, 30, 136, 0.15);
        }

        div.dataTables_length select:focus {
            border-color: #EC1E88 !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.2);
        }

        /* Search Box */
        div.dataTables_filter {
            display: flex;
            align-items: center;
        }

        div.dataTables_filter label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin: 0;
        }

        div.dataTables_filter input {
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            padding: 10px 16px 10px 44px !important;
            width: 260px !important;
            height: 44px;
            font-weight: 500;
            color: #374151;
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='%239ca3af' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E") no-repeat 14px center !important;
            background-size: 18px !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        div.dataTables_filter input::placeholder {
            color: #9ca3af;
        }

        div.dataTables_filter input:focus {
            border-color: #EC1E88 !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.2), 0 4px 12px rgba(236, 30, 136, 0.15);
            width: 300px !important;
        }

        /* Info - Hidden */
        div.dataTables_info {
            display: none !important;
        }

        /* Pagination - Clean & Beautiful Style */
        div.dataTables_paginate {
            display: flex !important;
            justify-content: center !important;
            align-items: center;
            gap: 4px;
            padding: 20px 0 12px 0 !important;
            margin: 0;
            width: 100%;
        }

        ul.pagination {
            display: inline-flex;
            gap: 4px;
            margin: 0;
            padding: 0;
            list-style: none;
            align-items: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 6px 12px;
            border-radius: 50px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        ul.pagination li {
            list-style: none;
            display: inline-flex;
        }

        ul.pagination .paginate_button {
            border: none !important;
            border-radius: 50% !important;
            padding: 0 !important;
            margin: 0 !important;
            min-width: 36px !important;
            height: 36px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-weight: 600 !important;
            font-size: 0.8rem !important;
            color: #495057 !important;
            background: transparent !important;
            transition: all 0.2s ease !important;
            cursor: pointer;
            position: relative;
        }

        ul.pagination .paginate_button:hover:not(.current):not(.disabled) {
            color: #EC1E88 !important;
            background: rgba(236, 30, 136, 0.1) !important;
        }

        ul.pagination .paginate_button.current {
            background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%) !important;
            color: #ffffff !important;
            box-shadow: 0 2px 8px rgba(236, 30, 136, 0.35) !important;
            min-width: 38px !important;
            height: 38px !important;
            font-weight: 700 !important;
        }

        ul.pagination .paginate_button.current:hover {
            background: linear-gradient(135deg, #c4166e 0%, #a6125a 100%) !important;
        }

        ul.pagination .paginate_button.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            background: transparent !important;
        }

        ul.pagination .paginate_button.disabled:hover {
            background: transparent !important;
            color: #495057 !important;
        }

        ul.pagination .paginate_button i {
            font-size: 0.75rem;
            font-weight: 900;
        }

        /* First/Last/Next/Previous buttons */
        ul.pagination .paginate_button.first,
        ul.pagination .paginate_button.last,
        ul.pagination .paginate_button.next,
        ul.pagination .paginate_button.previous {
            font-weight: 700 !important;
            font-size: 0.7rem !important;
            letter-spacing: 0.5px;
        }

        /* Processing */
        div.dataTables_processing {
            background: rgba(255, 255, 255, 0.95) !important;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15) !important;
            padding: 30px 40px !important;
            z-index: 9999;
        }

        div.dataTables_processing .spinner-border {
            color: #EC1E88 !important;
            width: 3rem;
            height: 3rem;
            border-width: 4px;
        }

        /* Empty State */
        td.dataTables_empty {
            padding: 60px 20px !important;
            text-align: center !important;
        }

        td.dataTables_empty .fa-inbox {
            font-size: 4rem !important;
            color: #d1d5db !important;
            opacity: 0.5;
        }

        td.dataTables_empty + tr {
            display: none !important;
        }

        /* Scroll Styles */
        .dataTables_scroll {
            margin: 0;
        }

        .dataTables_scrollHead {
            border-radius: 16px 16px 0 0;
            overflow: hidden;
        }

        .dataTables_scrollBody {
            border-radius: 0 0 16px 16px;
            border: none !important;
            border-top: none;
        }

        .dataTables_scrollBody::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #f9a8d4 0%, #EC1E88 100%);
            border-radius: 4px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
            background: #c4166e;
        }

        /* Card wrapper styling */
        .card .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            div.dataTables_wrapper div.row {
                padding: 16px;
                flex-direction: column;
                gap: 12px;
            }

            div.dataTables_length,
            div.dataTables_filter {
                width: 100%;
                justify-content: center;
            }

            div.dataTables_length label,
            div.dataTables_filter label {
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }

            div.dataTables_length select,
            div.dataTables_filter input {
                width: 100% !important;
                max-width: 100%;
            }

            div.dataTables_paginate {
                padding: 16px 0 0 0 !important;
            }

            ul.pagination .paginate_button {
                width: 38px !important;
                height: 38px !important;
                font-size: 0.8rem !important;
            }
        }
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        jQuery(document).ready(function($) {
            if (typeof $.fn.DataTable === 'undefined') {
                console.error('DataTable not loaded');
                return;
            }
            
            var dtLanguage = {
                "emptyTable": '<div class="text-center py-5"><i class="fa-solid fa-inbox text-secondary" style="font-size: 4rem; opacity: 0.4;"></i><p class="mt-3 text-secondary fw-medium">Tidak ada data</p></div>',
                "info": " ",
                "infoEmpty": " ",
                "infoFiltered": " ",
                "lengthMenu": "Tampilkan _MENU_",
                "loadingRecords": '<div class="d-flex flex-column align-items-center"><div class="spinner-border text-primary mb-2" role="status"></div><p class="text-primary fw-medium">Memuat data...</p></div>',
                "processing": '<div class="d-flex flex-column align-items-center"><div class="spinner-border text-primary mb-2" role="status"></div><p class="text-primary fw-medium">Memproses...</p></div>',
                "search": "",
                "searchPlaceholder": "Ketik untuk mencari...",
                "zeroRecords": '<div class="text-center py-5"><i class="fa-solid fa-magnifying-glass text-secondary" style="font-size: 4rem; opacity: 0.4;"></i><p class="mt-3 text-secondary fw-medium">Tidak ada data yang cocok</p></div>',
                "paginate": {
                    "first": '&#171;',
                    "last": '&#187;',
                    "next": '&#8250;',
                    "previous": '&#8249;'
                }
            };
            
            $('.table-datatable').each(function() {
                var $table = $(this);
                
                if ($table.hasClass('dataTable')) {
                    return;
                }
                
                $table.DataTable({
                    language: dtLanguage,
                    responsive: true,
                    autoWidth: false,
                    pageLength: 10,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'Semua']],
                    ordering: true,
                    searching: true,
                    paging: true,
                    pagingType: 'full_numbers',
                    info: false,
                    processing: true,
                    stateSave: false,
                    destroy: true,
                    retrieve: true,
                    dom: '<"row"<"col-auto"l><"col"f>>t<"row"<"col-auto"p>>'
                });
            });

            // SweetAlert for success messages
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
            @endif

            // Confirm delete with SweetAlert
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-delete') || e.target.closest('.btn-delete')) {
                    e.preventDefault();
                    let form = e.target.closest('form');
                    Swal.fire({
                        icon: 'warning',
                        title: 'Hapus Data?',
                        text: 'Data yang dihapus tidak dapat dikembalikan!',
                        showCancelButton: true,
                        confirmButtonColor: '#EC1E88',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });

            // Confirm logout with SweetAlert
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('logout-link') || e.target.closest('.logout-link')) {
                    e.preventDefault();
                    let href = e.target.closest('.logout-link').getAttribute('href');
                    Swal.fire({
                        icon: 'question',
                        title: 'Logout?',
                        text: 'Apakah Anda yakin ingin keluar?',
                        showCancelButton: true,
                        confirmButtonColor: '#EC1E88',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Logout!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
    @yield('content')

    @stack('scripts')
</body>
</html>
