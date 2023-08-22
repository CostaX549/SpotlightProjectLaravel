@extends('layouts.main')

@section('title', 'Spotlight')

@section('content')

<link rel="stylesheet" href="/css/estilo.css">

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Meus filmes favoritos:</h3>
                <div class="row">
                    @foreach ($favoriteMovies as $index => $favoriteMovie)
                        <div class="col-md-3 mb-4">
                             <a href="{{ route('filmes.show', [ $favoriteMovie['movie_id']]) }}">
                            <img src="https://image.tmdb.org/t/p/original/{{ $favoriteMovie->movie['poster_path'] }}" alt="{{ $favoriteMovie->movie['title'] }}" class="img-fluid rounded">
</a>
                        </div>

                        @if (($index + 1) % 4 === 0)
                            </div><div class="row">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

