<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Non-pots</title>

    <!-- CDN Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Styling -->
    <style>
        :root {
            --telkom-primary: #e60000;
            --telkom-dark: #cc0000;
            --telkom-light: #ff4d4d;
        }

        .table th {
            background-color: var(--telkom-primary);
            color: white;
            text-align: center;
            font-size: 0.9rem;
            padding: 0.5rem;
        }
        .table td {
            vertical-align: middle;
            padding: 0.5rem;
        }
        .card, .btn, .form-control, .form-select {
            border-radius: 8px;
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        .form-select, .form-control {
            font-size: 0.9rem;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
        }
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .navbar-brand {
            font-size: 1.5rem;
        }

        .bg-telkom {
            background-color: var(--telkom-primary) !important;
        }

        .btn-telkom {
            background-color: var(--telkom-primary);
            border-color: var(--telkom-primary);
            color: white;
        }

        .btn-telkom:hover {
            background-color: var(--telkom-dark);
            border-color: var(--telkom-dark);
            color: white;
        }

        .text-telkom {
            color: var(--telkom-primary) !important;
        }

        .border-telkom {
            border-color: var(--telkom-primary) !important;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        /* Styling khusus Select2 agar cocok dengan Bootstrap */
        .select2-container--default .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
        }

        .select2-selection__rendered {
            line-height: 24px;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
</head>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery & Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield ('main')
</html>
