@extends('layouts.app')

@section('title', 'Beranda | Bawaslu Kabupaten Sumenep')

@section('content')

<style>
/* GLOBAL */
.home-wrapper {
    background: linear-gradient(135deg, #ED1C24 0%, #b31217 45%, #6a0f12 100%);
    color: #FFF1C1;
}

/* HERO */
.hero-premium {
    min-height: 85vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-glow {
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(
        circle,
        rgba(255,241,193,.45),
        transparent 70%
    );
    top: -150px;
    right: -150px;
    filter: blur(90px);
}

.hero-title {
    color: #FFF1C1;
}

.hero-title span {
    background: linear-gradient(90deg, #FFF1C1, #FDF0C8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* BUTTON */
.btn-premium {
    background: linear-gradient(90deg, #ED1C24, #b31217);
    border: none;
    color: #FFF1C1;
    border-radius: 50px;
    padding: 12px 28px;
    font-weight: 600;
    transition: .3s;
}

.btn-premium:hover {
    background: linear-gradient(90deg, #ff2a32, #ED1C24);
    color: #FFF1C1;
    box-shadow: 0 10px 30px rgba(237,28,36,.45);
}

.btn-premium-outline {
    border: 2px solid rgba(255,241,193,.6);
    color: #FFF1C1;
    border-radius: 50px;
    padding: 12px 28px;
    font-weight: 600;
    transition: .3s;
}

.btn-premium-outline:hover {
    background: rgba(255,241,193,.15);
    color: #FFF1C1;
}

/* GLASS CARD */
.glass-card {
    background: rgba(255,241,193,.08);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0,0,0,.45);
    transition: all .3s ease;
}

.glass-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 30px 70px rgba(0,0,0,.6);
}

/* ICON */
.glass-card i {
    color: #FFF1C1 !important;
}

/* SECTION TITLE */
.section-title {
    font-weight: 700;
    letter-spacing: .5px;
    color: #FFF1C1;
}

/* TEXT SOFT */
.text-white-50 {
    color: rgba(255,241,193,.7) !important;
}
</style>


<div class="home-wrapper">

{{-- HERO --}}
<section class="hero-premium">
    <div class="hero-glow"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold hero-title">
                    Website Resmi <br>
                    <span>Bawaslu Kabupaten Sumenep</span>
                </h1>

                <p class="mt-3 text-white-50">
                    Transparansi informasi, pengawasan pemilu, dan layanan
                    verifikasi dokumen resmi berbasis digital.
                </p>

                <div class="mt-4">
                    <a href="{{ route('user.pdf.locker') }}" class="btn btn-premium me-2">
                        <i class="fa-solid fa-lock me-1"></i> PDF Locker
                    </a>
                    <a href="{{ route('user.profile.index') }}" class="btn btn-premium-outline">
                        Profil Bawaslu
                    </a>
                </div>
            </div>

            <div class="col-md-6 text-center d-none d-md-block">
                <i class="fa-solid fa-file-shield fa-10x text-white opacity-25"></i>
            </div>
        </div>
    </div>
</section>

{{-- QUICK ACCESS --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="glass-card h-100 text-center p-4">
                    <i class="fa-solid fa-file-shield fa-2x text-info mb-3"></i>
                    <h6 class="fw-bold">PDF Locker</h6>
                    <p class="text-white-50 small">
                        Kunci & verifikasi dokumen PDF resmi
                    </p>
                    <a href="{{ route('user.pdf.locker') }}" class="stretched-link"></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card h-100 text-center p-4">
                    <i class="fa-solid fa-building-columns fa-2x text-info mb-3"></i>
                    <h6 class="fw-bold">Profil Bawaslu</h6>
                    <p class="text-white-50 small">
                        Informasi resmi lembaga Bawaslu
                    </p>
                    <a href="{{ route('user.profile.index') }}" class="stretched-link"></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card h-100 text-center p-4">
                    <i class="fa-solid fa-archive fa-2x text-info mb-3"></i>
                    <h6 class="fw-bold">Arsip Dokumen</h6>
                    <p class="text-white-50 small">
                        Cek keaslian dokumen resmi
                    </p>
                    <a href="{{ route('user.archives.index') }}" class="stretched-link"></a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- VERIFIKASI CTA --}}
<section class="py-5 text-center">
    <div class="container">
        <h3 class="section-title mb-3">
            Verifikasi Keaslian Dokumen
        </h3>
        <p class="text-white-50 mb-4">
            Pastikan dokumen Anda berasal dari sumber resmi Bawaslu
        </p>

        <a href="{{ route('user.verifikasi.dokumen') }}" class="btn btn-premium btn-lg">
            <i class="fa-solid fa-shield-check me-1"></i> Verifikasi Sekarang
        </a>
    </div>
</section>

</div>
@endsection
