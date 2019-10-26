@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tabela-custom fonte-form m-t-md">
                <div class="divisor-cabecalho header-custom">
                    <h3 class="text-center p-t-md">Editando Biblioteca</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar.editora', ['id' => $id , 'editora' => $editora])}}">
                        @csrf       
                        <div class="form-group row">
                            <label for="nomeEditora" class="col-md-4 col-form-label text-md-right">{{ __('Nome da Editora') }}</label>
                            <div class="col-md-6">
                                <input id="nomeEditora" type="text" class="form-control @error('nomeEditora') is-invalid @enderror" value="{{$lista->nome}}" name="nomeEditora" required autofocus>
                                @error('nomeEditora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cidadeEditora" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <input id="cidadeEditora" type="text" class="form-control  @error('cidadeEditora') is-invalid @enderror" value="{{$lista->cidade}}" name="cidadeEditora" required>
                                @error('cidadeEditora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enderecoEditora" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>
                            <div class="col-md-6">
                                <input id="enderecoEditora" type="text" class="form-control @error('enderecoEditora') is-invalid @enderror" value="{{$lista->endereco}}" name="enderecoEditora" required>
                                @error('enderecoEditora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cepEditora" class="col-md-4 col-form-label text-md-right">{{ __('Cep') }}</label>
                            <div class="col-md-6">
                                <input id="cepEditora" type="text" maxlength="9" class="form-control @error('cepEditora') is-invalid @enderror" value="{{$lista->cep}}" name="cepEditora" required>
                                @error('cepEditora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefoneEditora" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>
                            <div class="col-md-6">
                                <input id="telefoneEditora" type="text" class="form-control @error('telefoneEditora') is-invalid @enderror" value="{{$lista->telefone}}" name="telefoneEditora" required>
                                @error('telefoneEditora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                 
                        
                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-form">Salvar</button>
                                <a href="{{route('lista.editoras', ['id' => $id])}}" class="btn btn-clear">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
