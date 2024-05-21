<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Nette\Utils\Validators;

class MusicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:120',
            'duracao' => 'required|integer',
            'artista'=> 'required|max:120',
            'genero'=>'required|max:20',
            'nacionalidade'=>'required|max:120',
            'ano_lancamento'=>'required|date',
            'album'=>'max:20',
        
        ];
    }

    public function failedValidation (Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'error' => $validator->errors()
        ]));
    }

    public Function messages(){
        return [
            'titulo.required'=> 'O campo titulo da música é obrigatorio',
            'titulo.max' => 'o campo titulo deve conter no maximo 120 caracteres',
            
            'duracao.required' => 'O campo duração é obrigatorio',
            'duracao.decimal' => 'O formato campo duração não está correto',

            'artista.max' => 'o campo artista deve conter no maximo 120 caracteres',
            'artista.required'=> 'O artista é obrigatorio',

            'genero.max' => 'o campo genero deve conter no maximo 20 caracteres',
            'genero.required'=> 'O genero é obrigatorio',

            'nacionalidade.max' => 'o campo nacionalidade deve conter no maximo 120 caracteres',
            'nacionalidade.required'=> 'A nacionalidade é obrigatoria',

            'ano_lancamento.required'=> 'O campo ano da música é obrigatorio',
            'ano_lancamento.dete'=> 'Formato invalido',

            'album.max' => 'o campo album deve conter no maximo 20 caracteres'
            
        ];
    }
}
