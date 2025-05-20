@extends('layouts.template')

@section('content')
    <h1 class="mb-4">Latest Movies</h1>

    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-6 mb-4"> {{-- 2 kolom per baris --}}
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-5">
                            @if($movie->cover_image)
                                <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                            @else
                                <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ Str::words($movie->synopsis, 20, '...') }}</p>
                                <div class="mt-auto text-end">
                                   <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}" class="btn btn-success">Read More</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center mt-4">
            {{ $movies->links() }}
        </div>
    </div>
@endsection
