<?php

namespace App\Http\Controllers;

use App\Livro;
use App\Biblioteca;
use App\Status;
use App\Copia;
use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PDOException;

class LivroController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }
    
    public function indexView() {
        return view('livro.livro');
    }

    public function index($id) {
        $bibliotecas = Biblioteca::find($id);
        $verify = $bibliotecas->user_id;
        $id = $bibliotecas->id;
        $editoras = $bibliotecas->editora;
        $livros = $bibliotecas->livro()->paginate(6);
        if((Auth::user()->id) == $verify){
            return view('livro.livro', compact('editoras', 'id', 'verify', 'livros'));
        }
        return redirect('home');
    }
    public function visualizar($id, Livro $livro) {
        $bibliotecas = Biblioteca::find($id);
        $verify = $bibliotecas->user_id;
        $id = $bibliotecas->id;
        $editoras = $bibliotecas->editora;
        $livro = $livro->id;
        $lista = Livro::find($livro);
        $status = $lista->status;
        if((Auth::user()->id) == $verify){
            return view('livro.verlivro', compact('editoras', 'id', 'verify', 'lista', 'livro', 'status'));
        }
        return redirect('home');
    }

    public function novo($id){
        $bibliotecas = Biblioteca::find($id);
        $autores = $bibliotecas->autor;
        $categorias = $bibliotecas->categoria;
        $editoras = $bibliotecas->editora;
        $status = Status::all();
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        if((Auth::user()->id) == $verify){
            return view('livro.novolivro', compact('id', 'autores', 'categorias', 'editoras', 'status'));
        }
        return redirect('home');
    }

    public function criar(LivroRequest $request, $id, Copia $copia) {
        $livro = new Livro();
        $copias = new Copia();
        $user = auth()->user();
        $result = rand(100000, 999999);
        $subt = rand(0, 99);
        try{
            if($result == $livro->codigoLivro){
                $livro->codigoLivro = $result - $subt;
                $livro->isbn = $request->input('isbn');
                $livro->titulo = $request->input('titulo');
                $livro->subtitulo = $request->input('subtitulo');
                $livro->descricao = $request->input('descricao');   
                $livro->anoLivro = $request->input('anolivro');
                $livro->numPagina = $request->input('numpagina');
                $livro->edicao = $request->input('edicao');
                $livro->numeroCopias = 0;
                $livro->autor_id = $request->input('autor_id');
                $livro->editora_id = $request->input('editora_id');
                $livro->categoria_id = $request->input('categoria_id');
                $livro->biblioteca_id = $id;
                $livro->user_id = $user->id;
                $livro->save();

                $result2 = rand(100000, 999999);
                $subt2 = rand(0, 99);
                if($result == $copias->codigoCopia){
                    $copias->codigoCopia = $result2 - $subt2;
                    $copias->livro_id = $livro->id;
                    $copias->biblioteca_id = $id;
                    $copias->status_id = 1;
                    $livros = Livro::find($livro->id);
                    $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
                    $copias->save();      
                } else {
                    $copias->codigoCopia = $result2;
                    $copias->livro_id = $livro->id;
                    $copias->biblioteca_id = $id;
                    $copias->status_id = 1;
                    $livros = Livro::find($livro->id);
                    $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
                    $copias->save();
                }  

                return Redirect::route('lista.livros', array('id' =>$id))->with('success','Livro Inserido com Sucesso');
            } else {
                $livro->isbn = $request->input('isbn');
                $livro->titulo = $request->input('titulo');
                $livro->subtitulo = $request->input('subtitulo');
                $livro->descricao = $request->input('descricao');   
                $livro->anoLivro = $request->input('anolivro');
                $livro->numPagina = $request->input('numpagina');
                $livro->edicao = $request->input('edicao');
                $livro->numeroCopias = 0;
                $livro->codigoLivro = $result;
                $livro->autor_id = $request->input('autor_id');
                $livro->editora_id = $request->input('editora_id');
                $livro->categoria_id = $request->input('categoria_id');
                $livro->biblioteca_id = $id;
                $livro->user_id = $user->id;
                $livro->save();

                $result2 = rand(100000, 999999);
                $subt2 = rand(0, 99);
                if($result == $copias->codigoCopia){
                    $copias->codigoCopia = $result2 - $subt2;
                    $copias->livro_id = $livro->id;
                    $copias->biblioteca_id = $id;
                    $copias->status_id = 1;
                    $livros = Livro::find($livro->id);
                    $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
                    $copias->save();      
                } else {
                    $copias->codigoCopia = $result2;
                    $copias->livro_id = $livro->id;
                    $copias->biblioteca_id = $id;
                    $copias->status_id = 1;
                    $livros = Livro::find($livro->id);
                    $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
                    $copias->save();
                }  
                return Redirect::route('lista.livros', array('id' =>$id))->with('success','Livro Inserido com Sucesso');
            }
        } catch ( Exception $e) {
            return Redirect::route('lista.livros', array('id' => $id))->with('error', 'Não foi possível efetuar o registro');
        }
    }

    public function editar($id, Livro $livro, Copia $copia){
        $bibliotecas = Biblioteca::find($id);
        $autores = $bibliotecas->autor;
        $categorias = $bibliotecas->categoria;
        $editoras = $bibliotecas->editora;
        $status = Status::all();
        $id = $livro->biblioteca_id;
        $livro = $livro->id;
        $lista = Livro::find($livro);
        $copia = $copia->id;
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view('livro.editarlivro', compact('id', 'livro', 'lista', 'autores', 'categorias', 'editoras','status'));
        }
        return Redirect::route('home');
    }

    public function atualizar(LivroRequest $request, $id, livro $livro) {
        $bibliotecas = Biblioteca::find($id);
        $id = $livro->biblioteca_id;
        $verify = $bibliotecas->user_id;
        if((Auth::user()->id) == $verify){
            $livro->isbn = $request->input('isbn');
            $livro->titulo = $request->input('titulo');
            $livro->subtitulo = $request->input('subtitulo');
            $livro->descricao = $request->input('descricao');
            $livro->anoLivro = $request->input('anolivro');
            $livro->numPagina = $request->input('numpagina');
            // $livro->status_id = 1;
            $livro->edicao = $request->input('edicao');
            $livro->autor_id = $request->input('autor_id');
            $livro->editora_id = $request->input('editora_id');
            $livro->categoria_id = $request->input('categoria_id');
            $livro->save();
        }  
        return Redirect::route('lista.bibliotecas', array('id' =>$id))->with('success','Informação Atualizada com Sucesso');
    }
    
    public function pesquisar($id, Request $request)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        // $livros = $bibliotecas->livro()->paginate(2)->appends(request()->except('page'));
        $data = $request->all();
        $livros = DB::table('livros')->select('livros.id', 'livros.isbn','livros.codigoLivro', 'livros.titulo', 'status.status_atual', 
        'livros.numeroCopias', 'categorias.nome', 'livros.numPagina', DB::raw('CONCAT(autores.nome, " ", autores.sobrenome) as nomeAutor'))
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

    public function apagar($id, Livro $livro) {
        $id = $livro->biblioteca_id;
        $livros = $livro->id;
    
            if(count($livro->copia) == 0){ 
                $livro->delete();
                return Redirect::route('lista.livros', ['id' => $id])->with('success', 'O Livro Foi Apagado Com Sucesso');
            } else if(count($livro->copia) > 0)
                return Redirect::route('lista.livros', ['id' => $id])->with('error', 'Exclua as Cópias Vinculadas a este Livro!');    
    }
}
