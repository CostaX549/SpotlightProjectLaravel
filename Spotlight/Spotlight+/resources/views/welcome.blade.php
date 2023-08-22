@extends('layouts.main')


@section('title', 'Spotlight')

@section('content')

<link rel="stylesheet" href="/css/estilo.css">
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="text-white mb-2 d-inline">Pesquise filmes, séries e documentários</h3>
            <form action="{{ route('pesquisa.index') }}" method="GET" class="d-inline">
            <input type="text" name="termo" class="form-control  border-0 rounded-start" placeholder="Pesquisar..." aria-label="Pesquisar" aria-describedby="button-addon2" style="background-color:rgb(255,255,255);">

            </form>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <div class="user-dropdown">
        <a id="user-dropdown" class="nav-link" href="#">
            @if($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto de Perfil" class="profile-img">
            @else
                <img src="{{ asset('images/default-profile-photo.png') }}" alt="Foto de Perfil Padrão" class="profile-img">
            @endif
        </a>
        <div id="user-dropdown-menu" class="user-dropdown-menu">
            <a class="dropdown-item" href="{{ route('profile.show') }}">Meu Perfil</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

<!-- Exibir resultados da pesquisa -->
@if(!empty($resultados))

<div id="teste"class="container mb-2">
      <div class="row align-items-center">
        <div class="col">
          <p class="h3 text-white mb-0 d-inline">Filmes</p>
        </div>
      
      </div>
    </div>
<div class="container">
    <div class="row">
        @foreach($resultados as $resultado)
            @if(isset($resultado['poster_path']))
                <div class="col-md-3 mb-4">
                    <a href="{{ route('filmes.show', ['id' => $resultado['id']]) }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $resultado['poster_path'] }}" alt="{{ $resultado['title'] ?? $resultado['name'] }}" class="w-100 rounded">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>


    @else 





    <div id="teste"class="container mb-2">
      <div class="row align-items-center">
        <div class="col">
          <p class="h3 text-white mb-0 d-inline">Filmes</p>
        </div>
      
      </div>
    </div>


    <div  class="container mb-4" id="filmes">
      <div id="myCarouselThree" class="carousel slide">
        <div class="carousel-inner" id="carouselInner">
          <!-- Itens do carrossel para as imagens serão preenchidos dinamicamente -->
        </div>
        <a class="carousel-control-prev" href="#myCarouselThree" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarouselThree" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </a>
      </div>
    </div>

    <div id="teste" class="container mb-2">
      <div class="row align-items-center">
        <div class="col">
          <p class="h3 text-white mb-0 d-inline">Séries</p>
        </div>
        
      </div>
    </div>
 
    <div class="container mb-4">
      <div id="myCarouselSeries" class="carousel slide">
        <div class="carousel-inner" id="carouselSeriesInner">
          <!-- Itens do carrossel para as séries serão preenchidos dinamicamente -->
        </div>
        <a class="carousel-control-prev" href="#myCarouselSeries" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarouselSeries" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </a>
      </div>
    </div>


   

    <div id="teste"class="container mb-2">
      <div class="row align-items-center">
        <div class="col">
          <p class="h3 text-white mb-0 d-inline">Documentários</p>
        </div>
      
      </div>
    </div>
 
    <div class="container mb-4">
      <div id="myCarouselDocumentaries" class="carousel slide">
        <div class="carousel-inner" id="carouselDocumentariesInner">
          <!-- Itens do carrossel para os documentários serão preenchidos dinamicamente -->
        </div>
        <a class="carousel-control-prev" href="#myCarouselDocumentaries" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarouselDocumentaries" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </a>
      </div>
    </div>
@endif

@endsection
  

          
          
   
           
    


