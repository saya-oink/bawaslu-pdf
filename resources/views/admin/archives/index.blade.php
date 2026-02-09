@extends('layouts.admin')

@section('title','Manajemen Arsip')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1 main-content" style="margin-left:260px;">

        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold page-title mb-1">
                    <i class="fa-solid fa-archive me-1"></i>
                    Manajemen Arsip
                </h4>
                <p class="page-subtitle mb-0">
                    Daftar dokumen arsip yang telah dikunci
                </p>
            </div>

            {{-- ARCHIVE CARDS --}}
            <div class="row g-4">
                @forelse ($archives as $doc)
                    <div class="col-md-6 col-lg-4">
                        <div class="archive-card h-100">

                            {{-- HEADER --}}
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge badge-pdf rounded-pill px-3 py-1">
                                    PDF
                                </span>
                                <span class="archive-date">
                                    {{ $doc->locked_at->format('d M Y • H:i') }}
                                </span>
                            </div>

                            {{-- TITLE --}}
                            <h6 class="fw-bold archive-title mb-1">
                                {{ $doc->original_name }}
                            </h6>

                            {{-- DESC --}}
                            <p class="archive-desc mb-3">
                                {{ $doc->text_left ?? '—' }}
                            </p>

                            {{-- ACTION --}}
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.archives.download', $doc->id) }}"
                                   class="btn btn-download flex-grow-1">
                                    <i class="fa-solid fa-download me-1"></i>
                                    Download
                                </a>

                                <form action="{{ route('admin.archives.destroy', $doc->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus arsip ini? File akan terhapus permanen.')"
                                      class="flex-grow-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-delete w-100">
                                        <i class="fa-solid fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 empty-state">
                        📭 Belum ada dokumen yang diarsipkan
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-end">
                {{ $archives->links() }}
            </div>

        </div>
    </div>
</div>

{{-- ================= STYLES ================= --}}
<style>
/* PAGE BACKGROUND */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(
        to bottom,
        #FFF6D8,
        #550f0f
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

/* ARCHIVE CARD */
.archive-card {
    background: rgba(255,253,244,.95);
    backdrop-filter: blur(12px);
    border-radius: 22px;
    padding: 1.4rem;
    box-shadow: 0 15px 35px rgba(0,0,0,.15);
    transition: all .3s ease;
}

.archive-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 25px 55px rgba(0,0,0,.25);
}

/* BADGE */
.badge-pdf {
    background: rgba(237,28,36,.15);
    color: #ED1C24;
    font-weight: 700;
    font-size: .75rem;
}

/* DATE */
.archive-date {
    font-size: .75rem;
    color: rgba(122,28,31,.6);
}

/* TEXT */
.archive-title {
    font-size: 1rem;
    color: #7A1C1F;
    word-break: break-word;
}

.archive-desc {
    font-size: .85rem;
    color: rgba(122,28,31,.75);
    word-break: break-word;
}

/* BUTTONS */
.btn-download {
    border-radius: 50px;
    border: 1px solid rgba(237,28,36,.5);
    background: transparent;
    color: #7A1C1F;
    font-weight: 600;
    transition: .3s ease;
}

.btn-download:hover {
    background: #ED1C24;
    color: #FFF1C1;
    border-color: #ED1C24;
}

.btn-delete {
    border-radius: 50px;
    border: 1px solid rgba(122,28,31,.4);
    background: transparent;
    color: #7A1C1F;
    font-weight: 600;
    transition: .3s ease;
}

.btn-delete:hover {
    background: #7A1C1F;
    color: #FFF1C1;
    border-color: #7A1C1F;
}

/* EMPTY STATE */
.empty-state {
    color: rgba(122,28,31,.6);
    font-weight: 500;
}

/* PAGINATION */
.pagination .page-link {
    border-radius: 10px;
    color: #7A1C1F;
    border: 1px solid rgba(122,28,31,.3);
}

.pagination .page-link:hover {
    background: #ED1C24;
    color: #FFF1C1;
    border-color: #ED1C24;
}

.pagination .page-item.active .page-link {
    background: #7A1C1F;
    border-color: #7A1C1F;
    color: #FFF1C1;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0 !important;
    }
}
</style>
@endsection
