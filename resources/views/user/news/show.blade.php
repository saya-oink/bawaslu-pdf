@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container py-5">
    <h2 class="fw-bold">{{ $news->title }}</h2>
    <p class="text-muted mb-4">{{ $news->created_at->format('d M Y') }}</p>
    <div>{!! nl2br(e($news->content)) !!}</div>
    <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
</div>
@endsection
