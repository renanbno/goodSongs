<?php

use App\Http\Controllers\MusicaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('cadastro/musica',[MusicaController::class,'cadastroMusica']);
Route::get('retornarTodos/musica',[MusicaController::class,'retornarTodos']);
Route::post('pesquisarPor/musica/nome',[MusicaController::class, 'pesquisarPorNome']);
Route::post('pesquisarPor/musica/genero',[MusicaController::class, 'pesquisarPorGenero']);
Route::post('pesquisarPor/musica/album',[MusicaController::class, 'pesquisarPorAlbum']);
Route::post('pesquisarPor/musica/nacionalidade',[MusicaController::class, 'pesquisarPorNacionalidade']);
Route::put('atualizar/cadastro', [MusicaController::class, 'update']);
Route::delete('excluir/{id}',[MusicaController::class, 'excluir']);
