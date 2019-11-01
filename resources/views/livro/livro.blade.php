@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabela-custom fonte-form">
                <div class="header-custom text-center">
                    <h3 class="text-center mt-4 p-t-md">Livros Cadastrados</h3>
                </div>
                
                @if(count($livros) >  0)
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
                                <option value="categorias">Classificação</option>
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
                    </div>
                </div>
                    
                <div class="container ">
                    <div class="row justify-content-center mb-3">
                    @foreach($livros as $l)
                        <div class="col-md-5 card-body card fonte-card mt-3 mr-3 mb-3">
                            <h2 class="card-title text-center divisor-titulo">Dados do Livro </h2>
                            <p>ISBN: <span>{{ $l->isbn }}</span></p>
                            <p>Código do Livro: <span>{{ $l->codigoLivro }}</span></p>
                            <p>Titulo: <span>{{ $l->titulo }}</span></p>
                            <p>Classificação: <span>{{ $l->categoria->nome }}</span></p>
                            <p>N° de Cópias:<span> {{$l->numeroCopias}}</span>
                                <a href="{{ route('lista.copias', ['id' => $id, 'livros' => $l->id])}}" class="btn-form btn-sm ml-2">Cópias</a>
                            </p>
                            @if((Auth::user()->id) == $verify)
                            <div class="text-right  align-middle m-t-md">
                                <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{ route('visualizar.livro', ['id' => $id, 'livros' => $l->id])}}" class="dropdown-item">Ver Mais</a>
                                    <a href="{{ route('editar.livro', ['id' => $id, 'livros' => $l->id])}}" class="dropdown-item">Editar</a>
                                    <a href="{{ route('apagar.livro', ['id' => $id, 'livros' => $l->id])}}" onclick="return confirm('Deseja Excluir este Livro?')" class="dropdown-item">Apagar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                </div>
                @else
                <div class="naoCadastrado m-t-md">
                    <h2 class="mt-2 ml-2">Nenhum Livro Cadastrado</h2>
                </div>
                @endif  
                <div>
                    {{ $livros->links() }}
                </div>
                <div class="form-group m-t-md pb-4 row">
                    <div class="col-12 btn-align mb-4 text-right">
                    @if((Auth::user()->id) == $verify)
                        <a href="{{route('novo.livro', ['id' =>$id])}}" class="btn btn-form mr-2 mt">Cadastrar</a>
                    @endif
                        <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear">Voltar</a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection