@extends('layouts.main')

@section('title', $filme['title'])

@section('content')
<link rel="stylesheet" href="/css/show.css">
<div class="container-fluid p-0">

    <div class="position-relative">
        <img src="https://image.tmdb.org/t/p/original/{{ $filme['backdrop_path'] }}" alt="{{ $filme['title'] }}" class="img-fluid rounded main-image">
        <div class="image-overlay"></div> <!-- Elemento de sobreposição para o gradiente de opacidade -->
    
    </div>
</div>

<div class="container mt-5">
    
    <div class="row">
        <div class="col-md-8">
            
            <h1 class="mb-4">{{ $filme['title'] }}</h1>
            <p class="lead">{{ $filme['overview'] }}</p>
            <p class="font-weight-bold">
                @if(isset($filme['vote_average']))
                    Avaliação: {{ $filme['vote_average'] }}
                @else
                    Avaliação indisponível
                @endif
            </p>
        </div>
    </div>
    
    <!-- Adicione o iframe do trailer aqui -->
    <div class="row mt-5">
    <!-- Resto do seu código HTML -->

    <div class="col-md-12">
        <div class="row">
    <h2 class="mb-3">Trailer</h2>
    @php
        $apiKey = '9549bb8a29df2d575e3372639b821bdc';
        $movieId = $filme['id'];
        
        $client = new \GuzzleHttp\Client();
        $response = $client->get("https://api.themoviedb.org/3/movie/{$movieId}/videos?api_key={$apiKey}");
        $videoData = json_decode($response->getBody(), true);

        // Procurar por trailers
        $trailers = array_filter($videoData['results'], function($video) {
            return $video['type'] === 'Trailer';
        });

        if(!empty($trailers)) {
            // Se houver trailers, pegue o primeiro trailer encontrado
            $firstTrailer = reset($trailers);
            $trailerKey = $firstTrailer['key'];
            $youtubeEmbedUrl = "https://www.youtube.com/embed/{$trailerKey}";
            echo '
         
                <iframe width="450" height="700"  src="' . $youtubeEmbedUrl . '" allowfullscreen></iframe>
            ';
        } else {
            echo '<p>Nenhum trailer disponível.</p>';
        }
    @endphp
</div>
    </div>

<div class="col-md-12 mt-4">
    @if(auth()->check())
        @php
        $isFavorite = auth()->user()->favoriteMovies->contains('movie_id', $filme['id']);
        @endphp
        @if($isFavorite)
            <form action="{{ route('favorite.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $filme['id'] }}">
                <button type="submit" class="btn btn-danger">Remover dos Favoritos</button>
            </form>
        @else
            <form action="{{ route('favorite.add') }}" method="POST">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $filme['id'] }}">
                <button type="submit" class="btn btn-primary">Adicionar aos Favoritos</button>
            </form>
        @endif
    @endif
</div>

    <!-- Botão para favoritar ou desfavoritar -->
  

<!-- Resto do seu código HTML -->

    </div>
</div>
@endsection










