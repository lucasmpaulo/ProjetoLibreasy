@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-sm-12 mb-4">        
            <div class="tabela-custom pb-3 fonte-form"  style="min-height:15em;">
                <div class="header-custom m-t-md">
                    <h3 class="text-center p-t-md">Recursos da Biblioteca</h3>
                </div>
                @auth

                <div class="col-md-12">
                    @if(session()->has('error'))    
                        <div class="alert alert-danger text-center">
                            {{ session()->get('error') }}
                        </div>
                    @elseif(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>

                <form action="{{ route('pesquisar', ['id' => $id]) }}" method="GET">
                <div class="card-body divisor-cabecalho">
                    <div class="card-body form form-inline d-flex justify-content-center">
                        <div class="input-group col-md-3">
                            <select class="custom-select" name="filtro" id="filtro" value="{{old('filtro')}}">
                                <option selected>Selecionar Filtro</option>
                                <option value="categorias">Categorias</option>
                                <option value="titulo">Título do Livro</option>
                                <option value="isbn">ISBN</option>
                                <option value="codigo">Código Livro</option>
                                <option value="nomeautores">Nome do Autor</option>
                                <option value="sobrenomeautores">Sobrenome do Autor</option>
                            </select>
                        </div>
                        <div class="input-group" >
                            <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar Livros">
                            <span class="input-group-btn">
                                <button class="btn btn-clear" type="submit">Pesquisar</button>
                            </span>
                        </div>  
                    </form>  
                        <td>
                            <button class="btn btn-form dropdown-toggle ml-4" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acessar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                {{-- <a href="{{ route('lista.autores', ['id' => $id])}}" class="dropdown-item">Autores</a> --}}
                                <a href="{{ route('lista.alunos', ['id' => $id])}}" class="dropdown-item">Alunos</a>
                            {{-- @if(count($locacao) >  0)   
                                <a href="{{ route('lista.locacao', ['id' => $id])}}" class="dropdown-item">Locações</a>
                            @endif --}}
                                <a href="{{ route('lista.categorias', ['id' => $id])}}" class="dropdown-item">Classificação</a>
                                <a href="{{ route('lista.livros', ['id' => $id])}}" class="dropdown-item">Catálogo de Livros</a>
                                {{-- <a href="{{ route('lista.editoras', ['id' => $id])}}" class="dropdown-item">Editora</a> --}}
                                <a href="{{ route('lista.autores', ['id' => $id])}}" class="dropdown-item">Autores</a>
                                <a href="{{ route('lista.editoras', ['id' => $id])}}" class="dropdown-item">Editora</a>
                            </div>
                        </td>     
                    </div>
                </div>
                <div class="row justify-content-center pb-4 mb-4">
                @forelse($livros as $l)
                    <div class="col-md-5 card-body card fonte-card mt-3 mr-2 mb-3">
                        <p>ISBN: <span>{{ $l->isbn }}</span></p>
                        <p>Código do Livro: <span>{{ $l->codigoLivro }}</span></p>
                        <p>Titulo: <span>{{ $l->titulo }}</span></p>
                        <p>Autor: <span>{{ $l->nome_autor }}</span></p>
                        {{-- <p>Status: <span 
                            @if ($l->status_atual == 'Disponível') class="text-success" @endif
                            @if ($l->status_atual == 'Indisponível') class="text-danger" @endif>
                            {{ $l->status_atual }}
                        </span></p>   --}}
                        <p>N° de Cópias:<span> {{$l->numeroCopias}}</span>
                            <a href="{{ route('lista.copias', ['id' => $id, 'livros' => $l->id])}}" class="btn-form btn-sm ml-2">Cópias</a>
                        </p>
                        <p>Classificação: <span>{{ $l->nome }}</span></p>
                        @if((Auth::user()->id) == $verify)
                        <div class="text-right  align-middle m-t-md">
                            <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Operações
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="{{ route('visualizar.livro', ['id' => $id, 'livros' => $l->id])}}" class="dropdown-item">Ver Mais</a>
                                {{-- @if($l->status_atual == 'Disponível')
                                    <a href="{{route ('nova.locacao',['id' => $id, 'livro' => $l->id])}}" class="dropdown-item">Locar Livro</a>
                                @elseif($l->status_atual == 'Indisponível')
                                    <a href="{{route ('devolver.locacao', ['id' => $id, 'livro' => $l->id])}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('devolver-form').submit();" class="dropdown-item">Devolver Livro
                                    </a>
                                    <form id="devolver-form" action="{{ route ('devolver.locacao', ['id' => $id, 'livro' => $l->id])}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif --}}
                                <a href="{{ route('editar.livro', ['id' => $id, 'livros' => $l->id])}}" class="dropdown-item">Editar</a>
                                <a href="{{ route('apagar.livro', ['id' => $id, 'livros' => $l->id])}}" onclick="return confirm('Deseja Excluir este Livro?')" class="dropdown-item">Apagar</a>
                            </div>
                        </div>
                        @endif
                    </div>
                @empty
                    <h2 class="card-title text-center divisor-titulo">Não Foi Encontrado Nenhum Registro.</h2>
                @endforelse
                </div> 
                <div class="d-flex justify-content-center mb-2">
                    {{ $livros->links() }}
                </div>
                @endauth
                <a href="{{route('home')}}" class="btn btn-clear btn-align mb-4 mr-2" >Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection