@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tabela-custom pb-4 fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center mt-4 p-t-md">Locar</h3>
                </div>

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
                    
                <div class="container ">
                    <div class="row justify-content-center mb-3 fonte-card">
                    @foreach($locacao as $l) 
                        <div class="col-md-5 card-body card fonte-card mt-3 mr-3 mb-3">
                            <p>Locador: <span>{{ $l->locacao->nome_aluno }}</span></p>
                            <p>Locador: <span>{{ $l->livro->titulo }}</span></p>
                        </div>   
                    @endforeach
                    </div>

                    <div class="form-group m-t-md pb-4 row">
                        <div class="col-12 btn-align mb-4 text-right">
                        @if((Auth::user()->id) == $verify)
                            <a href="{{route('novo.livro', ['id' =>$id])}}" class="btn btn-form mr-2 mt">Locar</a>
                        @endif
                            <a href="{{route('lista.bibliotecas', ['id' => $id])}}" class="btn btn-clear">Voltar</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection