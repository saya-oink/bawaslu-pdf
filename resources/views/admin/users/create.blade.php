@extends('layouts.admin')

@section('title','Tambah User')

@section('content')

<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    <div class="flex-grow-1 main-content" style="margin-left:260px;">

        {{-- HEADER --}}
        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold page-title mb-1">
                    <i class="fa-solid fa-user-plus me-1"></i>
                    Tambah User
                </h4>
                <p class="page-subtitle mb-0">
                    Tambahkan user baru ke sistem
                </p>
            </div>

            {{-- ADD USER CARD --}}
            <div class="card user-card mx-auto">
                <div class="card-body p-4 p-md-5">

                    <h5 class="fw-bold mb-4 text-center">
                        Form Tambah User
                    </h5>

                    <form method="POST"
                          action="{{ route('admin.users.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>

                        {{-- AVATAR --}}
                        <div class="mb-4">
                            <label class="form-label">Avatar</label>
                            <input type="file"
                                   name="avatar"
                                   class="form-control"
                                   accept="image/png,image/jpeg">
                            <small class="form-text text-muted">
                                JPG / PNG • Maksimal 2MB
                            </small>
                        </div>

                        <button type="submit" class="btn btn-save w-100">
                            <i class="fa-solid fa-save me-1"></i>
                            Simpan User
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- ================= STYLES ================= --}}
@push('styles')
<style>
/* PAGE BACKGROUND */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(
        to bottom,
        #FFF6D8,
        #FFF1C1
    );
    padding-bottom: 60px;
}

/* TITLE */
.page-title {
    color: #7A1C1F;
}
.page-title i {
    color: #ED1C24;
}
.page-subtitle {
    color: rgba(122,28,31,.7);
}

/* USER CARD */
.user-card {
    max-width: 600px;
    border: none;
    border-radius: 22px;
    background: #FFFDF4;
    box-shadow: 0 20px 45px rgba(0,0,0,.2);
    transition: .3s ease;
}

.user-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 30px 70px rgba(0,0,0,.25);
}

/* FORM LABEL */
.user-card label {
    font-weight: 600;
    color: #7A1C1F;
}

/* INPUT */
.user-card input,
.user-card select {
    border-radius: 10px;
    border: 1px solid rgba(122,28,31,.25);
    background: #FFFDF4;
}

.user-card input:focus,
.user-card select:focus {
    border-color: #ED1C24;
    box-shadow: 0 0 0 .2rem rgba(237,28,36,.25);
}

/* BUTTON */
.btn-save {
    background: linear-gradient(
        90deg,
        #ED1C24,
        #7A1C1F
    );
    border: none;
    border-radius: 50px;
    padding: 14px;
    font-weight: 700;
    color: #FFF1C1;
    letter-spacing: .5px;
    transition: .3s ease;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(237,28,36,.45);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0 !important;
    }
}
</style>
@endpush

@endsection
