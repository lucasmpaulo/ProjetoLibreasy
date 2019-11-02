@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-sm-12 mb-4">        
            <div class="tabela-custom pb-3 fonte-form"  style="min-height:15em;">
                <div class="container ">
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-8 card-body card fonte-card mt-3 mr-3 mb-3">
                            <h2 class="card-title text-center divisor-titulo">Detalhes do Livro </h2>
                            {{-- <p>ID: <span>{{ $l->id }}</span></p> --}}
                            <p> 
                                ISBN: <span class="mr-3">{{ $lista->isbn }}</span>
                                Código do Livro: <span class="mr-3">{{ $lista->codigoLivro }}</span>
                                Num. Páginas: <span>{{ $lista->numPagina }}</span>
                            </p>
                            {{-- <p>Código do Livro: <span>{{ $lista->codigoLivro }}</span></p> --}}
                            <p>Titulo: <span class="mr-4">{{ $lista->titulo }}</span>Subtitulo: <span>{{ $lista->subtitulo }}</span></p>
                            {{-- <p>Subtitulo: <span>{{ $lista->subtitulo }}</span></p> --}}
                            <p>Descrição: <span>{{ $lista->descricao }}</span></p>
                            <p>
                                Ano do Livro: <span class="mr-4">{{ $lista->anoLivro }}</span>
                                {{-- Status: <span style="margin-right:1em;"
                                            @if ($lista->status->status_atual == 'Disponível') class="text-success" @endif
                                            @if ($lista->status->status_atual == 'Indisponível') class="text-danger" @endif>{{ $lista->status->status_atual }}
                                        </span> --}}
                                N° de Exemplares:<span> {{$lista->numeroCopias}}</span>
                                <a href="{{ route('lista.copias', ['id' => $id, 'livros' => $lista->id])}}" class="btn-form btn-sm ml-2">Cópias</a>
                            </p>  
                            {{-- <p>Status: <span 
                                @if ($lista->status->status_atual == 'Disponível') class="text-success" @endif
                                @if ($lista->status->status_atual == 'Indisponível') class="text-danger" @endif>
                                {{ $lista->status->status_atual }}
                            </span></p>             --}}
                            {{-- <p>N° de Cópias:<span> {{$lista->numeroCopias}}</span>
                                <a href="{{ route('lista.copias', ['id' => $id, 'livros' => $lista->id])}}" class="btn-form btn-sm ml-2">Cópias</a>
                            </p> --}}
                            <p>
                                Edição: <span class="mr-4">{{ $lista->edicao}}</span>
                                Nome do(a) Autor(a): <span style="text-transform:capitalize;">{{ $lista->autores->nome }} {{$lista->autores->sobrenome}}</span>
                            </p>
                            {{-- <p>Nome do(a) Autor(a): <span style="text-transform:capitalize;">{{ $lista->autores->nome }} {{$lista->autores->sobrenome}}</span></p> --}}
                            <p>
                                Nome da Editora: <span class="mr-4">{{ $lista->editora->nome}}</span>
                                Classificação: <span>{{ $lista->categoria->nome }}</span>
                            </p>
                            {{-- <p>Nome Categoria: <span>{{ $lista->categoria->nome }}</span></p> --}}
                            {{-- <p>Num. Páginas: <span>{{ $lista->numPagina }}</span></p> --}}
                            @if((Auth::user()->id) == $verify)
                            <div class="text-right  align-middle m-t-md">
                                <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{ route('editar.livro', ['id' => $id, 'livros' => $livro])}}" class="dropdown-item">Editar</a>
                                    <a href="{{ route('apagar.livro', ['id' => $id, 'livros' => $livro])}}" onclick="return confirm('Deseja Excluir este Livro?')" class="dropdown-item">Apagar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div> 
            <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear btn-align mb-4 mr-2" >Voltar</a>
        </div>
    </div>
</div>
@endsection