<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditoraRequest extends FormRequest
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
            'nomeEditora' => 'required|max:30',
            'cidadeEditora' => 'required|max:50',
            'enderecoEditora' => 'required|max:50',
            'cepEditora' => 'required|max:9',
            'telefoneEditora' => 'required',
        ];
    }
}