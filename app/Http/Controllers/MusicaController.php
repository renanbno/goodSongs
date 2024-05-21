<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicaRequest;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class MusicaController extends Controller
{
    public function cadastroMusica(MusicaRequest $request){
        $musicaExistente = Musica::where('titulo', $request->titulo)->where('artista', $request->artista)->first();
        if (isset($musicaExistente)) {
            return response()->json([
                "status" => false,
                "message" => "Esse artista já possui esse título."
            ],400);
        }
        

        $musica = Musica::create(
            [
                'titulo'=>$request->titulo,
                'duracao'=>$request->duracao,
                'artista'=>$request->artista,
                'genero'=>$request->genero,
                'nacionalidade'=>$request->nacionalidade, 
                'ano_lancamento'=>$request->ano_lancamento,
                'album'=>$request->album
            ]
        );

        return response()->json([
            'status'=> true,
            'message'=>'Cadastrado com sucesso',
            'data'=> $musica
        ]);
    }

    public function visualizar(){
        $musica = Musica::all();
         return response()->json([
             'status'=>true,
              'data'=> $musica]);
    }

    public function pesquisarPorId($id){
        $musica = Musica::find($id);
    
        if($musica == null){
           return response()->json([
            'status'=>false,
             'data'=> 'Música não encontrada.'
            ]);
        }
                 return response()->json([
                'status'=>true,
                'data'=> $musica
            ]);

    }

    public function pesquisarPorTitulo(Request $request){
        $musica = Musica::where('titulo', 'like', '%'. $request->titulo . '%')->get();
    
        if(count($musica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $musica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    }

    public function pesquisarPorGenero(Request $request){
        $musica = Musica::where('genero', 'like', '%'. $request->genero . '%')->get();
    
        if(count($musica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $musica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function pesquisarPorAlbum(Request $request){
        $musica = Musica::where('album', 'like', '%'. $request->album . '%')->get();
    
        if(count($musica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $musica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorNacionalidade(Request $request){
        $musica = Musica::where('nacionalidade', 'like', '%'. $request->nacionalidade . '%')->get();
    
        if(count($musica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $musica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function atualizarMusica(Request $request){
        $musica = Musica::find($request->id);
    
        if(!isset($musica)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }

        $musicaExistente = Musica::where('titulo', $request->titulo)->where('artista', $request->artista)->first();
        if (isset($musicaExistente)) {
            return response()->json([
                "status" => false,
                "message" => "Esse artista já possui esse título."
            ],400);
        }
    
        if(isset($request->titulo)){
            $musica->titulo = $request->titulo;
        }
        if(isset($request->duracao)){
            $musica->duracao= $request->duracao;
        }
        if(isset($request->artista)){
            $musica->artista = $request->artista;
        }
        if(isset($request->genero)){
            $musica->genero = $request->genero;
        }
        if(isset($request->nacionalidade)){
            $musica->nacionalidade = $request->nacionalidade;
        }
        if(isset($request->ano_lancamento)){
            $musica->ano_lancamento = $request->ano_lancamento;
        }
        if(isset($request->album)){
            $musica->album = $request->album;
        }
        
        $musica-> update();
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    }

    public function excluir($id){
        $musica = Musica::find($id);
    
        if(!isset($musica)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $musica->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }    
    
}