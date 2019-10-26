@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form ">
                <div class="header-custom divisor-cabecalho m-t-md">
                    <h3 class="text-center p-t-md">{{ __('Atualizar Perfil') }}</h3>
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('atualizar.perfil', ['id' => $id])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$perfil->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$perfil->lastname}}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control @error('email') is-invalid @enderror" name="cidade" value="{{$perfil->cidade}}" required autocomplete="cidade">

                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{$perfil->endereco }}" required autocomplete="endereco" autofocus>
                                @error('endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" value="{{$perfil->bairro}}" name="bairro" required autocomplete="bairro">

                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('Cep') }}</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" value="{{$perfil->cep}}" class="form-control" name="cep" required autocomplete="cep">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right mb-0">
                                <button type="submit" class="btn btn-form mr-2">
                                    {{ __('Atualizar') }}
                                </button>
                                <a href="{{route('home')}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
