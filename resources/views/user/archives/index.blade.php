@extends('layouts.app')

@section('title','Arsip Dokumen | Bawaslu Kabupaten Sumenep')

@section('content')

<style>
/* ================= PAGE ================= */
.archive-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    padding: 60px 0;
    color: #fff;
}

/* ================= GLASS CARD ================= */
.archive-card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 20px;
    padding: 24px;
    height: 100%;
    box-shadow: 0 20px 50px rgba(0,0,0,.45);
    transition: all .3s ease;
    position: relative;
}

.archive-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 30px 70px rgba(0,0,0,.6);
}

/* ================= ICON & BADGE ================= */
.archive-icon {
    font-size: 2.2rem;
    color: #38bdf8;
    opacity: .9;
}

.badge-pdf {
    background: rgba(56,189,248,.15);
    color: #38bdf8;
    font-weight: 600;
}

/* ================= TEXT SAFETY ================= */
.text-safe-title {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    word-break: break-word;
    overflow-wrap: anywhere;
}

.text-safe-desc {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    word-break: break-word;
    overflow-wrap: anywhere;
}

.text-muted-light {
    color: rgba(255,255,255,.55);
}

/* ================= BUTTON ================= */
.btn-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.3);
    background: transparent;
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all .2s ease;
}

.btn-icon:hover {
    background: #38bdf8;
    border-color: #38bdf8;
    color: #fff;
}

.btn-icon-danger:hover {
    background: #f87171;
    border-color: #f87171;
}

/* ================= PAGINATION ================= */
.pagination .page-link {
    background: transparent;
    border: 1px solid rgba(255,255,255,.25);
    color: #fff;
}

.pagination .page-link:hover {
    background: #38bdf8;
    border-color: #38bdf8;
    color: #fff;
}
</style>

<div class="archive-wrapper">
    <div class="container">

        {{-- TITLE --}}
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Arsip Dokumen</h3>
            <p class="text-muted-light mb-0">
                Dokumen resmi Bawaslu yang telah dikunci & diverifikasi
            </p>
        </div>

        {{-- CARD GRID --}}
        <div class="row g-4">
            @forelse ($archives as $doc)
                <div class="col-lg-4 col-md-6">
                    <div class="archive-card">

                        {{-- HEADER --}}
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <i class="fa-solid fa-file-shield archive-icon"></i>

                            <span class="badge badge-pdf rounded-pill px-3 py-1">
                                PDF
                            </span>
                        </div>

                        {{-- TITLE --}}
                        <h6 class="fw-semibold mb-2 text-safe-title"
                            data-bs-toggle="tooltip"
                            title="{{ $doc->original_name }}">
                            {{ $doc->original_name }}
                        </h6>

                        {{-- DESCRIPTION --}}
                        <p class="small text-muted-light mb-3 text-safe-desc"
                           data-bs-toggle="tooltip"
                           title="{{ $doc->text_left }}">
                            {{ $doc->text_left ?? 'Tidak ada catatan' }}
                        </p>

                        {{-- FOOTER --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-info fw-semibold">
                                <i class="fa-regular fa-clock me-1"></i>
                                {{ $doc->locked_at->format('d M Y • H:i') }}
                            </span>

                            <div class="d-flex gap-2">

                                {{-- DOWNLOAD --}}
                                <a href="{{ route('user.archives.download', $doc->id) }}"
                                   class="btn-icon"
                                   title="Download">
                                    <i class="fa-solid fa-download"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('user.archives.destroy', $doc->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus arsip ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-icon btn-icon-danger"
                                            title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted-light py-5">
                    📭 Belum ada dokumen arsip
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($archives->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $archives->links() }}
            </div>
        @endif

    </div>
</div>

{{-- TOOLTIP INIT --}}
<script>
document.querySelectorAll('[data-bs-toggle="tooltip"]')
    .forEach(el => new bootstrap.Tooltip(el))
</script>

@endsection
