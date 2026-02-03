<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Dashboard User')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background: #f4f6f9;
        }

        /* Sidebar */
        #sidebar {
            width: 240px;
            transition: width 0.3s;
        }

        #sidebar.mini {
            width: 70px;
        }

        #sidebar .sidebar-text {
            transition: opacity 0.3s;
        }

        #sidebar.mini .sidebar-text {
            opacity: 0;
            display: none;
        }

        #sidebar .nav-link i {
            width: 24px;
            text-align: center;
        }

        /* Sidebar / Main */
        .admin-wrapper {
            display: flex;
        }

        .admin-main {
            flex-grow: 1;
            padding: 20px;
        }

        header.user-header {
            background: #fff;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            border-radius: 12px;
            margin-bottom: 20px;
        }

        header.user-header img {
            object-fit: cover;
        }

        .sidebar .nav-link {
            border-radius: 12px;
            margin-bottom: 6px;
            transition: all 0.3s;
        }
    </style>

    @stack('styles')
</head>
<body>
<div class="admin-wrapper">

    {{-- Sidebar --}}
    <aside id="sidebar" class="bg-dark text-white vh-100 position-fixed p-3 sidebar">
        <div class="fw-bold fs-5 mb-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-user-shield me-2"></i>
                <span class="sidebar-text">User Panel</span>
            </div>
            <button id="toggleSidebar" class="btn btn-sm btn-outline-light d-md-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('user.dashboard') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="ms-2 sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.verifikasi') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="fa-solid fa-shield-check"></i>
                    <span class="ms-2 sidebar-text">Verifikasi Dokumen</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="ms-2 sidebar-text">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    {{-- Main Content --}}
    <div class="admin-main" style="margin-left:240px;">
        {{-- Header --}}
        <header class="user-header mb-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">@yield('page-title','Dashboard User')</h5>

            <div class="d-flex align-items-center gap-2">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="rounded-circle" width="40" height="40">
                @else
                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center"
                         style="width:40px; height:40px;">
                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                    </div>
                @endif

                <span class="fw-semibold">{{ auth()->user()->name }}</span>
            </div>
        </header>

        {{-- Page Content --}}
        <main>
            @yield('content')
        </main>
    </div>
</div>
