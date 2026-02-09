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
        <h4 class="fw-bold admin-title mb-1">
            <i class="fa-solid fa-file-shield me-1"></i>
            PDF Locker
        </h4>
        <p class="text-muted mb-0">
            Mengunci dokumen PDF dengan watermark permanen
        </p>
    </div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-main">

                {{-- HEADER --}}
                <div class="header-section">
                    <i class="fas fa-file-shield fa-3x mb-3"></i>
                    <h2 class="fw-bold mb-1">PDF Security Locker</h2>
                    <p class="opacity-75 mb-0">
                        Bawaslu Kabupaten Sumenep
                    </p>
                </div>

                {{-- BODY --}}
                <div class="card-body form-section">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="main-form"
                          method="POST"
                          action="{{ route('admin.watermark.process') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Teks URL (Kiri)</label>
                                <input type="text"
                                       name="text_left"
                                       class="form-control"
                                       placeholder="https://jdih.bawaslu.go.id">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Teks Instansi (Kanan)</label>
                                <input type="text"
                                       name="text_right"
                                       class="form-control"
                                       placeholder="Bawaslu Kabupaten Sumenep">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Warna Watermark</label>
                                <input type="color"
                                       name="wm_color"
                                       class="form-control form-control-color w-100"
                                       value="#ED1C24">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kualitas (DPI)</label>
                                <select name="quality" class="form-select">
                                    <option value="300" selected>
                                        Tinggi (Sangat Bersih)
                                    </option>
                                    <option value="150">
                                        Standar (Cepat)
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Upload Dokumen PDF</label>
                            <input type="file"
                                   name="document"
                                   class="form-control form-control-lg"
                                   accept="application/pdf"
                                   required>
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
    <h4 class="fw-bold">Sedang Mengunci Dokumen…</h4>
    <p class="opacity-75">
        Jangan tutup halaman sampai file terunduh otomatis.
    </p>
</div>

</div>
</div>
@endsection

{{-- ================= STYLES ================= --}}
@push('styles')
<style>
/* PAGE BACKGROUND */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(to bottom, #FFF6D8, #FFF1C1);
    padding-bottom: 60px;
}

/* TITLE */
.admin-title {
    color: #7A1C1F;
}
.admin-title i {
    color: #ED1C24;
}

/* MAIN CARD */
.card-main {
    border: none;
    border-radius: 22px;
    overflow: hidden;
    background: #FFFDF4;
    box-shadow: 0 20px 50px rgba(0,0,0,.2);
    transition: .3s ease;
}

.card-main:hover {
    transform: translateY(-4px);
    box-shadow: 0 30px 70px rgba(0,0,0,.25);
}

/* HEADER */
.header-section {
    background: linear-gradient(
        135deg,
        #ED1C24,
        #7A1C1F
    );
    text-align: center;
    padding: 40px 30px;
    color: #FFF1C1;
}

/* FORM SECTION */
.form-section {
    padding: 2.5rem;
}

/* LABEL */
.form-section label {
    font-weight: 600;
    color: #7A1C1F;
}

/* INPUT */
.form-section input,
.form-section select {
    border-radius: 10px;
    border: 1px solid rgba(122,28,31,.25);
    background: #FFFDF4;
}

.form-section input:focus,
.form-section select:focus {
    border-color: #ED1C24;
    box-shadow: 0 0 0 .2rem rgba(237,28,36,.25);
}

/* BUTTON */
.btn-process {
    width: 100%;
    padding: 15px;
    border-radius: 50px;
    border: none;
    background: linear-gradient(90deg, #ED1C24, #7A1C1F);
    color: #FFF1C1;
    font-weight: 700;
    letter-spacing: .5px;
    transition: .3s ease;
}

.btn-process:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(237,28,36,.45);
}

/* LOADING OVERLAY */
#loading-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(122,28,31,.95);
    z-index: 9999;
    color: #FFF1C1;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}

.loader {
    width: 55px;
    height: 55px;
    border: 5px solid rgba(255,241,193,.4);
    border-top: 5px solid #FFF1C1;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flex-grow-1 {
        margin-left: 0 !important;
    }
    .form-section {
        padding: 1.8rem;
    }
}
</style>
@endpush

{{-- ================= SCRIPTS ================= --}}
@push('scripts')
<script>
const form = document.getElementById('main-form');
const overlay = document.getElementById('loading-overlay');

form.addEventListener('submit', function () {
    overlay.style.display = 'flex';

    const checkDownload = setInterval(() => {
        if (document.cookie.split(';')
            .some(item => item.trim().startsWith('downloadStarted='))) {

            overlay.style.display = 'none';
            document.cookie = "downloadStarted=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
            clearInterval(checkDownload);
        }
    }, 1000);
});
</script>
@endpush
