@extends('layouts.app')

@section('content')

<style>
/* PAGE WRAPPER */
.locker-wrapper {
    min-height: calc(100vh - 120px);
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* GLOW */
.locker-glow {
    position: absolute;
    width: 480px;
    height: 480px;
    background: radial-gradient(circle, rgba(0,198,255,.35), transparent 70%);
    top: -150px;
    right: -150px;
    filter: blur(80px);
}

/* CARD */
.locker-card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-radius: 22px;
    box-shadow: 0 30px 70px rgba(0,0,0,.45);
    color: #fff;
    overflow: hidden;
    animation: fadeUp 1s ease forwards;
}

/* HEADER */
.locker-header {
    text-align: center;
    padding: 2.5rem;
    border-bottom: 1px solid rgba(255,255,255,.15);
}

.locker-header i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #38bdf8;
}

/* FORM */
.form-label {
    color: rgba(255,255,255,.85);
}

.form-control,
.form-select,
.form-control-color {
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.25);
    color: #fff;
}

.form-control::placeholder {
    color: rgba(255,255,255,.6);
}

.form-control:focus,
.form-select:focus {
    background: rgba(255,255,255,.2);
    color: #fff;
}

/* BUTTON */
.btn-lock {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    padding: 15px;
    font-weight: 700;
    border-radius: 50px;
    transition: .3s;
}

.btn-lock:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(0,114,255,.5);
}

/* LOADING */
#loading-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15,32,39,.95);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #fff;
}

.loader {
    width: 56px;
    height: 56px;
    border: 4px solid rgba(255,255,255,.2);
    border-top: 4px solid #38bdf8;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

{{-- LOADING --}}
<div id="loading-overlay">
    <div class="loader mb-3"></div>
    <h4 class="fw-bold">Mengunci Dokumen</h4>
    <p class="text-white-50 text-center">
        Jangan tutup halaman sampai proses selesai
    </p>
</div>

<div class="locker-wrapper py-5">
    <div class="locker-glow"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="locker-card">

                    {{-- HEADER --}}
                    <div class="locker-header">
                        <i class="fa-solid fa-file-shield"></i>
                        <h2 class="fw-bold">PDF Security Locker</h2>
                        <p class="text-white-50 mb-0">
                            Bawaslu Kabupaten Sumenep
                        </p>
                    </div>

                    {{-- BODY --}}
                    <div class="p-4 p-md-5">

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form id="main-form"
                              method="POST"
                              action="{{ route('user.watermark.process') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Teks URL (Kiri)
                                    </label>
                                    <input type="text" name="text_left"
                                           class="form-control"
                                           placeholder="https://jdih.bawaslu.go.id">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Teks Instansi (Kanan)
                                    </label>
                                    <input type="text" name="text_right"
                                           class="form-control"
                                           placeholder="Bawaslu Kabupaten Sumenep">
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Warna Watermark
                                    </label>
                                    <input type="color"
                                           name="wm_color"
                                           class="form-control form-control-color w-100"
                                           value="#38bdf8">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Kualitas (DPI)
                                    </label>
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
                                <label class="form-label fw-semibold">
                                    Upload Dokumen PDF
                                </label>
                                <input type="file"
                                       name="document"
                                       class="form-control form-control-lg"
                                       accept="application/pdf"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-lock w-100">
                                <i class="fa-solid fa-lock me-2"></i>
                                PROSES & KUNCI PERMANEN
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('main-form');
    const overlay = document.getElementById('loading-overlay');
    
    form.addEventListener('submit', function() {
        overlay.style.display = 'flex';
        // Interval untuk mengecek cookie agar loading berhenti saat file terunduh
        const checkDownload = setInterval(function() {
            if (document.cookie.split(';').some((item) => item.trim().startsWith('downloadStarted='))) {
                overlay.style.display = 'none';
                document.cookie = "downloadStarted=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                clearInterval(checkDownload);
            }
        }, 1000);
    });
</script>

@endsection
