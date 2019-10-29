<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'nome_aluno' => 'required|max:30|regex:/^[a-zA-Zà-úÀ-Ú-9]+$/u]+$/u',
            'sobrenome_aluno' => 'required|max:50|regex:/^[a-zA-Zà-úÀ-Ú-9]+$/u',
            'telefone_aluno' => 'required',
            'email_aluno' => 'required|unique:alunos,email_aluno|email|max:255',
        ];
    }
}
