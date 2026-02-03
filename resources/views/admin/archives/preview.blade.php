@extends('admin.layouts.app')

@section('title', 'Preview Dokumen')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Preview Dokumen</h5>

            <a href="{{ route('admin.archives.index') }}" 
               class="btn btn-sm btn-secondary">
                ⬅ Kembali
            </a>
        </div>

        <div class="card-body p-0" style="height: 85vh;">
            <iframe
                src="{{ asset('storage/' . $archive->file_path) }}"
                width="100%"
                height="100%"
                style="border:none;"
            ></iframe>
        </div>
    </div>
</div>
@endsection
