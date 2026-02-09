<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Bawaslu PDF Locker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
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
            <h3 class="fw-bold text-gold mb-1">Bawaslu PDF Locker</h3>
            <p class="text-gold-50 small mb-0">
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
                <label class="form-label text-gold-50">Email</label>
                <input type="email"
                       name="email"
                       class="form-control login-input"
                       required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label text-gold-50">Password</label>
                <input type="password"
                       name="password"
                       class="form-control login-input"
                       required>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label text-gold-50">
                    Remember me
                </label>
            </div>

            <button class="btn login-btn w-100 fw-bold py-2">
                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Login
            </button>
        </form>

        @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}"
                   class="text-gold-50 small text-decoration-none">
                    Lupa password?
                </a>
            </div>
        @endif

    </div>
</div>

<style>
:root {
    --primary-red: rgba(237, 28, 35, 0.8);
    --secondary-red: rgba(122,28,31,0.85);
    --text-gold: #FFF1C1;
    --text-gold-50: rgba(255,241,193,0.7);
    --neon-red: rgba(237,28,36,0.9);
}

/* BODY */
body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
}

/* BACKGROUND: GAMBAR + GRADIENT HITAM + MERAH */
.login-bg {
    background:
        linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
        linear-gradient(135deg, var(--text-gold), var(--secondary-red)),
        url('{{ asset("images/login-background.jpg") }}') no-repeat center center;
    background-size: cover;
    background-blend-mode: overlay;
}

/* CARD */
.login-card {
    max-width: 420px;
    width: 100%;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    box-shadow:
        0 20px 40px rgba(0,0,0,0.35),
        inset 0 1px 0 rgba(255,255,255,0.1);
    border-radius: 18px;
}

/* ICON */
.login-icon {
    font-size: 3.2rem;
    color: var(--text-gold);
    filter: drop-shadow(0 6px 18px rgba(0,0,0,0.4));
}

/* TEXT */
.text-gold { color: var(--text-gold); }
.text-gold-50 { color: var(--text-gold-50); }

/* INPUT */
.login-input {
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.25);
    color: #fff;
    border-radius: 12px;
    transition: all .3s ease;
}

.login-input:focus {
    background: rgba(255,255,255,.2);
    border-color: var(--neon-red);
    color: #fff;
    box-shadow: 0 0 10px var(--neon-red);
}

/* BUTTON */
.login-btn {
    background: var(--neon-red);
    color: var(--text-gold);
    border-radius: 12px;
    transition: all .3s ease;
}
.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 15px var(--neon-red), 0 10px 25px rgba(0,0,0,0.3);
    color: #ff8b68;
}
</style>

</body>
</html>
