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

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #0284c7, #0ea5e9);
            font-family: 'Figtree', sans-serif;
            color: #1f2937;
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
            background: #ffffff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-header i {
            font-size: 3rem;
            color: #dc2626; /* merah premium Bawaslu */
            margin-bottom: 0.5rem;
        }

        .login-header h2 {
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .login-header p {
            color: #6b7280; /* abu-abu lembut */
        }

        .btn-primary {
            background-color: #dc2626;
            border: none;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #b91c1c;
            transform: translateY(-2px);
        }

        .forgot-link {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .forgot-link:hover {
            color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="login-container">

        {{-- HEADER --}}
        <div class="login-header">
            <i class="fa-solid fa-file-shield"></i>
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
