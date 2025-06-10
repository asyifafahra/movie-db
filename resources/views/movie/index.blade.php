@extends('layouts.main')

@section('title', 'Daftar Film')

@section('content')
    <div class="container mt-4">
        <h1>Data Movie</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Input New Movie</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th> {{-- Tambahkan kolom No --}}
                    <th>Title</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->category->category_name ?? '-' }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>
                            <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}"
                                class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>



                            @can('delete', $movie)
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Yakin hapus film ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            @endcan

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada film ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
