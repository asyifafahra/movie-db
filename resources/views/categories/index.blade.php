@extends('layouts.main')

@section('title', 'Categories')

@section('content')
  <h1>Categories</h1>
  <a href="{{ url('/categories/create') }}" class="btn btn-primary mb-3">Tambah Category</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->category_name }}</td>
        <td>{{ $category->description }}</td>
        <td>
          <a href="{{ url('/categories/' . $category->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ url('/categories/' . $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
