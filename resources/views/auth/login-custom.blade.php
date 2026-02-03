<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Bawaslu PDF Locker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (FIXED & STABLE) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="vh-100 d-flex align-items-center justify-content-center login-bg">

    <div class="card login-card border-0 shadow-lg rounded-4 p-4 p-md-5">

        <!-- Logo & Title -->
        <div class="text-center mb-4">
            <div class="login-icon mb-3">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3 class="fw-bold text-white mb-1">Bawaslu PDF Locker</h3>
            <p class="text-white-50 small mb-0">
                Sistem pengamanan & verifikasi dokumen resmi
            </p>
        </div>

        <!-- Status -->
        @if (session('status'))
            <div class="alert alert-success text-center small">
                {{ session('status') }}
            </div>
        @endif

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger small">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label text-white-75">Email</label>
                <input type="email"
                       name="email"
                       class="form-control login-input"
                       required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label text-white-75">Password</label>
                <input type="password"
                       name="password"
                       class="form-control login-input"
                       required>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label text-white-75">
                    Remember me
                </label>
            </div>

            <button class="btn btn-light w-100 fw-bold py-2 login-btn">
                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Login
            </button>
        </form>

        @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}"
                   class="text-white-50 small text-decoration-none">
                    Lupa password?
                </a>
            </div>
        @endif

    </div>
</div>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    /* PREMIUM GRADIENT BACKGROUND */
    .login-bg {
        background:
            radial-gradient(circle at top left, rgba(255,255,255,0.15), transparent 40%),
            radial-gradient(circle at bottom right, rgba(0,0,0,0.25), transparent 40%),
            linear-gradient(135deg, #0f172a, #0284c7, #38bdf8);
        background-size: 300% 300%;
        animation: gradientMove 12s ease infinite;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* CARD */
    .login-card {
        max-width: 420px;
        width: 100%;
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(18px);
        box-shadow:
            0 20px 40px rgba(0,0,0,0.25),
            inset 0 1px 0 rgba(255,255,255,0.15);
    }

    /* ICON */
    .login-icon {
        font-size: 3.2rem;
        color: #fff;
        filter: drop-shadow(0 6px 18px rgba(0,0,0,0.4));
    }

    /* INPUT */
    .login-input {
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.35);
        color: #fff;
        border-radius: 10px;
    }

    .login-input:focus {
        background: rgba(255,255,255,.25);
        border-color: #fff;
        color: #fff;
        box-shadow: none;
    }

    /* BUTTON */
    .login-btn {
        border-radius: 10px;
        transition: all .3s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .text-white-75 { color: rgba(255,255,255,.75); }
    .text-white-50 { color: rgba(255,255,255,.5); }
</style>

</body>
</html>
