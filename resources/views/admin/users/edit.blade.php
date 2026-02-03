@extends('layouts.admin')

@section('title','Edit User')

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
                <h4 class="fw-bold mb-1">Edit User</h4>
                <p class="text-muted mb-0">Perbarui data pengguna</p>
            </div>

            {{-- EDIT USER CARD --}}
            <div class="card user-card border-0 shadow-sm rounded-4 mx-auto" style="max-width: 600px;">
                <div class="card-body p-3 p-md-4">

                    {{-- VALIDATION ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('admin.users.update',$user->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- AVATAR --}}
                        <div class="mb-4 text-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/'.$user->avatar) }}"
                                     class="rounded-circle shadow-sm mb-2 avatar-img">
                            @else
                                <div class="rounded-circle bg-danger text-white d-flex
                                            align-items-center justify-content-center mx-auto mb-2 shadow-sm avatar-img">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                            @endif

                            <input type="file"
                                   name="avatar"
                                   class="form-control mt-2"
                                   accept="image/png,image/jpeg">
                            <small class="text-muted">JPG / PNG • Maks 2MB</small>
                        </div>

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name',$user->name) }}"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email',$user->email) }}"
                                   required>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user"  {{ $user->role=='user'?'selected':'' }}>User</option>
                                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                            </select>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Password <span class="text-muted">(kosongkan jika tidak diubah)</span>
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control">
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}"
                               class="btn btn-light">
                                Kembali
                            </a>

                            <button class="btn btn-danger px-4">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
/* ===========================
   EDIT USER CARD
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

.avatar-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    transition: transform 0.3s;
}

.avatar-img:hover {
    transform: scale(1.05);
}

/* ALERTS */
.user-card .alert {
    background-color: rgba(255,255,255,0.15);
    color: #fff;
    border: none;
}

/* BUTTONS */
.user-card .btn-danger {
    background-color: #38bdf8;
    border-color: #38bdf8;
}

.user-card .btn-danger:hover {
    background-color: #1e40af;
    border-color: #1e40af;
    transform: translateY(-2px);
}
</style>
@endpush

@endsection
