@extends('layouts.admin')

@section('title','PDF Locker')

@section('content')
<div class="d-flex">

@include('admin.partials.sidebar')

<div class="flex-grow-1" style="margin-left:260px;">
@include('admin.partials.header')

<div class="p-4 page-bg">

    {{-- PAGE TITLE --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1 text-info">
            <i class="fa-solid fa-file-shield me-1"></i> PDF Locker
        </h4>
        <p class="text-muted mb-0">
            Mengunci dokumen PDF dengan watermark
        </p>
    </div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-main">

                {{-- HEADER --}}
                <div class="header-section">
                    <i class="fas fa-file-shield fa-3x mb-3"></i>
                    <h2 class="fw-bold">PDF Security Locker</h2>
                    <p class="mb-0 opacity-75">Bawaslu Kabupaten Sumenep</p>
                </div>

                {{-- BODY --}}
                <div class="p-4 p-md-5">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="main-form" method="POST" action="{{ route('admin.watermark.process') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Teks URL (Kiri)</label>
                                <input type="text" name="text_left" class="form-control"
                                       placeholder="Contoh: https://jdih.bawaslu.go.id">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Teks Instansi (Kanan)</label>
                                <input type="text" name="text_right" class="form-control"
                                       placeholder="Contoh: Bawaslu Kabupaten Sumenep">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Warna Watermark</label>
                                <input type="color" name="wm_color"
                                       class="form-control form-control-color w-100"
                                       value="#1e40af">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kualitas (DPI)</label>
                                <select name="quality" class="form-select">
                                    <option value="300" selected>Tinggi (Sangat Bersih)</option>
                                    <option value="150">Standar (Cepat)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Dokumen PDF</label>
                            <input type="file" name="document"
                                   class="form-control form-control-lg"
                                   accept="application/pdf" required>
                        </div>

                        <button type="submit" class="btn-process">
                            <i class="fas fa-lock me-2"></i>
                            PROSES & KUNCI PERMANEN
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- LOADING OVERLAY --}}
<div id="loading-overlay">
    <div class="loader mb-3"></div>
    <h4 class="fw-bold">Sedang Mengunci Dokumen...</h4>
    <p class="text-muted text-center">Jangan tutup halaman sampai file terunduh otomatis.</p>
</div>

</div>
</div>

@endsection

@push('styles')
<style>
/* ===========================
   PAGE BACKGROUND
=========================== */
.page-bg {
    min-height: 100vh;
    background: #f4f6f9; /* tetap terang agar kontras dengan card */
    transition: all 0.5s ease;
    padding-bottom: 50px;
    font-family: 'Segoe UI', sans-serif;
}

.page-bg h4.fw-bold.text-info {
    color: #203a43 !important; /* dove navy */
}

.page-bg p.text-muted {
    color: #203a43 !important; /* dove navy */
}

/* ===========================
   CARD UTAMA PDF LOCKER
=========================== */
.card-main {
    border-radius: 20px;
    border: none;
    box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    overflow: hidden;
    transition: all 0.3s ease;

    /* Gradient biru gelap */
    background: linear-gradient(
        180deg,
        #0f2027,
        #203a43,
        #2c5364
    );
    color: white; /* teks putih agar kontras */
}

.card-main:hover {
    transform: translateY(-4px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
}

/* ===========================
   HEADER SECTION
=========================== */
.header-section {
    padding: 30px;
    text-align: center;

    /* Gradient sedikit berbeda agar header menonjol */
    background: linear-gradient(
        180deg,
        #0f2027
        #203a43,
    );
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    color: white;
}

.header-section h2,
.header-section p {
    margin: 0;
}

/* ===========================
   FORM BODY
=========================== */
.card-main .p-4 {
    background: rgba(255,255,255,0.05); /* semi-transparan agar terlihat gradient */
    backdrop-filter: blur(10px);
    padding: 2rem;
    border-radius: 0 0 20px 20px;
}

/* Label & input */
.card-main label {
    color: #ffffffcc; /* putih transparan */
    font-weight: 600;
}

.card-main input,
.card-main select {
    border-radius: 8px;
    border: 1px solid #ffffff55;
    background: rgba(255,255,255,0.1);
    color: white;
}

.card-main input::placeholder {
    color: #ffffff99;
}

/* Input focus */
input:focus,
select:focus {
    border-color: #38bdf8;
    box-shadow: 0 0 0 0.2rem rgba(56,189,248,0.25);
    background: rgba(255,255,255,0.15);
    color: white;
}

/* ===========================
   BUTTON PROSES
=========================== */
.btn-process {
    background: #caddec; /* biru gelap aksen */
    color: #2a5568;
    padding: 15px;
    font-weight: bold;
    border-radius: 12px;
    border: none;
    width: 100%;
    transition: 0.3s;
}

.btn-process:hover {
    background: #24748d9f;
    transform: translateY(-2px);
}

/* ===========================
   LOADING OVERLAY
=========================== */
#loading-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15,32,39,0.95);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: white;
    text-align: center;
}

.loader {
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #386d86; /* biru gelap */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* ===========================
   RESPONSIVE
=========================== */
@media (max-width: 768px) {
    .card-main .p-4 {
        padding: 1.5rem;
    }

    .btn-process {
        width: 100%;
    }
}


</style>
@endpush

@push('scripts')
<script>
    const form = document.getElementById('main-form');
    const overlay = document.getElementById('loading-overlay');

    form.addEventListener('submit', function () {
        overlay.style.display = 'flex';

        const checkDownload = setInterval(() => {
            if (document.cookie.split(';').some(item => item.trim().startsWith('downloadStarted='))) {
                overlay.style.display = 'none';
                document.cookie = "downloadStarted=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                clearInterval(checkDownload);
            }
        }, 1000);
    });
</script>
@endpush
