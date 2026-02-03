<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .stat-card {
    transition: all 0.25s ease;
}

/* Ukuran normal sidebar */
aside#sidebar {
    width: 260px;
    transition: width 0.3s ease;
}

/* Mini sidebar */
aside#sidebar.mini {
    width: 70px;
}

/* Menyembunyikan teks menu saat mini */
aside#sidebar.mini .nav-link span {
    display: none;
}

/* Posisikan ikon tetap di tengah */
aside#sidebar.mini .nav-link i {
    text-align: center;
    width: 100%;
}


.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
}

.icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.card {
    border-radius: 16px;
}

.list-group-item {
    border-radius: 12px;
    margin-bottom: 6px;
}

.btn {
    border-radius: 12px;
}
.stat-card {
    border-radius: 18px !important;
    background: #ffffff;
}

/* SIDEBAR – BORDER RADIUS 0% */
aside#sidebar {
    border-radius: 0 !important;
}

/* Jika ada mini sidebar */
aside#sidebar.mini {
    border-radius: 0 !important;
}

/* Pastikan link & menu item tetap rapi */
.sidebar .nav-link,
.sidebar-header,
.btn-logout {
    border-radius: 0 !important;
}


header {
    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
}

.pdf-card {
    border-radius: 18px;
}

.pdf-header {
    background: linear-gradient(135deg, #d93025, #b71c1c);
    color: #fff;
    text-align: center;
    padding: 20px;
    border-top-left-radius: 18px;
    border-top-right-radius: 18px;
}

.loading-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(255,255,255,0.9);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.loader {
    width: 42px;
    height: 42px;
    border: 4px solid #eee;
    border-top: 4px solid #d93025;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    100% { transform: rotate(360deg); }
}

.pdf-locker-wrapper {
    min-height: calc(100vh - 80px);
    padding: 24px;
}

.pdf-locker-card {
    height: 100%;
    border-radius: 20px;
}

.pdf-locker-header {
    background: linear-gradient(135deg, #d93025, #b71c1c);
    color: #fff;
    text-align: center;
    padding: 18px;
    border-radius: 20px 20px 0 0;
}

.pdf-locker-body {
    padding: 24px;
}

/* MOBILE OPTIMIZATION */
@media (max-width: 768px) {
    .pdf-locker-wrapper {
        padding: 12px;
    }

    .pdf-locker-body {
        padding: 16px;
    }

    .pdf-locker-header h5 {
        font-size: 1rem;
    }

    .btn {
        width: 100%;
    }
}

.locker-page {
    min-height: calc(100vh - 80px);
    padding: 24px;
    background: #f4f6f9;
}

.locker-card {
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
    max-width: 1100px;
    margin: auto;
}

.locker-header {
    display: flex;
    align-items: center;
    gap: 14px;
    background: linear-gradient(135deg, #d93025, #b71c1c);
    color: #fff;
    padding: 18px 24px;
    border-radius: 22px 22px 0 0;
}

.locker-header h6 {
    margin: 0;
    font-weight: 600;
}

.locker-header small {
    opacity: .8;
}

.locker-form {
    padding: 32px;
}

.locker-form label {
    font-size: .85rem;
    font-weight: 600;
    color: #555;
}

.locker-action {
    text-align: right;
    margin-top: 30px;
}

/* MOBILE */
@media (max-width: 768px) {
    .locker-form {
        padding: 20px;
    }

    .locker-action button {
        width: 100%;
    }
}


    </style>

    @stack('styles')
</head>
<body>
<body class="admin-body">

<div class="admin-wrapper d-flex">
    @yield('sidebar')
    

    <div class="admin-main flex-grow-1">
        @yield('header')
        <main class="admin-content">
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
