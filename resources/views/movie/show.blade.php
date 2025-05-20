@extends('layouts.main')

@section('title', 'Detail Film')

@section('content')
<div class="container mt-4">
    <h1>{{ $movie->title }}</h1>

    <p><strong>Kategori:</strong> {{ $movie->category->category_name ?? '-' }}</p>
    <p><strong>Tahun:</strong> {{ $movie->year }}</p>
    <p><strong>Sinopsis:</strong> {!! nl2br(e($movie->synopsis)) !!}</p>
    <p><strong>Pemeran:</strong> {!! nl2br(e($movie->actors)) !!}</p>

    @if($movie->cover_image)
        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" style="max-width:300px;">
    @endif

    <br><br>
    <a href="{{ route('movie.index') }}" class="btn btn-secondary">Kembali ke Daftar Film</a>
</div>
@endsection
