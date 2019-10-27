<?php

namespace App\Http\Controllers;
use App\Copia;
use App\Status;
use App\Locacao;
use App\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LocacaoRequest;
use Illuminate\Support\Facades\Redirect;

class LocacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $bibliotecas = Biblioteca::find($id);
        $id = $bibliotecas->id;
        $verify = $bibliotecas->user_id;
        $livros = $bibliotecas->livro;
        $copia = $livros->copia;
        $lista = Copia::find($copia->id);
        $locacao = $bibliotecas->locacao;
        if ((Auth::user()->id) == $verify) {
            return view('locacao.locacao', compact('id', 'verify', 'lista', 'copia', 'locacao'));
        }
        return Redirect::route('lista.copias', array('id' => $id));
    }

    public function novo($id, Copia $copia)
    {
        $bibliotecas = Biblioteca::find($id);
        $lista = Copia::find($copia->id);
        $status = Status::all();
        $livro = $bibliotecas->livro;
        $alunos = $bibliotecas->aluno;
        $copia = $copia->id;
        $id = $bibliotecas->id;
        if ((Auth::user()->id) == $bibliotecas->user_id) {
            return view('locacao.locar', compact('id', 'status', 'copia', 'alunos', 'lista'));
        }
        return redirect('home');
    }

    public function criar(LocacaoRequest $request, $id, Copia $copia)
    {
        $locacao = new Locacao();
        $bibliotecas = Biblioteca::find($id);
        $data_locacao = $request->get('data_locacao');

        $copia->status_id = 2;
        $copia->save();
        $locacao->aluno_id = $request->get('nome_locador');
        $locacao->livro_id = $copia->livro_id;
        $locacao->copia_id = $copia->id;
        $locacao->biblioteca_id = $bibliotecas->id;
        $locacao->data_locacao = date('Y-m-d', strtotime($data_locacao));
        $locacao->save();
        return Redirect::route('lista.copias', array('id' => $bibliotecas->id, 'livro' => $copia->livro_id))->with('success', 'Cópia Foi Locada com Sucesso');
    }

    public function devolver(Request $request, $id, Copia $copia)
    {
        $bibliotecas = Biblioteca::find($id);
        $atual = new \DateTime();
        $devolucao = Locacao::where('copia_id', $copia->id)->whereNull('data_devolucao')->first();
        if (!$devolucao) {
            return Redirect::route('lista.copias', array('id' => $bibliotecas->id, 'livro' => $copia->livro_id))->with('error', 'Não foi Possível Efetuar Devolução');
        }
        $copia->status_id = 1;
        $copia->save();
        $devolucao->data_devolucao = $atual;
        $devolucao->save();
        return Redirect::route('lista.copias', array('id' => $bibliotecas->id, 'livro' => $copia->livro_id))->with('success', 'Devolução Efetuada');
    }
}
