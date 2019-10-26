@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom">
                    <h3 class="text-center p-t-md">Atualizar Biblioteca</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/bibliotecas/biblioteca/{{$biblioteca->id}}">
                        @csrf                        
                        <div class="form-group row">
                            <label for="nomeBiblioteca" class="col-md-4 col-form-label text-md-right">{{ __('Nome Biblioteca') }}</label>
                            <div class="col-md-6">
                                <input id="nomeBiblioteca" type="text" class="form-control @error('nomeBiblioteca') is-invalid @enderror" name="nomeBiblioteca" value="{{$biblioteca->nome}}" required autocomplete="nomeBiblioteca" autofocus>
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
                                <input id="nomePaisBiblioteca" type="text" class="form-control @error('nomePaisBiblioteca') is-invalid @enderror" name="nomePaisBiblioteca" value="{{ $biblioteca->pais }}" required autocomplete="nomePaisBiblioteca" autofocus>
                                @error('nomeBiblioteca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-12 btn-align mb-3 text-right">
                                <button type="submit" class="btn btn-form">Salvar</button>
                                <a href="/home" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
