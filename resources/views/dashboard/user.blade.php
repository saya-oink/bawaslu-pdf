@extends('layouts.app')

@section('title', 'Beranda | Bawaslu Kabupaten Sumenep')

@section('content')

{{-- HERO --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <h1 class="fw-bold lh-sm">
                    Website Resmi <br>
                    <span class="text-primary">Bawaslu Kabupaten Sumenep</span>
                </h1>

                <p class="text-muted mt-3">
                    Transparansi informasi, pengawasan pemilu, dan layanan
                    verifikasi dokumen resmi.
                </p>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('user.pdf-locker.index') }}"
                       class="btn btn-primary btn-lg px-4">
                        <i class="fa-solid fa-file-shield me-2"></i>
                        PDF Locker
                    </a>

                    <a href="{{ route('user.profile') }}"
                       class="btn btn-outline-primary btn-lg px-4">
                        Profil Bawaslu
                    </a>
                </div>
            </div>

            <div class="col-md-6 text-center d-none d-md-block">
                <i class="fa-solid fa-shield-check fa-10x text-primary opacity-25"></i>
            </div>

        </div>
    </div>
</section>

{{-- QUICK ACCESS --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            {{-- PDF Locker --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center hover-card">
                    <div class="card-body p-4">
                        <i class="fa-solid fa-file-shield fa-2x text-primary mb-3"></i>
                        <h6 class="fw-bold">PDF Locker</h6>
                        <p class="text-muted small">
                            Kunci dan lindungi dokumen PDF resmi dengan watermark
                        </p>
                        <a href="{{ route('user.pdf-locker.index') }}"
                           class="stretched-link"></a>
                    </div>
                </div>
            </div>

            {{-- Verifikasi --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center hover-card">
                    <div class="card-body p-4">
                        <i class="fa-solid fa-shield-check fa-2x text-primary mb-3"></i>
                        <h6 class="fw-bold">Verifikasi Dokumen</h6>
                        <p class="text-muted small">
                            Pastikan keaslian dokumen dari sumber resmi Bawaslu
                        </p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>

            {{-- Profil Bawaslu --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center hover-card">
                    <div class="card-body p-4">
                        <i class="fa-solid fa-building-columns fa-2x text-primary mb-3"></i>
                        <h6 class="fw-bold">Profil Bawaslu</h6>
                        <p class="text-muted small">
                            Informasi resmi kelembagaan Bawaslu Kabupaten Sumenep
                        </p>
                        <a href="{{ route('user.profile') }}"
                           class="stretched-link"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- CTA VERIFIKASI --}}
<section class="py-5 bg-white border-top">
    <div class="container text-center">
        <h3 class="fw-bold mb-3">
            Verifikasi Keaslian Dokumen
        </h3>

        <p class="text-muted mb-4">
            Gunakan layanan resmi untuk memastikan dokumen Anda sah dan valid
        </p>

        <a href="#"
           class="btn btn-primary btn-lg px-5">
            <i class="fa-solid fa-shield-check me-2"></i>
            Verifikasi Sekarang
        </a>
    </div>
</section>

{{-- STYLE --}}
<style>
.hover-card {
    transition: all .25s ease;
}
.hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,.12);
}
</style>

@endsection
