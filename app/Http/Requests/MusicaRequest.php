<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
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
            'nome' => 'required|max:120',
            'duracao' => 'required|decimal',
            'artista'=> 'required|max:120',
            'genero'=>'required|max:20',
            'nacionalidade'=>'required|max:120',
            'data'=>'required|date',
            'album'=>'required|max:20',
        
        ];
    }

    public function failedValidation (Validators $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    
    }

    public Function messages(){
        return [
            'nome.required'=> 'O campo nome da música é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 120 caracteres',
            
            'duracao.required' => 'O campo duração é obrigatorio',
            'duracao.decimal' => 'O formato campo duração não está correto',

            'artista.max' => 'o campo artista deve conter no maximo 120 caracteres',
            'artista.required'=> 'O artista é obrigatorio',

            'genero.max' => 'o campo genero deve conter no maximo 20 caracteres',
            'genero.required'=> 'O genero é obrigatorio',

            'nacionalidade.max' => 'o campo nacionalidade deve conter no maximo 120 caracteres',
            'nacionalidade.required'=> 'A nacionalidade é obrigatoria',

            'data.required'=> 'O campo nome da música é obrigatorio',
            'data.dete'=> 'Formato invalido',

            'album.max' => 'o campo album deve conter no maximo 20 caracteres',
            'album.required'=> 'O album é obrigatorio',
        ];
    }
}
