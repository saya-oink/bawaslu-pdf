@extends('layouts.admin')

@section('title','Tambah User')

@section('content')

<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">

        {{-- HEADER --}}
        @include('admin.partials.header')

        <div class="p-4">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-1">Tambah User</h4>
                <p class="text-muted mb-0">Tambahkan user baru ke sistem</p>
            </div>

            {{-- ADD USER CARD --}}
            <div class="card user-card border-0 shadow-sm rounded-4 mx-auto" style="max-width: 600px;">
                <div class="card-body p-3 p-md-4">

                    <h5 class="mb-4 text-white">Tambah User</h5>

                    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>

                        {{-- AVATAR --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Avatar</label>
                            <input type="file" name="avatar" class="form-control" accept="image/png,image/jpeg">
                            <small class="text-muted">JPG / PNG • Maks 2MB</small>
                        </div>

                        <button class="btn btn-danger px-4">Simpan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
/* ===========================
   ADD USER CARD
=========================== */
.user-card {
    background: linear-gradient(180deg, #0f2027, #203a43);
    color: #ffffff;
    border-radius: 1rem;
    border: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    transition: all 0.35s ease;
}

.user-card:hover {
    transform: translateY(-3px) scale(1.01);
    box-shadow: 0 20px 40px rgba(0,0,0,0.35);
}

.user-card input,
.user-card select {
    background-color: rgba(255,255,255,0.1);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.3);
    transition: all 0.3s ease;
}

.user-card input:focus,
.user-card select:focus {
    border-color: #38bdf8;
    box-shadow: 0 0 0 0.2rem rgba(56,189,248,0.25);
    background-color: rgba(255,255,255,0.15);
    color: #fff;
}

.user-card label {
    color: #cfd8dc;
}

.user-card .form-control::placeholder {
    color: rgba(255,255,255,0.6);
}

/* BUTTONS */
.user-card .btn-danger {
    background-color: #38bdf8;
    border-color: #38bdf8;
    color: #fff;
}

.user-card .btn-danger:hover {
    background-color: #1e40af;
    border-color: #1e40af;
    transform: translateY(-2px);
}
</style>
@endpush

@endsection
