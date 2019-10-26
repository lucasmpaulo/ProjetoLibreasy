@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Atualizando Autor') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar.autor', ['id' => $id , 'autor' => $autores])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="nomeAutor" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nomeAutor" type="text" class="form-control @error('nomeAutor') is-invalid @enderror" name="nomeAutor" value="{{$lista->nome}}" required>
                                @error('nomeAutor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sobrenomeAutor" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome') }}</label>
                            <div class="col-md-6">
                                <input id="sobrenomeAutor" type="text" class="form-control @error('sobrenomeAutor') is-invalid @enderror" name="sobrenomeAutor" value="{{$lista->sobrenome}}"  required autocomplete="sobrenomeAutor">
                                @error('sobrenomeAutor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paisAutor" class="col-md-4 col-form-label text-md-right">{{ __('País ') }}</label>
                            <div class="col-md-6">
                                <input id="paisAutor" type="text" class="form-control @error('paisAutor') is-invalid @enderror" name="paisAutor" value="{{$lista->pais}}" required autocomplete="pais">
                                @error('paisAutor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição do Autor ') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="5" cols="10">{{$lista->descricao}}</textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anoNascimento" class="col-md-4 col-form-label text-md-right">{{ __('Ano de Nascimento ') }}</label>
                            <div class="col-md-6">
                                <input id="anoNascimento" type="text" class="form-control col-sm-3 @error('anoNascimento') is-invalid @enderror" maxlength="4" name="anoNascimento" value="{{$lista->anonascimento}}"  required>
                                @error('anoNascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anoMorte" class="col-md-4 col-form-label text-md-right">{{ __('Ano de Falecimento ') }}</label>
                            <div class="col-md-6">
                                <input id="anoMorte" type="text" class="form-control col-sm-3 @error('anoMorte') is-invalid @enderror" maxlength="4" name="anoMorte" value="{{$lista->anomorte}}">
                                @error('anoMorte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-md row">
                            <div class="col-12 btn-align mb-4 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Salvar') }}
                                </button>
                                <a href="{{route('lista.autores', ['id' => $id])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
