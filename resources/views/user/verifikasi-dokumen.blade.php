@extends('layouts.app')

@section('content')
<style>
    .comingsoon-wrapper {
        min-height: calc(100vh - 120px); /* aman untuk navbar + footer */
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #ED1C24, #b31217, #6a0f12);
        position: relative;
        overflow: hidden;
    }

    .comingsoon-glow {
        position: absolute;
        width: 420px;
        height: 420px;
        background: radial-gradient(circle, rgba(255,241,193,0.35), transparent 70%);
        top: -120px;
        right: -120px;
        filter: blur(70px);
    }

    .comingsoon-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: 22px;
        padding: 3rem;
        max-width: 520px;
        width: 100%;
        text-align: center;
        box-shadow: 0 25px 60px rgba(0,0,0,0.45);
        animation: fadeUp 1s ease forwards;
        color: #FFF1C1;
    }

    .comingsoon-badge {
        display: inline-block;
        background: linear-gradient(90deg, #ED1C24, #b31217);
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 12px;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .comingsoon-title {
        font-weight: 700;
        margin-top: 1.5rem;
        letter-spacing: 1px;
        color: #FFF1C1;
    }

    .comingsoon-text {
        color: rgba(255,255,255,0.75);
        margin-top: 1rem;
    }

    .comingsoon-btn {
        background: linear-gradient(90deg, #ED1C24, #b31217);
        border: none;
        color: #FFF1C1;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        margin-top: 2rem;
        transition: all 0.3s ease;
    }

    .comingsoon-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(237,28,36,0.5);
        color: #FFF1C1;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>


<div class="comingsoon-wrapper">
    <div class="comingsoon-glow"></div>

    <div class="comingsoon-card">
        <span class="comingsoon-badge">COMING SOON</span>

        <h1 class="comingsoon-title">Verifikasi Dokumen</h1>

        <p class="comingsoon-text">
            Kami sedang menyiapkan sistem verifikasi dokumen PDF  
            yang aman, modern, dan terpercaya.
        </p>

        <p class="comingsoon-text small">
            Fitur ini akan segera tersedia 🚀
        </p>

        <a href="{{ url()->previous() }}" class="btn comingsoon-btn">
            Kembali
        </a>
    </div>
</div>
@endsection
