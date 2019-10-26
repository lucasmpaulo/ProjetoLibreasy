@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabela-custom fonte-form">
                <div class=" header-custom">
                    <h3 class="text-center m-b-md p-t-md">Autores Cadastrados</h3>
                </div>
                @if(count($autores) > 0)

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

                <form action="{{ route('pesquisar.autor', ['id' => $id]) }}" method="GET">
                    <div class="card-body divisor-cabecalho">
                        <div class="card-body form form-inline d-flex justify-content-center">
                            <div class="input-group col-md-3">
                                <select class="custom-select" name="filtro" id="filtro" value="{{old('filtro')}}">
                                    <option value="nomeautores">Nome do Autor</option>
                                    <option value="sobrenomeautores">Sobrenome do Autor</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar Autores">
                            <span class="input-group-btn">
                                <button class="btn btn-clear" type="submit">Pesquisar</button>
                            </span>
                        </div>  
                    </div>
                </form>  
                
                
                <div class="container">
                    <div class="row justify-content-center mb-3">
                    @foreach($autores as $a)
                        <div class="col-md-5 card-body card fonte-card mt-3 mr-3 mb-3">
                            <h2 class="card-title text-center divisor-titulo">Dados do Autor </h2>
                            {{-- <p>ID: <span>{{ $a->id }}</span></p> --}}
                            <p>Nome: <span>{{ $a->nome }} {{ $a->sobrenome }}</span></p>
                            <p>País: <span>{{ $a->pais }}</span></p>
                            <p>Descrição: <span>{{ $a->descricao }}</span></p>
                            <p>Ano de Nascimento: <span>{{ $a->anonascimento }}</span></p>  
                            <p>Ano de Falecimento: <span>{{ $a->anomorte }}</span></p>
                            @if((Auth::user()->id) == $verify)
                            <div class="text-right  align-middle m-t-md">
                                <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{ route('editar.autor', ['id' => $id, 'autor' => $a->id])}}" class="dropdown-item">Editar</a>
                                    <a href="{{ route('apagar.autor', ['id'=> $id, 'autor' => $a->id])}}" onclick="return confirm('Deseja Excluir o Autor?')" class="dropdown-item">Apagar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                </div>         
                @else
                    <div class="naoCadastrado">
                        <h2 class="mt-2 ml-2">Nenhum Autor Cadastrado Nesta Biblioteca</h2>
                    </div>
                @endif
                <div>
                    {{ $autores->links() }}
                </div>
                <div class="form-group pb-4 m-t-md row">
                    <div class="col-12 btn-align mb-4 text-right">
                    @if((Auth::user()->id) == $verify)
                        <a href="/bibliotecas/biblioteca/{{$id}}/autor/novo" class="btn btn-form mr-2">Cadastrar</a>
                    @endif
                        <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear">Voltar</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
