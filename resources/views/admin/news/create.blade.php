@extends('layouts.admin')

@section('title','Tambah Berita')

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
                <h4 class="fw-bold mb-1">Tambah Berita</h4>
                <p class="text-muted mb-0">Tambahkan berita baru ke sistem</p>
            </div>

            <div class="admin-card">

                <h5 class="mb-4">Form Berita</h5>

                <form method="POST"
                      action="{{ route('admin.news.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- JUDUL --}}
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               required>
                    </div>

                    {{-- EXCERPT --}}
                    <div class="mb-3">
                        <label class="form-label">Ringkasan</label>
                        <textarea name="excerpt"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Ringkasan singkat berita"></textarea>
                    </div>

                    {{-- ISI --}}
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="content"
                                  class="form-control"
                                  rows="8"
                                  required></textarea>
                    </div>

                    {{-- THUMBNAIL --}}
                    <div class="mb-3">
                        <label class="form-label">Thumbnail</label>
                        <input type="file"
                               name="thumbnail"
                               class="form-control"
                               accept="image/*">
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="published">Publish</option>
                        </select>
                    </div>

                    {{-- TANGGAL TERBIT --}}
                    <div class="mb-4">
                        <label class="form-label">Tanggal Publish</label>
                        <input type="datetime-local"
                               name="published_at"
                               class="form-control">
                    </div>

                    <button class="btn btn-danger px-4">
                        <i class="fa-solid fa-paper-plane me-2"></i>
                        Simpan Berita
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection
