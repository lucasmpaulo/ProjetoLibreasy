<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AtualizarPerfilController extends Controller
{
    public function editar($id, User $perfil){
        $perfil = User::find($id);
        $id = $perfil->id;
        if(((Auth::user()->id) == $perfil->id)){
            return view('perfil.editarperfil', compact('id', 'perfil'));
        }
        return Redirect::route('home')->with('error', 'Não foi possível no momento, tente mais tarde.');
    }

    public function atualizar(Request $request, $id) {
        $perfil = User::find($id);
        if(isset($perfil)){
            $perfil->name = $request->input('name');
            $perfil->lastname = $request->input('lastname');
            $perfil->cidade = $request->input('cidade');
            $perfil->endereco = $request->input('endereco');
            $perfil->bairro = $request->input('bairro');
            $perfil->cep = $request->input('cep');
            $perfil->save();
        }  
        return Redirect::route('home')->with('success','Perfil Atualizado Com Sucesso');
    }
}
