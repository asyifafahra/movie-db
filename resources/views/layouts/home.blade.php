@extends('layouts.template')
{{-- @section('title', 'Data Home')
@section('navhome', 'active') --}}

@section('content')
    <h1 class="mb-4">Latest Movies</h1>

    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($movie->cover_image)
                                <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                            @else
                                <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="...">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ Str::words($movie->synopsis, 20, '...') }}</p>
                                <a href="#" class="btn btn-success">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $movies->links() }}
    </div>
@endsection
