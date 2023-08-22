<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http; // Importe a classe Http

use Illuminate\Support\Facades\Auth;

class FavoriteMovieController extends Controller
{
    public function addToFavorites(Request $request)
{
    $user = Auth::user();
    $movieId = $request->input('movie_id');
    $favoriteMovies = $user->favoriteMovies()->get();
    
    // Verificar se o filme já foi adicionado aos favoritos desse usuário
    if (!$user->favoriteMovies()->where('movie_id', $movieId)->exists()) {
        $user->favoriteMovies()->create([
            'movie_id' => $movieId,
        ]);

        return redirect()->back()->with('success', 'Filme adicionado aos favoritos.');
    }

    return redirect()->back()->with('error', 'Filme já está nos favoritos.');
}

public function removeFromFavorites(Request $request)
{
    $user = Auth::user();
    $movieId = $request->input('movie_id');
    
    // Remove o filme dos favoritos do usuário
    $user->favoriteMovies()->where('movie_id', $movieId)->delete();
    
    return redirect()->back()->with('success', 'Filme removido dos favoritos.');
}

public function dashboard()
{
    $favoriteMovies = auth()->user()->favoriteMovies;
    
    foreach ($favoriteMovies as $favoriteMovie) {
        $movieId = $favoriteMovie->movie_id;
        $response = Http::get("https://api.themoviedb.org/3/movie/{$movieId}?api_key=9549bb8a29df2d575e3372639b821bdc&language=pt-BR"); // Substitua SEU_API_KEY pelo seu API Key do TMDb
        $movieData = $response->json();

        $favoriteMovie->movie = $movieData; // Adicione os detalhes do filme ao objeto $favoriteMovie
    }

    return view('dashboard', compact('favoriteMovies'));
}
}