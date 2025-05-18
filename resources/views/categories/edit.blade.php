@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')
<h1>Edit Category</h1>

<form action="{{ url('/categories/' . $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" name="category_name" id="category_name"
               class="form-control @error('category_name') is-invalid @enderror"
               value="{{ old('category_name', $category->category_name) }}" required>
        @error('category_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $category->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ url('/categories') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
