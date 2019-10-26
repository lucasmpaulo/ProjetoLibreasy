@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tabela-custom fonte-form">
                <div class="divisor-cabecalho header-custom text-center">
                    <h3 class="text-center p-t-md">{{ __('Atualizando Copia') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar.copia', ['id' => $id, 'livro' => $livro, 'copia' => $copia])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right"> Status </label>
                            <div class="col-md-3">
                                <select name="status" class="form-control input-md">
                                    @foreach($status as $s)
                                        <option value="{{ $s->id }}" @if ($lista->status_id == $s->id) selected = 'selected' @endif> {{ $s->status_atual }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Atualizar Cadastro') }}
                                </button>
                                <a href="{{route('lista.copias', ['id' => $id, 'livro' => $livro ])}}" class="btn btn-clear">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

