@extends('layouts.admin')

@section('title','Edit User')

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
                    <i class="fa-solid fa-user-pen me-1"></i>
                    Edit User
                </h4>
                <p class="page-subtitle mb-0">
                    Perbarui data pengguna
                </p>
            </div>

            {{-- EDIT USER CARD --}}
            <div class="card user-card mx-auto">
                <div class="card-body p-4 p-md-5">

                    {{-- VALIDATION ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger-custom">
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
                                     class="rounded-circle shadow avatar-img mb-2">
                            @else
                                <div class="avatar-img avatar-placeholder mx-auto mb-2">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                            @endif

                            <input type="file"
                                   name="avatar"
                                   class="form-control mt-2"
                                   accept="image/png,image/jpeg">
                            <small class="form-text text-muted">
                                JPG / PNG • Maks 2MB
                            </small>
                        </div>

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name',$user->name) }}"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email',$user->email) }}"
                                   required>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user"  {{ $user->role=='user'?'selected':'' }}>User</option>
                                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                            </select>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-4">
                            <label class="form-label">
                                Password
                                <span class="text-muted">(kosongkan jika tidak diubah)</span>
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control">
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}"
                               class="btn btn-back">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-save px-4">
                                Simpan Perubahan
                            </button>
                        </div>

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

/* LABEL */
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

/* AVATAR */
.avatar-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    transition: .3s;
}

.avatar-img:hover {
    transform: scale(1.05);
}

.avatar-placeholder {
    background: linear-gradient(135deg, #ED1C24, #7A1C1F);
    color: #FFF1C1;
    font-size: 36px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

/* ALERT */
.alert-danger-custom {
    background: rgba(237,28,36,.12);
    color: #7A1C1F;
    border-radius: 14px;
    border: none;
}

/* BUTTONS */
.btn-save {
    background: linear-gradient(
        90deg,
        #ED1C24,
        #7A1C1F
    );
    border: none;
    border-radius: 50px;
    color: #FFF1C1;
    font-weight: 700;
    padding: 10px 28px;
    transition: .3s ease;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(237,28,36,.45);
}

.btn-back {
    background: #FFF1C1;
    border-radius: 50px;
    color: #7A1C1F;
    font-weight: 600;
    padding: 10px 26px;
    border: 1px solid rgba(122,28,31,.25);
}

.btn-back:hover {
    background: #FFE8A3;
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
