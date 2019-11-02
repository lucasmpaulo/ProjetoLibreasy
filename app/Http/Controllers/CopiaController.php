<?php

namespace App\Http\Controllers;
use Picqer;
use App\Copia;
use App\Livro;
use App\Biblioteca;
use App\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CopiaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }

    public function index($id, Livro $livro) {
        $bibliotecas = Biblioteca::find($id);
        $livros = Livro::find($livro->id);
        $copias = $livros->copia()->paginate(4);
        $user = Auth()->user();
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $livro = $livro->id;
        if(($user->id) == $verify){
            return view('copia.copia', compact('id', 'livro', 'verify', 'copias'));
        }
        return redirect('home');
    }

    public function novo($id, Livro $livro){
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $livro = $livro->id;
        $verify = $bibliotecas->user_id;
        // $label = '412123123312';
        // $barcode_generator =  new Picqer\Barcode\BarcodeGeneratorJPG();
        // $barcode = $barcode_generator->getBarcode($label, $barcode_generator::TYPE_CODE_128);
        if((Auth::user()->id) == $verify){
            return view('copia.novacopia', compact('id', 'livro', 'verify'));
        }
        return redirect('home');
    }

    public function criar ($id, Livro $livro) {
        $copias = new Copia();
        $result = rand(100000, 999999);
        $subt = rand(0, 99);
        if($result == $copias->codigoCopia){
            $copias->codigoCopia = $result - $subt;
            $copias->livro_id = $livro->id;
            $copias->biblioteca_id = $id;
            $copias->status_id = 1;
            $livros = Livro::find($livro->id);
            $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
            $copias->save();
            return Redirect::route('lista.copias', array('id' =>$id, 'livro' => $livro->id))->with('success','Cópia Inserida com Sucesso');  
        } else {
            $copias->codigoCopia = $result;
            $copias->livro_id = $livro->id;
            $copias->biblioteca_id = $id;
            $copias->status_id = 1;
            $livros = Livro::find($livro->id);
            $copias->livro->update(['numeroCopias' => $copias->livro->numeroCopias+1]);
            $copias->save();
            return Redirect::route('lista.copias', array('id' =>$id, 'livro' => $livro->id))->with('success','Cópia Inserida com Sucesso');      
        }   
    }

    public function editar($id, Livro $livro, Copia $copia){
        $bibliotecas = Biblioteca::find($id);
        $status = Status::all();
        $id = $livro->biblioteca_id;
        $livro = $livro->id;
        $copia = $copia->id;
        $lista = Copia::find($copia);
        $verify = $bibliotecas->user_id;
        if(((Auth::user()->id) == $verify) && $bibliotecas->id == $id){
            return view('copia.editarcopia', compact('id', 'livro', 'copia', 'status', 'lista'));
        }
        return Redirect::route('home');
    }

    public function atualizar(Request $request, $id, Livro $livro, Copia $copia) {
        $bibliotecas = Biblioteca::find($id);
        $id = $livro->biblioteca_id;
        $verify = $bibliotecas->user_id;
        if((Auth::user()->id) == $verify){
            $copia->status_id = $request->input('status');
            $copia->save();
        }  
        return Redirect::route('lista.copias', ['id' => $id, 'livro' => $livro])->with('success','A Cópia foi Atualizada com Sucesso');
        
    }

    public function apagar($id, Livro $livro, Copia $copia) {
        $id = $copia->biblioteca_id;
        $livro = $copia->livro_id;
        
        if($copia->status_id == 1){
            $copia->delete();
            $copia->livro->update(['numeroCopias' => $copia->livro->numeroCopias-1]);
            return Redirect::route('lista.copias', ['id' => $id, 'livro' => $livro])->with('success', 'Cópia Excluída com Sucesso');
        } else if($copia->status_id == 2){
            return Redirect::route('lista.copias', ['id' => $id, 'livro' => $livro])->with('error', 'Necessário a Devolução da Cópia Antes de Apagá-la');
        }
        
        
        
    }
}