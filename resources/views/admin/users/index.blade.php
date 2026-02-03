@extends('layouts.admin')

@section('title','Manajemen User')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">
        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold">Manajemen User</h4>
                    <p class="text-muted mb-0">Kelola akun pengguna sistem</p>
                </div>

                <a href="{{ route('admin.users.create') }}" class="btn btn-info">
                    <i class="fa-solid fa-user-plus me-1"></i> Tambah User
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- USER CARDS --}}
            <div class="row g-4">
                @forelse($users as $user)
                    <div class="col-md-4">
                        <div class="card user-card border-0 shadow-lg rounded-4 h-100">
                            <div class="card-body d-flex flex-column justify-content-between">

                                <div>
                                    <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                                    <p class="text-muted mb-2">{{ $user->email }}</p>

                                    <span class="badge {{ $user->role=='admin'?'bg-danger':'bg-secondary' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>

                                    <p class="text-muted mt-2 small">Dibuat: {{ $user->created_at->format('d M Y') }}</p>
                                </div>

                                <div class="mt-3 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.users.edit',$user->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <form action="{{ route('admin.users.destroy',$user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        Belum ada user
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* ===========================
   HALAMAN & BACKGROUND
=========================== */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(to bottom, #ffffff, #203a43); /* navy top -> white bottom */
    padding-bottom: 50px;
    transition: all 0.3s ease;
}

/* ===========================
   USER CARD
=========================== */
.user-card {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    transition: all .35s ease;
}

.user-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

/* CARD TEXT */
.user-card h5 {
    color: #0f2027;
}

.user-card p {
    color: #203a43;
}

/* BADGE ROLE */
.user-card .badge {
    font-size: 0.8rem;
    padding: 0.35em 0.7em;
}

/* ACTION BUTTONS */
.user-card .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.8rem;
}

/* BTN INFO */
.btn-info {
    background: #203a43; /* navy sesuai sidebar */
    color: #fff;
}
.btn-info:hover {
    background: #0f2027;
    color: #fff;
}

/* PAGINATION */
.pagination .page-link {
    color: #203a43;
}
.pagination .page-item.active .page-link {
    background-color: #203a43;
    border-color: #203a43;
}
.pagination .page-link:hover {
    background-color: #0f2027;
    border-color: #0f2027;
}
.pagination .page-link:focus {
    box-shadow: 0 0 0 .25rem rgba(32,58,67,.25);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flex-grow-1 {
        margin-left: 0 !important;
    }
}
</style>
@endpush
