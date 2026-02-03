@extends('layouts.admin')

@section('title','Edit Berita')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">
        @include('admin.partials.header')

        <div class="p-4">

            <div class="mb-4">
                <h4 class="fw-bold">Edit Berita</h4>
                <p class="text-muted">Perbarui konten berita</p>
            </div>

            <div class="admin-card">

                <form method="POST"
                      action="{{ route('admin.news.update', $news->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Judul Berita</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ $news->title }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Isi Berita</label>
                        <textarea name="content"
                                  rows="6"
                                  class="form-control"
                                  required>{{ $news->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" {{ $news->status=='draft'?'selected':'' }}>Draft</option>
                            <option value="published" {{ $news->status=='published'?'selected':'' }}>Publish</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-save"></i> Update
                        </button>

                        <a href="{{ route('admin.news.index') }}"
                           class="btn btn-secondary">
                           Kembali
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
