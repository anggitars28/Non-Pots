<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator Non-pots</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
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
            padding: 0.1rem;
        }
        .table td {
            vertical-align: middle;
            padding: 0.1rem;
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

        /* Tambahan agar tabel tidak mepet */
        .table-wrapper {
            overflow-x: auto;
        }

        .calculator-table {
            min-width: 1200px; /* atau sesuaikan misalnya 1200px */
        }

        .calculator-table th,
        .calculator-table td {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-telkom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('calculator.index') }}">
                <i class="fas fa-calculator"></i> Kalkulator Non-pots
            </a>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Kalkulator Non-pots. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
