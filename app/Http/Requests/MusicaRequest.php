<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nome' => 'required|max:120|unique:nome',
            'duracao' => 'required|decimal',
            'artista'=> 'required|max:120',
            'genero'=>'required|max:20',
            'nacionalidade'=>'required|max:120|unique:nome',
            'data'=>'required|date',
            'album'=>'required|max:20|unique',
        
        ];
    }
}
