@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Atualizando Aluno') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar.aluno', ['id' => $id, 'aluno' => $aluno])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="nome_aluno" class="col-md-4 col-form-label text-md-right">{{ __('Nome Aluno') }}</label>
                            <div class="col-md-3">
                                <input id="nome_aluno" type="text" class="form-control @error('nome_aluno') is-invalid @enderror" name="nome_aluno" value="{{ $lista->nome_aluno }}" required autocomplete="nome_aluno" autofocus>
                                @error('nome_aluno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="sobrenome_aluno" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome Aluno') }}</label>
                            <div class="col-md-3">
                                <input id="sobrenome_aluno" type="text" class="form-control @error('sobrenome_aluno') is-invalid @enderror" name="sobrenome_aluno" value="{{ $lista->sobrenome_aluno }}" required autocomplete="sobrenome_aluno" autofocus>
                                @error('sobrenome_aluno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone_aluno" class="col-md-4 col-form-label text-md-right">{{ __('Telefone Aluno') }}</label>
                            <div class="col-md-3">
                                <input id="telefone_aluno" type="text" class="form-control @error('telefone_aluno') is-invalid @enderror" name="telefone_aluno" value="{{ $lista->telefone_aluno }}" required autocomplete="telefone_aluno" autofocus>
                                @error('telefone_aluno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_aluno" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Aluno') }}</label>
                            <div class="col-md-3">
                                <input style="text-transform:none;" id="email_aluno" type="email" class="form-control @error('email_aluno') is-invalid @enderror" name="email_aluno" value="{{ $lista->email_aluno }}" required autocomplete="email_aluno" autofocus>
                                @error('email_aluno')
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
                                    {{ __('Atualizar') }}
                                </button>
                                <a href="{{route('lista.alunos', ['id' => $id])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
