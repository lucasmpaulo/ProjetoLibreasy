<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
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
            'nomeAutor' => 'required|max:30|regex:/^[a-zA-Zà-úÀ-Ú-9]+$/u',
            'sobrenomeAutor' => 'required|max:50|regex:/^[a-zA-Zà-úÀ-Ú-9]+$/u',
            'paisAutor' => 'required|max:30',
            'descricao' => 'required|max:255',
            'anoNascimento' => 'cs_date|lt:anoMorte',
            'anoMorte' => 'cs_date|gt:anoNascimento',
        ];
    }
}

