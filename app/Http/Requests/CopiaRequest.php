<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CopiaRequest extends FormRequest
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
            'codigoCopia' => 'string|required',
            'numero_copias' => 'required|number|max:99',
            'livro_id' => 'required',
            'biblioteca_id' => 'required',
        ];
    }
}
