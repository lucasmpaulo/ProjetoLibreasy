@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10 m-t-md">
            <div class="tabela-custom">
                <div class="divisor-cabecalho header-custom text-center p-t-md">{{ __('Cadastro de Bibliotecas') }}</div>
                <div class="card-body fonte-form">
                    <form method="POST" action="/bibliotecas/biblioteca">
                        @csrf
                        <div class="form-group row">
                            <label for="nomeBiblioteca" class="col-md-4 col-form-label text-md-right">{{ __('Nome Biblioteca') }}</label>
                            <div class="col-md-6">
                                <input id="nomeBiblioteca" type="text" class="form-control @error('nomeBiblioteca') is-invalid @enderror" name="nomeBiblioteca" value="{{ old('nomeBiblioteca') }}" required autocomplete="nomeBiblioteca" autofocus>
                                @error('nomeBiblioteca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomePaisBiblioteca" class="col-md-4 col-form-label text-md-right">{{ __('País ') }}</label>
                            <div class="col-md-6">
                                <input id="nomePaisBiblioteca" type="text" class="form-control @error('nomePaisBiblioteca') is-invalid @enderror" name="nomePaisBiblioteca" value="{{ old('nomePaisBiblioteca') }}" required autocomplete="nomePaisBiblioteca" autofocus>
                                @error('nomeBiblioteca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-12 btn-align mb-3 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="/home" class="btn btn-clear">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
