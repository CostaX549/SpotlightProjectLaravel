<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PesquisaController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user(); // Obtém o usuário autenticado
        $resultados = [];
    
        if ($request->has('termo')) {
            $termo = $request->input('termo');
    
            $apiKey = '9549bb8a29df2d575e3372639b821bdc';
            $response = Http::get("https://api.themoviedb.org/3/search/multi?api_key={$apiKey}&language=pt-BR&query={$termo}");
            $data = $response->json();
    
            // Verifique se há resultados na resposta da API
            if (!empty($data['results'])) {
                $resultados = $data['results'];
            }
        }
    
        return view('welcome', compact('resultados'),['user' => $user]); // Retorne para a welcome.blade.php
    }

    
}
