<?php


namespace App\Http\Controllers;


use App\Categoria;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Redirect;
use PDOException;

class CategoriaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index($id) {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $user = Auth()->user();
        $verify = $bibliotecas->user_id;
        // $categorias= Categoria::where('biblioteca_id', $id )->paginate(1);
        $categorias = $bibliotecas->categoria()->paginate(5);
        if(($user->id) == $verify){
            return view('categoria.categoria', ['id' => $id, 'categorias' => $categorias, 'verify' => $verify]);
        }
        return redirect('home');
    }


    public function novo($id){
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view ('categoria.novacategoria', compact('id'));
        }
        return redirect('home');
    }

    public function criar(CategoriaRequest $request, $id) {
        $bibliotecas = Biblioteca::find($id);
        $categoria = new Categoria();
        $id = $bibliotecas->id;
        $user = auth()->user();
        $categoria->nome = $request->input('nomeCategoria');
        $categoria->biblioteca_id = $id;
        $categoria->user_id = $user->id;
        $categoria->save();
        return Redirect::route('lista.categorias', array('id' => $id))->with('success', 'Classificação Cadastrada com Sucesso');
    }

    public function apagar($id, Categoria $categoria) {
        $id = $categoria->biblioteca_id;
        $categorias = $categoria->id;
        try{
            $categoria->delete();
            return Redirect::route('lista.categorias', ['id' => $id, 'categoria' => $categorias])->with('success', 'Classificação Excluída com Sucesso');
        } catch (PDOException $e){
            return Redirect::route('lista.categorias', ['id' => $id, 'categoria' => $categorias])->with('error', 'Remova o(s) Livro(s) Vinculado(s) a Esta Classificação');
        }
        
    }
}
