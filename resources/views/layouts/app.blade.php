@extends ('layouts.header')

@section('main')
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

    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Blade stack for additional page scripts -->
    @stack('scripts')
</body>

</html>

@endsection
