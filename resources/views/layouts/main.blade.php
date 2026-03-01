<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKEMBANG')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary: #EC1E88;
            --primary-dark: #c4166e;
            --primary-light: #f9a8d4;
            --primary-soft: #fce4f3;
            --secondary: #6c757d;
            --white: #ffffff;
            --bg-light: #fdf2f8;
            --text-dark: #2d2d2d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .navbar-sikembang {
            background-color: var(--primary);
            box-shadow: 0 2px 10px rgba(236, 30, 136, 0.3);
        }

        .navbar-sikembang .navbar-brand,
        .navbar-sikembang .nav-link,
        .navbar-sikembang .navbar-text {
            color: #ffffff !important;
        }

        .navbar-sikembang .nav-link:hover {
            color: rgba(255,255,255,0.75) !important;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 8px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: #ffffff;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 8px;
        }

        .btn-primary-sikembang {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        .btn-primary-sikembang:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
        }

        .btn-outline-sikembang {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline-sikembang:hover {
            background-color: var(--primary);
            color: #ffffff;
        }

        .card-sikembang {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(236, 30, 136, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-sikembang:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(236, 30, 136, 0.2);
        }

        .card-header-primary {
            background-color: var(--primary);
            color: #ffffff;
            border-radius: 12px 12px 0 0 !important;
        }

        .badge-primary-sikembang {
            background-color: var(--primary);
            color: #ffffff;
        }

        .table-sikembang thead {
            background-color: var(--primary);
            color: #ffffff;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(236, 30, 136, 0.25);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border-radius: 12px;
            padding: 20px;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
        }

        .badge-risiko-rendah { background-color: #28a745; color: white; }
        .badge-risiko-sedang { background-color: #ffc107; color: #212529; }
        .badge-risiko-tinggi { background-color: #dc3545; color: white; }

        .chat-bubble-ibu {
            background-color: var(--primary);
            color: #ffffff;
            border-radius: 18px 18px 4px 18px;
            padding: 10px 14px;
            max-width: 70%;
            align-self: flex-end;
        }

        .chat-bubble-bidan {
            background-color: #f1f1f1;
            color: var(--text-dark);
            border-radius: 18px 18px 18px 4px;
            padding: 10px 14px;
            max-width: 70%;
        }

        .timeline-item {
            border-left: 3px solid var(--primary);
            padding-left: 20px;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            width: 12px;
            height: 12px;
            background: var(--primary);
            border-radius: 50%;
            position: absolute;
            left: -7.5px;
            top: 4px;
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
