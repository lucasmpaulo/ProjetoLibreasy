<?php

namespace App\Http\Controllers;

use App\Editora;
use PDOException;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditoraRequest;
use Illuminate\Support\Facades\Redirect;

class EditoraController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function indexView() {
        return view('editora.editora');
    }

    public function index($id) {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $editoras = $bibliotecas->editora()->paginate(4);
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view('editora.editora', compact('editoras', 'verify', 'id'));
        }
        return redirect('home');
    }

    public function novo($id){
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view ('editora.novaeditora', compact('id'));
        }
        return redirect('home');
    }

    public function criar(EditoraRequest $request, $id) {
        $editora = new Editora();
        $user = auth()->user();
        $editora->nome = $request->input('nomeEditora');
        $editora->cidade = $request->input('cidadeEditora');
        $editora->endereco = $request->input('enderecoEditora');
        $editora->cep = $request->input('cepEditora');
        $editora->telefone = $request->input('telefoneEditora');
        $editora->biblioteca_id = $id;
        $editora->user_id = $user->id;
        $editora->save();
        return Redirect::route('lista.editoras', array('id' =>$id))->with('success','Editora Inserido com Sucesso');
    }

    public function editar($id, Editora $editora){
        $bibliotecas = Biblioteca::find($id);
        $id = $editora->biblioteca_id;
        $editora = $editora->id;
        $lista = Editora::find($editora);
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view('editora.editarEditora', compact('id', 'editora', 'lista'));
        }
        return Redirect::route('lista.editoras', array('id' => $id))->with('error', 'Não foi possível no momento, tente mais tarde.');
    }

    public function atualizar(EditoraRequest $request, $id, Editora $editora) {
        $editora->nome = $request->input('nomeEditora');
        $editora->cidade = $request->input('cidadeEditora');
        $editora->endereco = $request->input('enderecoEditora');
        $editora->cep = $request->input('cepEditora');
        $editora->telefone = $request->input('telefoneEditora');
        $editora->save();
        return Redirect::route('lista.editoras', array('id' =>$id))->with('success','Editora Atualizada com Sucesso');
    }

    public function pesquisar($id, Editora $editora, Request $request)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $data = $request->all();
        $editoras = DB::table('editoras')->select('editoras.id', 'editoras.nome', 'editoras.cidade','editoras.endereco', 
        'editoras.cep', 'editoras.telefone', 'editoras.biblioteca_id')
        ->join('bibliotecas', 'bibliotecas.id', '=', 'editoras.biblioteca_id')
        ->where('editoras.biblioteca_id', '=', $id);
        
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            if(!empty($request->buscar)){
                if($request->filtro == 'nome'){
                    $editoras->where('editoras.nome', 'LIKE',"%$request->buscar%");              
                }
                if($request->filtro == 'cidade'){
                    $editoras->where('editoras.cidade', 'LIKE',"%$request->buscar%");              
                }
                if($request->filtro == 'endereco'){
                    $editoras->where('editoras.endereco', 'LIKE',"%$request->buscar%");              
                }
            }
            $editoras = $editoras->paginate(4)->appends(request()->except('page'));
            return view('editora.editora', compact('id','editoras','verify'));
        } else {
            return Redirect::route('home');
        }
    }

    public function apagar($id, Editora $editora) {
        $id = $editora->biblioteca_id;
        $editoras = $editora->id;
        try{
            $editora->delete();
            return Redirect::route('lista.editoras', array('id' =>$id, 'editora' => $editoras))->with('success','Editora Foi Excluída com Sucesso');
        } catch (PDOException $e){
            return Redirect::route('lista.editoras', ['id' => $id, 'editora' => $editoras])->with('error', 'Remova o(s) Livro(s) Vinculado(s) a Esta Editora');
        }  
    }
}
