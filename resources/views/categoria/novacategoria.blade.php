@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form m-t-md">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Cadastro de Classificação') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('criar.categoria', ['id' => Request::route('id')])}}">
                        @csrf
                        <div class="form-group row mr-4">
                            <label for="nomeCategoria" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nomeCategoria" type="text" class="form-control @error('nomeCategoria') is-invalid @enderror" name="nomeCategoria" value="{{ old('nomeCategoria') }}" placeholder="Ex..: Romance, Terror.." required autofocus>
                                @error('nomeCategoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row m-t-md p-b-md">
                            <div class="col-md-12 text-right btn-align m-b-md">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{ route('lista.categorias', ['id' => $id])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
