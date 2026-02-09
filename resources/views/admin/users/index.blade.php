@extends('layouts.admin')

@section('title','Manajemen User')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1 main-content" style="margin-left:260px;">
        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold page-title mb-1">
                        <i class="fa-solid fa-users me-1"></i>
                        Manajemen User
                    </h4>
                    <p class="page-subtitle mb-0">
                        Kelola akun pengguna sistem
                    </p>
                </div>

                <a href="{{ route('admin.users.create') }}"
                   class="btn btn-add">
                    <i class="fa-solid fa-user-plus me-1"></i>
                    Tambah User
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success-custom">
                    {{ session('success') }}
                </div>
            @endif

            {{-- USER CARDS --}}
            <div class="row g-4">
                @forelse($users as $user)
                    <div class="col-md-4">
                        <div class="card user-card h-100">
                            <div class="card-body d-flex flex-column justify-content-between">

                                <div>
                                    <h5 class="fw-bold mb-1">
                                        {{ $user->name }}
                                    </h5>

                                    <p class="text-muted mb-2">
                                        {{ $user->email }}
                                    </p>

                                    <span class="badge role-badge {{ $user->role=='admin'?'role-admin':'role-user' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>

                                    <p class="small text-muted mt-2">
                                        Dibuat: {{ $user->created_at->format('d M Y') }}
                                    </p>
                                </div>

                                <div class="mt-3 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.users.edit',$user->id) }}"
                                       class="btn btn-sm btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <form action="{{ route('admin.users.destroy',$user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        👤 Belum ada user
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-end">
                {{ $users->links() }}
            </div>

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
    background: linear-gradient(
        to bottom,
        #FFF6D8,
        #692727
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

/* ALERT */
.alert-success-custom {
    background: rgba(237,28,36,.12);
    color: #7A1C1F;
    border-radius: 14px;
    border: none;
}

/* ===========================
   USER CARD
=========================== */
.user-card {
    border: none;
    border-radius: 22px;
    background: #FFFDF4;
    box-shadow: 0 15px 35px rgba(0,0,0,.18);
    transition: .3s ease;
}

.user-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 30px 65px rgba(0,0,0,.25);
}

/* CARD TEXT */
.user-card h5 {
    color: #7A1C1F;
}

.user-card p {
    color: rgba(122,28,31,.75);
}

/* ROLE BADGE */
.role-badge {
    font-size: .75rem;
    padding: .4em .8em;
    border-radius: 50px;
    font-weight: 600;
}

.role-admin {
    background: rgba(237,28,36,.15);
    color: #7A1C1F;
}

.role-user {
    background: rgba(122,28,31,.1);
    color: #7A1C1F;
}

/* ===========================
   BUTTONS
=========================== */
.btn-add {
    background: linear-gradient(90deg,#ED1C24,#7A1C1F);
    color: #FFF1C1;
    border-radius: 50px;
    padding: 10px 22px;
    font-weight: 700;
    border: none;
    transition: .3s;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(237,28,36,.45);
    color: #FFF1C1;
}

.btn-edit {
    border: 1px solid rgba(122,28,31,.3);
    color: #7A1C1F;
    border-radius: 50%;
}

.btn-edit:hover {
    background: #7A1C1F;
    color: #FFF1C1;
}

.btn-delete {
    border: 1px solid rgba(237,28,36,.4);
    color: #ED1C24;
    border-radius: 50%;
}

.btn-delete:hover {
    background: #ED1C24;
    color: #FFF1C1;
}

/* ===========================
   PAGINATION
=========================== */
.pagination .page-link {
    color: #7A1C1F;
    border-radius: 10px;
}

.pagination .page-item.active .page-link {
    background-color: #7A1C1F;
    border-color: #7A1C1F;
}

.pagination .page-link:hover {
    background-color: #ED1C24;
    border-color: #ED1C24;
    color: #FFF1C1;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0 !important;
    }
}
</style>
@endpush
