@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center mt-2 p-t-md">{{ __('Locar') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('criar.locacao', ['id' => $id, 'copia' => $copia])}}">
                        @csrf

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

                        <div class="form-group row">
                            <label for="nome_locador" class="col-md-4 col-form-label text-md-right"> {{ __('Aluno Locador') }} </label>
                            <div class="col-md-4">
                                <select name="nome_locador" id="nome_locador" class="form-control input-md @error('nome_locador') is-invalid @enderror">
                                @foreach($alunos as $a)
                                    <option value="{{ $a->id}}"> {{$a->nome_aluno}} {{$a->sobrenome_aluno}}</option>
                                @endforeach
                                @error('nome_locador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="data_locacao" class="col-md-4 col-form-label text-md-right">{{ __('Data da Locação') }}</label>
                            <div class="col-md-4">
                                <input id="data_locacao" type="date" class="form-control @error('data_locacao') is-invalid @enderror" name="data_locacao" value="{{ old('data_locacao') }}" required autocomplete="data_locacao" autofocus>
                                @error('data_locacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Locar') }}
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

