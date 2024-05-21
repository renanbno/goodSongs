<?php

use App\Http\Controllers\MusicaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//musíca
Route::post('cadastro/musica',[MusicaController::class,'cadastroMusica']);
Route::post('visualizar/musica',[MusicaController::class,'visualizar']);
Route::get('pesquisarPor/find/{id}',[MusicaController::class, 'pesquisarPorId']);
Route::get('pesquisarPor/musica/titulo',[MusicaController::class, 'pesquisarPorTitulo']);
Route::get('pesquisarPor/musica/genero',[MusicaController::class, 'pesquisarPorGenero']);
Route::get('pesquisarPor/musica/album',[MusicaController::class, 'pesquisarPorAlbum']);
Route::get('pesquisarPor/musica/nacionalidade',[MusicaController::class, 'pesquisarPorNacionalidade']);
Route::put('atualizar/cadastro/musica', [MusicaController::class, 'atualizarMusica']);
Route::delete('excluir/{id}',[MusicaController::class, 'excluir']);
