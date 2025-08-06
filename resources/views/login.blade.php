@extends('layouts.header')

{{-- Inject custom body class ke layout --}}
@section('body-class', 'login-page')

@section('main')
<style>
    body.login-page {
        background-color: #C62828 !important;
        color: white;
    }

    .login-hero {
        padding-top: 80px;
        padding-bottom: 40px;
        text-align: center;
    }

    .login-hero h1 {
        font-weight: 700;
        font-size: 2rem;
    }

    .login-hero p {
        font-size: 1rem;
        margin-top: 10px;
    }

    .login-card {
        background-color: white;
        border: 1px solid var(--telkom-primary);
        border-radius: 10px;
        padding: 30px;
        max-width: 400px;
        margin: 0 auto;
        color: #333;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .btn-login {
        background-color: var(--telkom-primary);
        border: none;
    }

    .btn-login:hover {
        background-color: var(--telkom-dark);
    }

    .logo-top {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    @media (min-width: 768px) {
        .login-hero h1 {
            font-size: 3rem;
        }

        .login-hero p {
            font-size: 1.2rem;
        }
    }
</style>

<div class="container-fluid position-relative min-vh-100 d-flex flex-column justify-content-center align-items-center px-3">
    <!-- Logo Top -->
    <div class="logo-top">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50">
    </div>

    <!-- Hero Text -->
    <div class="login-hero text-center">
        <h1>KALKULASI CEPAT<br>SOLUSI TEPAT</h1>
        <p>Dari simulasi hingga realisasi, semua dimulai dari kalkulasi yang tepat.</p>
    </div>

    <!-- Login Form Card -->
    <div class="login-card mt-4">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40" class="mb-2">
            <h4 class="text-center text-telkom">Masuk</h4>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control" placeholder="Masukkan email" required autofocus>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label d-flex justify-content-between">
                    <span>Password</span>
                    <a href="#" class="text-danger small text-decoration-none">Lupa kata sandi?</a>
                </label>
                <input type="password" name="password" id="password"
                       class="form-control" placeholder="Masukkan password" required>
            </div>

            <!-- Remember -->
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Ingat saya</label>
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-login text-white">Masuk</button>
            </div>
        </form>
    </div>
</div>
@endsection
