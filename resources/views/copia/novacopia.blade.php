@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form m-t-md">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Cadastro de Cópias') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('criar.copia', ['id' => $id , 'livro' => $livro])}}">
                        @csrf
                        <div class="text-center mb-4">
                            {{-- <img src="data:image/png;base64, {{ base64_encode($barcode) }}"> --}}
                            {{-- <h4 style="color:#000;"> {{ $label }} </h4> --}}
                            <h2 class="card-title text-center">Deseja cadastrar uma nova cópia?</h2>
                            <h2 class="card-title text-center">Basta clicar em Cadastrar!</h2>
                        </div>
                        {{-- <div class="form-group row mr-4">
                            <label for="numero_copias" class="col-md-4 col-form-label text-md-right">{{ __('N° de Cópias') }}</label>
                            <div class="col-md-3">
                                <input id="numero_copias" min="0" max="99" maxlength="2" type="text" class="form-control @error('numero_copias') is-invalid @enderror" name="numero_copias" value="{{ old('numero_copias') }}" placeholder="Máximo..: 99">
                                @error('numero_copias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        
                        <div class="form-group row p-b-md mt-4">
                            <div class="col-md-12 text-right btn-align m-b-md">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{ route('lista.livros', ['id' => $id])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
