@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabela-custom m-t-md">
                <div class="card-body">
                <div class="header-custom divisor-cabecalho mb-0">
                    <h3>
                        Bem-Vindo(a) - {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                    </h3>
                </div>
                @if(count($bibliotecas) >  0 )
                <h2 class="text-center mb-0">Bibliotecas Cadastradas no Sistema</h2>
                <div class="card-body fonte-form">
                @if(session()->has('error'))    
                <div class="alert alert-danger text-center">
                    {{ session()->get('error') }}
                </div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                        <div class="card-body fonte-form table-sm">
                            <table class="table table-bordered table-hover" id="tabelabibliotecas">
                                <thead class="thead-light">
                                    {{-- <th>Id</th> --}}
                                    <th>Nome</th>
                                    <th>País</th>   
                                    <th>Operações</th>                              
                                </thead>
                                <tbody class="fonte-tr">
                                    @foreach($bibliotecas as $b)
                                    @if((Auth::user()->id) == $b->user_id)
                                    <tr>
                                        {{-- <td>{{ $b->id }}</td> --}}
                                        <td>{{ $b->nome }}</td>
                                        <td>{{ $b->pais }}</td>
                                        <td class="text-center ">
                                        <button class="btn btn-form dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Operações
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a href="/bibliotecas/mostrarbiblioteca/{{$b->id}}" class="dropdown-item">Acessar</a>
                                                @if((Auth::user()->id) == ($b->user_id))
                                                    <a href="/bibliotecas/editar/{{$b->id}}" class="dropdown-item">Editar</a>
                                                    <a href="/bibliotecas/apagar/{{$b->id}}" onclick="return confirm('Deseja Excluir a Biblioteca?')" class="dropdown-item">Apagar</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right m-b-md btn-align">
                                <a href="/bibliotecas/biblioteca/novo" class="btn btn-form mr-2">Novo Cadastro</a>
                            </div>
                        </div>
                    @else
                    <div class="naoCadastrado">
                        <h2>Nenhuma Biblioteca Cadastrada</h2>
                    </div>
                    <div class="form-group row">
                            <div class="col-12 btn-align mb-4 text-right">
                            <a href="/bibliotecas/biblioteca/novo" class="btn btn-form mr-2">Novo Cadastro</a>
                        </div>
                    </div>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
