<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Bawaslu PDF Locker</title>

    <!-- Bootstrap 5 & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>


    <style>
        /* GLOBAL STYLING */
        body, html {
    height: 100%;
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    color: #fff;

    background:
        radial-gradient(circle at top left, rgba(255,255,255,0.15), transparent 40%),
        radial-gradient(circle at bottom right, rgba(0,0,0,0.25), transparent 40%),
        linear-gradient(135deg, #0f172a, #0284c7, #38bdf8);
}

body, html {
    background-size: 300% 300%;
    animation: gradientMove 12s ease infinite;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
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

        /* CARD / HERO */
        .landing-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
            transition: transform 0.3s;
        }

        .landing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        }

        /* TITLES */
        .landing-card h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .landing-card p {
            font-size: 1rem;
            opacity: 0.8;
            margin-bottom: 2rem;
        }

        /* BUTTON */
        .btn-login {
            background: #fff;
            color: #0284c7;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            border: none;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #0284c7;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        /* ICON HERO */
        .hero-icon {
            font-size: 4rem;
            color: #fff;
            margin-bottom: 1.5rem;
        }

        /* FOOTER MINI */
        .landing-footer {
            position: absolute;
            bottom: 1rem;
            width: 100%;
            text-align: center;
            font-size: 0.875rem;
            color: rgba(255,255,255,0.6);
        }

        @media (max-width: 576px) {
            .landing-card h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <div class="landing-container">
        <div class="landing-card">
            <div class="hero-icon">
                <i class="fa-solid fa-file-shield"></i>
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
