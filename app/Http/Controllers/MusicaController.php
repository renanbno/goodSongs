<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicaRequest;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function cadastro (MusicaRequest $request){
        $musica = musica::create ([
        'nome'=>$request->nome,
        'duracao'=>$request->duracao,
        'artista'=>$request->artista,
        'genero'=>$request->genero,
        'nacionalidade'=>$request->nacionalidade, 
        'data'=>$request->data,
        'album'=>$request->album,

        ]);
        return response()->json
    };
}