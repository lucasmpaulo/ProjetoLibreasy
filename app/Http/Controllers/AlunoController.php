<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AlunoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $alunos = $bibliotecas->aluno()->paginate(4);
        if((Auth::user()->id) == $verify){
            return view('aluno.aluno', compact('id', 'verify', 'alunos'));
        }
        return redirect('home');
    }

    public function novo($id){
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        if((Auth::user()->id) == $verify){
            return view ('aluno.novoaluno', compact('id'));
        }
        return redirect('home');

    }

    public function criar(AlunoRequest $request, $id) {
        $aluno = new Aluno();
        $user = auth()->user();
        $aluno->nome_aluno = $request->input('nome_aluno');
        $aluno->sobrenome_aluno = $request->input('sobrenome_aluno');
        $aluno->telefone_aluno = $request->input('telefone_aluno');
        $aluno->email_aluno = $request->input('email_aluno');
        $aluno->biblioteca_id = $id;
        $aluno->save();
        return Redirect::route('lista.alunos', array('id' => $id))->with('success','O(A) Aluno(a) Foi Inserido(a) com Sucesso');
    }

    public function editar($id, Aluno $aluno){
        $bibliotecas = Biblioteca::find($id);
        $id = $aluno->biblioteca_id;
        $aluno = $aluno->id;
        $lista = Aluno::find($aluno);
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            return view('aluno.editaraluno', compact('id', 'aluno', 'lista'));
        }
        return redirect('home');
    }

    public function atualizar(AlunoRequest $request, $id, Aluno $aluno) {
        $id = $aluno->biblioteca_id;
        $aluno->nome_aluno = $request->input('nome_aluno');
        $aluno->sobrenome_aluno = $request->input('sobrenome_aluno');
        $aluno->telefone_aluno = $request->input('telefone_aluno');
        $aluno->email_aluno = $request->input('email_aluno');
        $aluno->save();
        return Redirect::route('lista.alunos', array('id' =>$id))->with('success','O(A) Aluno(a) Foi Atualizado(a) com Sucesso');
    }

    public function pesquisar($id, Aluno $aluno, Request $request)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $data = $request->all();
        $alunos = DB::table('alunos')->select('alunos.id', 'alunos.nome_aluno', 'alunos.sobrenome_aluno','alunos.telefone_aluno', 
        'alunos.email_aluno', 'alunos.biblioteca_id')
        ->join('bibliotecas', 'bibliotecas.id', '=', 'alunos.biblioteca_id')
        ->where('alunos.biblioteca_id', '=', $id);
        
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            if(!empty($request->buscar)){
                if($request->filtro == 'nome_aluno'){
                    $alunos->where('alunos.nome_aluno', 'LIKE',"%$request->buscar%");            
                }
                if($request->filtro == 'sobrenome_aluno'){
                    $alunos->where('alunos.sobrenome_aluno', 'LIKE',"%$request->buscar%");              
                }
                if($request->filtro == 'email_aluno'){
                    $alunos->where('alunos.email_aluno', 'LIKE',"%$request->buscar%");              
                }
            } 
                $alunos = $alunos->paginate(4)->appends(request()->except('page'));
                return view('aluno.aluno', compact('id','alunos','verify'));
            }else {
                return Redirect::route('home');
        }
    }

    public function apagar($id, Aluno $aluno) {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $alunos = $aluno->id;
        try{
            $aluno->delete();
            return Redirect::route('lista.alunos', array('id' => $id))->with('success','O(A) Aluno(a) Foi Excluído(a) com Sucesso');
        } catch ( PDOException $e){
            return Redirect::route('lista.autores', array('id' =>$id))->with('error', 'Remova as Informações Vinculadas a Este Aluno(a)!');
        }
        
    }
}
