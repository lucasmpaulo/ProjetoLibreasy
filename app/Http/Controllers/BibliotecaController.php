<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Livro;
use Exception;
use App\Locacao;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BibliotecaRequest;
use Illuminate\Support\Facades\Redirect;

class BibliotecaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $bibliotecas = Biblioteca::all();
        $id = $bibliotecas->id;
        $autores = Autor::all();
        return view('biblioteca.biblioteca', compact('bibliotecas', 'autores'));
    }

    public function novo(){
        return view ('biblioteca.novabiblioteca');
    }

    public function criar(BibliotecaRequest $request) {
        $biblioteca = new Biblioteca();
        $id = $biblioteca->id;
        $user = auth()->user();
        $biblioteca->nome = $request->input('nomeBiblioteca');
        $biblioteca->pais = $request->input('nomePaisBiblioteca');
        $biblioteca->user_id = $user->id; 
        $biblioteca->save();
        return Redirect::route('home', array('id' =>$id))->with('success','A Biblioteca Foi Criada com Sucesso');
    }

    public function editar($id){
        $biblioteca = Biblioteca::find($id);
        $user = auth()->user();
        if(isset($biblioteca) && ($user->id) == ($biblioteca->user_id)){
            return view('biblioteca.editar', compact('biblioteca'));
        }
        return redirect('/bibliotecas/biblioteca');
    }

    public function atualizar(BibliotecaRequest $request, $id) {
        $biblioteca = Biblioteca::find($id);
        $id = $biblioteca->id;
        $user = auth()->user();

        if(isset($biblioteca) && ($user->id) == ($biblioteca->user_id)){
            $biblioteca->nome = $request->input('nomeBiblioteca');
            $biblioteca->pais = $request->input('nomePaisBiblioteca');
            $biblioteca->save();
        }  
        return Redirect::route('home', array('id' =>$id))->with('success','A Biblioteca Foi Atualizada com Sucesso');
    }

    public function apagar($id, Biblioteca $biblioteca) {
        $biblioteca = Biblioteca::find($id);
        $id = $biblioteca->id;
        try{
            $biblioteca->delete();
            return Redirect::route('home', array('id' =>$id))->with('success','A Biblioteca Foi Excluída com Sucesso');
        } catch ( Exception $e){
            return Redirect::route('home')->with('error', 'Remova as informações vinculadas a esta biblioteca');
        }
    }

    public function mostrar($id, Livro $livro){
        $biblioteca = Biblioteca::find($id);
        $locacao = Locacao::all();
        $id = $biblioteca->id;
        $user = Auth()->user();
        $verify = $biblioteca->user_id;
        $bibliotecas = Biblioteca::all();
        $livros = DB::table('livros')->select('livros.id', 'livros.isbn','livros.codigoLivro', 'livros.titulo', 'livros.biblioteca_id', 
        'livros.numeroCopias', 'categorias.nome', 'livros.numPagina', DB::raw("CONCAT(autores.nome,' ', autores.sobrenome) as nome_autor"))
        ->join('bibliotecas', 'bibliotecas.id', '=', 'livros.biblioteca_id')
        ->join('autores', 'autores.id', '=', 'livros.autor_id')
        ->join('categorias', 'categorias.id', '=', 'livros.categoria_id')
        ->where('livros.biblioteca_id', '=', $id);
        $livros = $livros->paginate(4);
        if(($user->id) == $verify){
            return view('biblioteca.mostrarbiblioteca', compact('bibliotecas','id', 'livros' ,'verify', 'locacao'));
        }
        return redirect('/home');
    }

    public function pesquisar($id, Request $request)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        // $livros = $bibliotecas->livro()->paginate(2)->appends(request()->except('page'));
        $data = $request->all();
        $livros = DB::table('livros')->select('livros.id', 'livros.isbn','livros.codigoLivro', 'livros.titulo', 'livros.biblioteca_id', 
        'livros.numeroCopias', 'categorias.nome', 'livros.numPagina', DB::raw("CONCAT(autores.nome,' ', autores.sobrenome) as nome_autor"))
        ->join('bibliotecas', 'bibliotecas.id', '=', 'livros.biblioteca_id')
        ->join('autores', 'autores.id', '=', 'livros.autor_id')
        ->join('categorias', 'categorias.id', '=', 'livros.categoria_id')
        ->where('livros.biblioteca_id', '=', $id);
                
        if(((Auth::user()->id) == $verify) && ($bibliotecas->id == $id)){
            if(!empty($request->buscar)){
                if($request->filtro == 'titulo'){
                    $livros->where('titulo','ILIKE', "%$request->buscar%");
                }
                if($request->filtro == 'isbn'){
                    $livros->where('isbn','ILIKE', "%$request->buscar%");
                }
                if($request->filtro == 'codigo'){
                    $livros->where('codigoLivro','ILIKE', "%$request->buscar%");
                }
                if($request->filtro == 'categorias'){
                    $livros->where('categorias.nome', 'ILIKE', "%$request->buscar%");
                }
                if($request->filtro == 'nomeautores'){
                    $livros->where('autores.nome', 'ILIKE',"%$request->buscar%");              
                }
                if($request->filtro == 'sobrenomeautores'){
                    $livros->where('autores.sobrenome', 'ILIKE',"%$request->buscar%");              
                }
            }
            $livros = $livros->paginate(4)->appends(request()->except('page'));
            return view('biblioteca.mostrarbiblioteca', compact('id', 'livros' ,'verify'));
        } else {
            return Redirect::route('home');
        }
    }
}


