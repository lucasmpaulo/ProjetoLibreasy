<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocacaoRequest extends FormRequest
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
            'nome_locador' => 'required',
            'data_locacao' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'data_locacao.after_or_equal' => 'A data informada deve ser igual ou maior a data de hoje',
        ];
    }
}
