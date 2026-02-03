@extends('layouts.admin')

@section('title','Manajemen Berita')

@section('content')
<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">

        {{-- HEADER --}}
        @include('admin.partials.header')

        <div class="p-4">

            {{-- PAGE TITLE --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Manajemen Berita</h4>
                    <p class="text-muted mb-0">Kelola berita yang ditampilkan ke publik</p>
                </div>

                <a href="{{ route('admin.news.create') }}" class="btn btn-danger">
                    <i class="fa-solid fa-plus"></i> Tambah Berita
                </a>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- TABLE --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Penulis</th>
                                    <th>Tanggal</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
@forelse($news as $item)
    <tr>
        <td>
            <strong>{{ $item->title }}</strong><br>
            <small class="text-muted">{{ $item->slug }}</small>
        </td>

        <td>
            @if($item->status === 'published')
                <span class="badge bg-success">Publish</span>
            @else
                <span class="badge bg-secondary">Draft</span>
            @endif
        </td>

        <td>{{ $item->author->name ?? '-' }}</td>

        <td>{{ $item->created_at->format('d M Y') }}</td>

        <td class="text-end">
            {{-- EDIT --}}
            <a href="{{ route('admin.news.edit', $item->id) }}"
               class="btn btn-sm btn-outline-primary">
                <i class="fa-solid fa-pen"></i>
            </a>

            {{-- DELETE --}}
            <form action="{{ route('admin.news.destroy', $item->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Yakin hapus berita ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center text-muted">
            Belum ada berita
        </td>
    </tr>
@endforelse
</tbody>

                        </table>
                    </div>

                </div>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $news->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
