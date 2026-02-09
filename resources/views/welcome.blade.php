<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bawaslu PDF Locker</title>

<!-- Bootstrap & Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
:root {
    --primary-red: rgba(237,28,36,0.85);
    --secondary-red: rgba(122,28,31,0.85);
    --text-gold: #FFF1C1;
    --text-gold-50: rgba(255,241,193,0.7);
    --neon-red: rgba(237,28,36,0.9);
}

/* GLOBAL */
body, html {
    height: 100%;
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background:
        linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.93)),
        /* linear-gradient(135deg, var(--primary-red), var(--secondary-red)), */
        url('{{ asset("images/bawaslu.jpg") }}') no-repeat center center;
    background-size: cover;
    background-blend-mode: overlay;
    color: var(--text-gold);
}

/* FULLSCREEN CONTAINER */
.landing-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
    padding: 2rem;
}

/* CARD */
.landing-card {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius: 20px;
    padding: 3rem 2rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.35),
                inset 0 1px 0 rgba(255,255,255,0.1);
    max-width: 500px;
    width: 100%;
    transition: transform 0.3s;
}

.landing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.35);
}

/* HERO ICON */
.hero-icon {
    font-size: 4rem;
    color: var(--text-gold);
    margin-bottom: 1.5rem;
    filter: drop-shadow(0 0 10px var(--neon-red));
}

/* TITLES */
.landing-card h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.landing-card p {
    font-size: 1rem;
    opacity: 0.85;
    margin-bottom: 2rem;
    color: var(--text-gold-50);
}

/* BUTTON LOGIN */
.btn-login {
    background: var(--neon-red);
    color: var(--text-gold);
    font-weight: 600;
    padding: 0.75rem 2rem;
    border-radius: 12px;
    border: none;
    transition: all 0.3s;
}

.btn-login:hover {
    background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
    color: var(--text-gold);
    transform: translateY(-2px);
    box-shadow: 0 0 15px var(--neon-red), 0 10px 25px rgba(0,0,0,0.3);
}

/* FOOTER */
.landing-footer {
    position: absolute;
    bottom: 1rem;
    width: 100%;
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-gold-50);
}

/* RESPONSIVE */
@media (max-width: 576px) {
    .landing-card h1 {
        font-size: 2rem;
    }
}

/* HERO LOGO */
.landing-logo {
    width: 100px;
    height: 100px;
    object-fit: contain;
    filter: drop-shadow(0 0 10px var(--neon-red));
    transition: transform 0.3s, filter 0.3s;
}

.landing-logo:hover {
    transform: scale(1.1);
    filter: drop-shadow(0 0 15px var(--neon-red));
}

</style>
</head>
<body>

<div class="landing-container">
    <div class="landing-card">

        <!-- HERO LOGO -->
        <div class="hero-icon">
            <img src="{{ asset('images/logo-bawaslu-putih.png') }}" alt="BAWASLU Logo" class="landing-logo">
        </div>

        <h1>Bawaslu PDF Locker</h1>
        <p>Keamanan & verifikasi dokumen resmi Bawaslu Kabupaten Sumenep</p>

        @if(Route::has('login'))
            <a href="{{ route('login') }}" class="btn btn-login">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Login
            </a>
        @endif
    </div>
</div>


<div class="landing-footer">
    &copy; {{ date('Y') }} Bawaslu Kabupaten Sumenep
</div>

</body>
</html>
