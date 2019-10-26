@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center mt-2 p-t-md">{{ __('Cadastro de Livros') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('criar.livro', ['id' => Request::route('id')])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>
                            <div class="col-md-4">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" required autofocus>
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
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required>
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitulo" class="col-md-4 col-form-label text-md-right @error('subtitulo') is-invalid @enderror">{{ __('Subtítulo') }}</label>
                            <div class="col-md-6">
                                <input id="subtitulo" type="text" class="form-control" name="subtitulo" value="{{ old('subtitulo') }}" required>
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
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" maxlength="150" rows="5" cols="10" value="{{ old('descricao') }}"></textarea>
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
                                <input id="anolivro" type="text" class="form-control col-sm-3 @error('anolivro') is-invalid @enderror" maxlength="4" name="anolivro" value="{{ old('anolivro') }}" required>
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
                                <input id="numpagina" type="text" class="form-control col-sm-3 @error('numpagina') is-invalid @enderror" maxlength="4" name="numpagina" value="{{ old('numpagina') }}" required>
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
                                <input id="edicao" type="text" class="form-control col-sm-3 @error('edicao') is-invalid @enderror" name="edicao" value="{{ old('edicao') }}" required>
                                @error('edicao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="autor_id" class="col-md-4 col-form-label text-md-right"> Autor(a) </label>
                            <div class="col-md-3">
                                <select name="autor_id" class="form-control input-md @error('autor_id') is-invalid @enderror">
                                    @foreach($autores as $aut)
                                        <option value="{{ $aut->id }}"> {{ $aut->nome}} {{ $aut->sobrenome}}</option>
                                    @endforeach
                                </select>
                                @error('autor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <a href="/bibliotecas/biblioteca/{{$id}}/autor/novo" class="btn btn-clear mr-2" target="_blank">Cadast. Autor</a>
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right"> Status </label>
                            <div class="col-md-3">
                                <select name="status_id" class="form-control input-md @error('status_id') is-invalid @enderror">
                                    @foreach($status as $s)
                                        <option value="{{ $s->id }}"> {{ $s->status_atual}} </option>
                                    @endforeach
                                </select>
                                @error('autor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right"> Categoria </label>
                            <div class="col-md-3">
                                <select name="categoria_id" class="form-control input-md @error('categoria_id') is-invalid @enderror">
                                    @foreach($categorias as $c)
                                        <option value="{{ $c->id }}">{{ $c->nome}}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('nova.categoria', ['id' =>$id])}}" class="btn btn-clear mr-2" target="_blank">Cadast. Categoria</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="editora_id" class="col-md-4 col-form-label text-md-right"> Editoras </label>
                            <div class="col-md-3">
                                <select name="editora_id" id="editora_id" class="form-control input-md @error('editora_id') is-invalid @enderror">
                                    @foreach($editoras as $edi)
                                        <option value="{{ $edi->id }}"> {{ $edi->nome }}</option>
                                    @endforeach
                                </select>
                                @error('editora_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('nova.editora', ['id' =>$id])}}" class="btn btn-clear mr-2" target="_blank">Cadast. Editora</a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Cadastrar Livro') }}
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

