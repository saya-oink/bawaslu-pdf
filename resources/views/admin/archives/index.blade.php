@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1 main-content" style="margin-left:260px;">

        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-1 text-dark">Manajemen Arsip</h4>
                <p class="text-muted mb-0">Daftar dokumen arsip yang telah dikunci</p>
            </div>

            {{-- ARCHIVES CARDS --}}
            <div class="row g-3">
                @forelse ($archives as $doc)
                    <div class="col-md-6 col-lg-4">
                        <div class="archive-card p-3 shadow-sm rounded-4 h-100">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1">PDF</span>
                                <span class="text-muted small">{{ $doc->locked_at->format('d M Y • H:i') }}</span>
                            </div>

                            <h6 class="fw-bold mb-1">{{ $doc->original_name }}</h6>
                            <p class="text-muted small mb-3">{{ $doc->text_left ?? '—' }}</p>

                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.archives.download', $doc->id) }}"
                                   class="btn btn-sm btn-outline-primary flex-grow-1">
                                    <i class="fa-solid fa-download me-1"></i> Download
                                </a>

                                <form action="{{ route('admin.archives.destroy', $doc->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus arsip ini? File akan terhapus permanen.')"
                                      class="flex-grow-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                        <i class="fa-solid fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        📭 Belum ada dokumen yang diarsipkan
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 d-flex justify-content-end">
                {{ $archives->links() }}
            </div>

        </div>
    </div>
</div>

{{-- CSS Khusus --}}
<style>
/* ===========================
   HALAMAN & BACKGROUND
=========================== */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(to bottom, #ffffff, #203a43); /* navy top → white bottom */
    padding-bottom: 50px;
}

/* ===========================
   ARCHIVE CARD
=========================== */
.archive-card {
    background: rgba(255,255,255,0.85); /* transparan mirip glass */
    backdrop-filter: blur(12px);
    transition: all 0.3s ease;
    border-radius: 1.5rem;
    box-shadow: 0 8px 16px rgba(0,0,0,0.08);
    color: #0f2027;
}

.archive-card:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 15px 25px rgba(0,0,0,0.2);
}

/* Card text */
.archive-card h6 {
    font-size: 1rem;
    word-break: break-word;
    color: #0f2027;
}

.archive-card p {
    font-size: 0.85rem;
    color: #203a43;
}

/* Badge */
.archive-card .badge {
    font-size: 0.75rem;
    font-weight: 600;
}

/* Buttons modern */
.btn-outline-primary, .btn-outline-danger {
    transition: all 0.2s ease;
}

.btn-outline-primary:hover {
    background-color: #38bdf8;
    color: #fff;
    border-color: #38bdf8;
}

.btn-outline-danger:hover {
    background-color: #f87171;
    color: #fff;
    border-color: #f87171;
}

/* Pagination modern */
.pagination .page-link {
    border-radius: 8px;
    transition: all 0.2s;
}

.pagination .page-link:hover {
    background-color: #38bdf8;
    color: #fff;
    border-color: #38bdf8;
}

.pagination .page-item.active .page-link {
    background-color: #203a43;
    border-color: #203a43;
}

/* Responsive */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0 !important;
    }
}
</style>

@endsection
