<?php

namespace App\Http\Controllers;

use App\Autor;
use PDOException;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AutorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AutorController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function indexView() {
        return view('autor.autor');
    }

    public function index($id) {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $autores = $bibliotecas->autor()->paginate(4);
        if((Auth::user()->id) == $verify){
            return view('autor.autor', ['autores' => $autores, 'id' => $id, 'verify' => $verify] );
        }
        return redirect('home');
    }

    public function novo($id){
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        if((Auth::user()->id) == $verify){
            return view ('autor.novoautor', compact('id'));
        }
        return redirect('home');

    }

    public function criar(AutorRequest $request, $id) {
        $autor = new Autor();
        $user = auth()->user();
        $autor->nome = $request->input('nomeAutor');
        $autor->sobrenome = $request->input('sobrenomeAutor');
        $autor->pais = $request->input('paisAutor');
        $autor->descricao = $request->input('descricao');
        $autor->anonascimento = $request->input('anoNascimento');
        $autor->anomorte = $request->input('anoMorte');
        $autor->biblioteca_id = $id;
        $autor->user_id = $user->id;
        $autor->save();
        return Redirect::route('lista.autores', array('id' =>$id))->with('success','Catalogação registrada com sucesso');
    }

    public function editar($id, Autor $autor){
        $bibliotecas = Biblioteca::find($id);
        $id = $autor->biblioteca_id;
        $autores = $autor->id;
        $lista = Autor::find($autores);
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            return view('autor.autoreditar', compact('id', 'autores', 'lista'));
        }
        return redirect('home');
    }

    public function atualizar(AutorRequest $request, $id, Autor $autor) {
        $biblioteca = $autor->biblioteca_id;
        $id = $autor->user_id;
        $user = auth()->user();
        if(isset($autor) && ($user->id) == ($id)){
            $autor->nome = $request->input('nomeAutor');
            $autor->sobrenome = $request->input('sobrenomeAutor');
            $autor->pais = $request->input('paisAutor');
            $autor->descricao = $request->input('descricao');
            $autor->anonascimento = $request->input('anoNascimento');
            $autor->anomorte = $request->input('anoMorte');
            $autor->save();
            return Redirect::route('lista.autores', array('id' => $biblioteca))->with('success','Informação Atualizada com Sucesso');
        } else {
            return Redirect::route('lista.autores', array('id' =>$autor->biblioteca))->with('error','Informação Não Atualizada com Sucesso');
        }
    }

    public function pesquisar($id, Autor $autor, Request $request)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $data = $request->all();
        $autores = DB::table('autores')->select('autores.id', 'autores.nome', 'autores.sobrenome','autores.pais', 'autores.descricao', 
        'autores.anonascimento', 'autores.anomorte')
        ->join('bibliotecas', 'bibliotecas.id', '=', 'autores.biblioteca_id')
        ->where('autores.biblioteca_id', '=', $id);
        
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            if(!empty($request->buscar)){
                if($request->filtro == 'nomeautores'){
                    $autores->where('autores.nome', 'ILIKE',"%$request->buscar%");              
                }
                if($request->filtro == 'sobrenomeautores'){
                    $autores->where('autores.sobrenome', 'ILIKE',"%$request->buscar%");              
                }
            } 
                $autores = $autores->paginate(4)->appends(request()->except('page'));
                return view('autor.autor', compact('id','autor', 'autores' ,'verify'));
            } else {
                return Redirect::route('home');
        }        
    }

    public function apagar(Autor $autor) {
        $id = $autor->biblioteca_id;
        try{
            $autor->delete();
            return Redirect::route('lista.autores', array('id' =>$id))->with('success','O(A) Autor(a) Foi Excluído(a) com Sucesso');
        } catch ( PDOException $e){
            return Redirect::route('lista.autores', array('id' =>$id))->with('error', 'Remova o(s) Livro(s) Vinculado(s) a Este(a) Autor(a)');
        }
        
    }
} 