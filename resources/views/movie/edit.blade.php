@extends('layouts.main')

@section('title', 'Edit Film')

@section('content')
    <div class="container mt-4">
        <h1>Edit Film: {{ $movie->title }}</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $movie->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $movie->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tahun -->
            <div class="mb-3">
                <label for="year" class="form-label">Tahun</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                    value="{{ old('year', $movie->year) }}" required min="1900" max="{{ date('Y') }}">
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pemeran -->
            <div class="mb-3">
                <label for="actors" class="form-label">Pemeran</label>
                <textarea class="form-control @error('actors') is-invalid @enderror" id="actors" name="actors" rows="3">{{ old('actors', $movie->actors) }}</textarea>
                @error('actors')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Sinopsis -->
            <div class="mb-3">
                <label for="synopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis" rows="4">{{ old('synopsis', $movie->synopsis) }}</textarea>
                @error('synopsis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cover Image -->
            <div class="mb-3">
                <label for="cover_image" class="form-label">Gambar Cover</label>
                @if ($movie->cover_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" width="150">
                    </div>
                @endif
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                    name="cover_image" accept="image/*">
                @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Update -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Film</button>
                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Batal</a>
            </div>
