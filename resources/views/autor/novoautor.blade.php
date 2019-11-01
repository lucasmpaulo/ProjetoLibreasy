@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center mt-4 p-t-md">{{ __('Catalogação de Autores') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('criar.autor', ['id' => Request::route('id')])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="nomeAutor" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nomeAutor" type="text" class="form-control @error('nomeAutor') is-invalid @enderror" name="nomeAutor" value="{{ old('nomeAutor') }}" required autocomplete="nomeAutor" autofocus>
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
                                <input id="sobrenomeAutor" type="text" class="form-control @error('sobrenomeAutor') is-invalid @enderror" name="sobrenomeAutor" value="{{ old('sobrenomeAutor') }}" required autocomplete="sobrenomeAutor">
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
                                <input id="paisAutor" type="text" class="form-control @error('paisAutor') is-invalid @enderror" name="paisAutor" value="{{ old('paisAutor') }}" required autocomplete="paisAutor">
                                @error('paisAutor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição do Autor') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" maxlength="150" name="descricao" rows="5" cols="10" value="">{{ old('descricao') }}</textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anoNascimento" class="col-md-4 col-form-label text-md-right">{{ __('Ano de Nascimento') }}</label>
                            <div class="col-md-6">
                                <input id="anoNascimento" type="text" class="form-control col-sm-3 @error('anoNascimento') is-invalid @enderror" maxlength="4" name="anoNascimento" value="{{ old('anoNascimento') }}" required>
                                @error('anoNascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anoMorte" class="col-md-4 col-form-label text-md-right">{{ __('Ano de Falecimento') }}</label>
                            <div class="col-md-6">
                                <input id="anoMorte" type="text" class="form-control col-sm-3 @error('anoMorte') is-invalid @enderror"  maxlength="4" name="anoMorte" value="{{ old('anoMorte') }}">
                                @error('anoMorte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="biblioteca_id" id="biblioteca_id" value="{{$id}}">

                        <div class="form-group m-t-md row">
                            <div class="col-12 btn-align mb-4 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Cadastrar') }}
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
