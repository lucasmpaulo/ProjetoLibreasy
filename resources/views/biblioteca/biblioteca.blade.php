@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card fonte-form">
                @auth
                <div class="card-header header-custom">
                    <h3 class="text-center">Bibliotecas Cadastrada</h3>
                </div>
                <div class="card-body">
               
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover" id="tabelabibliotecas">
                                <thead class="text-center">
                                    {{-- <th>Id</th> --}}
                                    <th>Nome</th>
                                    <th>País</th>   
                                    <th>Operações</th>                              
                                </thead>
                                <tbody class="text-center">
                                    @foreach($bibliotecas as $b)
                                    <tr>
                                        {{-- <td>{{ $b->id }}</td> --}}
                                        <td>{{ $b->nome }}</td>
                                        <td>{{ $b->pais }}</td>
                                        <td class="text-center">
                                            <a href="/bibliotecas/mostrarbiblioteca/{{$b->id}}" class="btn btn-form de-block">Acessar</a>
                                        @if((Auth::user()->id) == ($b->user_id))
                                            <a href="{{ route('editar.autor', ['id' => $id], ['autor' => $autorid])}}" class="btn btn-form de-block">Editar</a>
                                            <a href="/bibliotecas/apagar/{{$b->id}}" class="btn btn-clear de-block">Apagar</a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                        <div>
                            {{ $lista->links() }}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right mb-0">
                                <a href="/bibliotecas/biblioteca/novo" class="btn btn-form mr-2">Cadastrar Editora</a>
                                <a href="/home" class="btn btn-clear">Voltar</a>
                            </div>
                        </div>
                    @else
                @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
