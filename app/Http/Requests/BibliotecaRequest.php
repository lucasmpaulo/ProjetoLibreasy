<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BibliotecaRequest extends FormRequest
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
            'nomeBiblioteca' => 'required|unique:bibliotecas,nome|max:255',
            'nomePaisBiblioteca' => 'required|max:255',
        ];
    }
}
