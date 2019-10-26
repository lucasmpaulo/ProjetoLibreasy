@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Atualizando Livros') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar.livro', ['id' => $id , 'livro' => $livro])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>
                            <div class="col-md-3">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{$lista->isbn}}" required autofocus>
                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$lista->titulo}}" required>
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitulo" class="col-md-4 col-form-label text-md-right">{{ __('Subtítulo') }}</label>
                            <div class="col-md-6">
                                <input id="subtitulo" type="text" class="form-control @error('subtitulo') is-invalid @enderror" name="subtitulo" value="{{$lista->subtitulo}}" required>
                                @error('subtitulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição do Livro ') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" maxlength="150" rows="5" cols="10">{{$lista->descricao}}</textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anolivro" class="col-md-4 col-form-label text-md-right">{{ __('Ano do Livro ') }}</label>
                            <div class="col-md-6">
                                <input id="anolivro" type="text" class="form-control col-sm-3 @error('anolivro') is-invalid @enderror"" pattern="[0-9]+" maxlength="4" name="anolivro" value="{{$lista->anoLivro}}" required>
                                @error('anolivro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numpagina" class="col-md-4 col-form-label text-md-right">{{ __('Número de Páginas ') }}</label>
                            <div class="col-md-6">
                                <input id="numpagina" type="text" class="form-control col-sm-3 @error('numpagina') is-invalid @enderror" pattern="[0-9]+" maxlength="5" name="numpagina" value="{{$lista->numPagina}}" required>
                                @error('numpagina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="edicao" class="col-md-4 col-form-label text-md-right">{{ __('Edição ') }}</label>
                            <div class="col-md-6">
                                <input id="edicao" type="text" class="form-control col-sm-3 @error('edicao') is-invalid @enderror" name="edicao" value="{{$lista->edicao}}" required>
                                @error('edicao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right"> Status </label>
                            <div class="col-md-3">
                                <select name="status" class="form-control input-md">
                                    @foreach($status as $s)
                                        <option value="{{ $s->id }}" @if ($lista->status_id == $s->id) selected = 'selected' @endif> {{ $s->status_atual }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="autor_id" class="col-md-4 col-form-label text-md-right"> Autores </label>
                            <div class="col-md-3">
                                <select name="autor_id" id="autor_id" class="form-control input-md">
                                    @foreach($autores as $aut)
                                        <option value="{{ $aut->id }}" @if ($lista->autor_id == $aut->id) selected = 'selected' @endif> {{ $aut->nome}} {{ $aut->sobrenome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right"> Categorias </label>
                            <div class="col-md-3">
                                <select name="categoria_id" id="autor_id" class="form-control input-md">
                                    @foreach($categorias as $c)
                                        <option value="{{ $c->id }}" @if ($lista->categoria_id == $c->id) selected = 'selected' @endif>{{ $c->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="editora_id" class="col-md-4 col-form-label text-md-right"> Editoras </label>
                            <div class="col-md-3">
                                <select name="editora_id" id="editora_id" class="form-control input-md">
                                    @foreach($editoras as $edi)
                                        <option value="{{ $edi->id }}" @if ($lista->editora_id == $edi->id) selected = 'selected' @endif> {{ $edi->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Atualizar Cadastro') }}
                                </button>
                                <a href="{{route('lista.livros', ['id' => $id])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

