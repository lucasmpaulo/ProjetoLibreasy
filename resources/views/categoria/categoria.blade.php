@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom">
                    <h3 class="text-center mt-4 p-t-md">Classificações Cadastradas</h3>
                </div> 
                <div class="card-body">
                    @if(count($categorias) >  0)
                   
                    @if(session()->has('error'))    
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                    @elseif(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                     
                    <table class="table table-bordered table-striped table-hover" id="tabelacategoria">
                        <thead class="text-center">
                            {{-- <th>Id</th> --}}
                            <th>Nome</th>
                            <th>Operações</th>     
                        </thead>
                        <tbody>    
                            @foreach($categorias as $c)
                            <tr class="text-center">
                                {{-- <td>{{ $c->id }}</td> --}}
                                <td>{{ $c->nome }}</td>
                                <td>
                                @if((Auth::user()->id) == $verify)
                                    <a href="{{route('apagar.categoria', ['id' =>$id, 'categoria' => $c->id])}}" onclick="return confirm('Deseja Excluir a Categoria?')" class="btn btn-clear btn-sm">Apagar</a>
                                @else  
                                    <p class="mt-3">Não Disponível</p>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="naoCadastrado">
                    <h2>Nenhuma Classificação Cadastrada</h2> 
                </div>
                @endif 
                <div>
                    {{ $categorias->links() }}
                </div>
                <div class="form-group pb-4 m-t-md row">
                    <div class="col-12 btn-align mb-4 text-right">
                    @if((Auth::user()->id) == $verify)
                        <a href="{{route('nova.categoria', ['id' =>$id])}}" class="btn btn-form mr-2">Cadastrar</a>
                    @endif
                        <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear">Voltar</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
