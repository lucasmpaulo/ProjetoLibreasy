@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabela-custom fonte-form">
                <div class="m-b-md header-custom">
                    <h3 class="text-center p-t-md">Alunos Cadastrados</h3>
                </div>
                @if(count($alunos) > 0)

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

                <form action="{{ route('pesquisar.aluno', ['id' => $id]) }}" method="GET">
                    <div class="card-body divisor-cabecalho">
                        <div class="card-body form form-inline d-flex justify-content-center">
                            <div class="input-group col-md-3">
                                <select class="custom-select" name="filtro" id="filtro" value="{{old('filtro')}}">
                                    <option value="nome_aluno">Nome do Aluno</option>
                                    <option value="sobrenome_aluno">Sobrenome do Aluno</option>
                                    <option value="email_aluno">E-mail do Aluno</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar Alunos">
                            <span class="input-group-btn">
                                <button class="btn btn-clear" type="submit">Pesquisar</button>
                            </span>
                        </div>  
                    </div>
                </form>  
                
                <div class="container ">
                    <div class="row justify-content-center mb-3">
                    @foreach($alunos as $a)
                        <div class="col-md-4 card-body card fonte-card mt-3 mr-3 mb-3">
                            <h2 class="card-title text-center divisor-titulo">Dados do Aluno </h2>
                            <p>Nome: <span>{{ $a->nome_aluno }} {{ $a->sobrenome_aluno }}</span></p>
                            <p>Telefone: <span>{{ $a->telefone_aluno }}</span></p>
                            <p>E-mail: <span>{{ $a->email_aluno }}</span></p>  
                            @if((Auth::user()->id) == $verify)
                            <div class="text-right  align-middle m-t-md">
                                <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{ route('editar.aluno', ['id' => $id, 'aluno' => $a->id])}}" class="dropdown-item">Editar</a>
                                    <a href="{{ route('apagar.aluno', ['id'=> $id, 'aluno' => $a->id])}}" onclick="return confirm('Deseja Excluir o Autor?')" class="dropdown-item">Apagar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                </div>            
                @else
                    <div class="naoCadastrado">
                        <h2 class="mt-2 ml-2">Nenhum Aluno Cadastrado Nesta Biblioteca</h2>
                    </div>
                @endif
                <div>
                    {{ $alunos->links() }}
                </div>
                <div class="form-group pb-4 m-t-md row">
                    <div class="col-12 btn-align mb-4 text-right">
                    @if((Auth::user()->id) == $verify)
                        <a href="{{route('novo.aluno', ['id' =>$id])}}" class="btn btn-form mr-2">Cadastrar</a>
                    @endif
                        <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear">Voltar</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
