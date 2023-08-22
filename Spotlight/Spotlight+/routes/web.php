<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\FavoriteMovieController;
use App\Http\Controllers\PesquisaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = Auth::user(); // Ou alguma outra maneira de obter o usuário atual
    return view('welcome',['user' => $user]);
    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/filmes/{id}', [FilmeController::class, 'show'])->name('filmes.show');
Route::get('/pesquisa', [PesquisaController::class, 'index'])->name('pesquisa.index');


Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes.index');
Route::post('/favorite/add', 'App\Http\Controllers\FavoriteMovieController@addToFavorites')->name('favorite.add');
Route::post('/favorite/remove', 'App\Http\Controllers\FavoriteMovieController@removeFromFavorites')->name('favorite.remove');
Route::get('/dashboard', [FavoriteMovieController::class, 'dashboard'])->name('dashboard');





