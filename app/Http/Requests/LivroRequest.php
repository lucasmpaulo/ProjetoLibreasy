<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'isbn' => 'required|max:17',
            'titulo' => 'required|max:100',
            'subtitulo' => 'max:100',
            'descricao' => 'required|max:150',
            'anolivro' => 'min:0|integer|max:'.(date('Y')),
            'numpagina' => 'integer|min:30|required',   
            'autor_id' => 'required',
            'categoria_id' => 'required',
            'editora_id' => 'required',
        ];
    }
}