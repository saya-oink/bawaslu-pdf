<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bawaslu PDF Locker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            height: 100%;
            background:
                linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
                linear-gradient(135deg, #ED1C24, #7A1C1F);
            background-size: cover;
            color: #FFF1C1;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.35);
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-header img {
            height: 70px;
            margin-bottom: 0.5rem;
            filter: drop-shadow(0 0 10px rgba(237,28,36,0.8));
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .login-header img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(237,28,36,0.8);
        }

        .login-header h2 {
            font-weight: 700;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
        }

        .login-header p {
            color: rgba(255,255,255,0.75);
        }

        .btn-primary {
            background-color: #ED1C24;
            border: none;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            color: #FFF1C1;
        }

        .btn-primary:hover {
            background-color: #B71C1C;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .forgot-link {
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
        }

        .forgot-link:hover {
            color: #ED1C24;
        }

        .login-input {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.35);
            color: #FFF1C1;
            border-radius: 10px;
        }

        .login-input:focus {
            background: rgba(255,255,255,0.25);
            border-color: #fff;
            color: #FFF1C1;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="login-container">

        {{-- HEADER --}}
        <div class="login-header">
            <img src="{{ asset('images/logo-bawaslu.png') }}" alt="BAWASLU Logo">
            <h2>Bawaslu PDF Locker</h2>
            <p>Silakan login untuk mengakses sistem</p>
        </div>

        {{-- CARD LOGIN --}}
        <div class="login-card">
            {{ $slot }}
        </div>

    </div>
</body>
</html>
