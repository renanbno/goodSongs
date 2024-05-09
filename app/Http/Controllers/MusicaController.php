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
        

        $cadastroMusica = Musica::create(
            [
                'nome'=>$request->nome,
                'duracao'=>$request->duracao,
                'artista'=>$request->artista,
                'genero'=>$request->genero,
                'nacionalidade'=>$request->nacionalidade, 
                'data'=>$request->data,
                'album'=>$request->album
            ]
        );

        return response()->json([
            'status'=> true,
            'message'=>'Cadastrado com sucesso',
            'data'=> $cadastroMusica
        ]);
    }

    public function retornarTodos(){
        $cadastroMusica = Musica::all();
         return response()->json([
             'status'=>true,
              'data'=> $cadastroMusica]);
    }


    public function pesquisarPorNome(Request $request){
        $cadastroMusica = Musica::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($cadastroMusica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $cadastroMusica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    }


    public function pesquisarPorGenero(Request $request){
        $cadastroMusica = Musica::where('genero', 'like', '%'. $request->genero . '%')->get();
    
        if(count($cadastroMusica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $cadastroMusica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function pesquisarPorAlbum(Request $request){
        $cadastroMusica = Musica::where('album', 'like', '%'. $request->album . '%')->get();
    
        if(count($cadastroMusica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $cadastroMusica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorNacionalidade(Request $request){
        $cadastroMusica = Musica::where('nacionalidade', 'like', '%'. $request->nacionalidade . '%')->get();
    
        if(count($cadastroMusica)>0){
            return response()->json([
                'status'=>true,
                'data'=> $cadastroMusica
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function update(Request $request){
        $cadastroMusica = Musica::find($request->id);
    
        if(!isset($cadastroMusica)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $cadastroMusica->nome = $request->nome;
        }
        if(isset($request->duracao)){
            $cadastroMusica->duracao= $request->duracao;
        }
        if(isset($request->artista)){
            $cadastroMusica->artista = $request->artista;
        }
        if(isset($request->cpf)){
            $cadastroMusica->cpf = $request->cpf;
        }
        if(isset($request->genero)){
            $cadastroMusica->genero = $request->genero;
        }
        if(isset($request->nacionalidade)){
            $cadastroMusica->nacionalidade = $request->nacionalidade;
        }
        if(isset($request->data)){
            $cadastroMusica->data = $request->data;
        }
        if(isset($request->album)){
            $cadastroMusica->album = $request->album;
        }
        
        $cadastroMusica-> update();
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    }

    public function excluir($id){
        $cadastroMusica = Musica::find($id);
    
        if(!isset($cadastroMusica)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $cadastroMusica->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }    
    
}