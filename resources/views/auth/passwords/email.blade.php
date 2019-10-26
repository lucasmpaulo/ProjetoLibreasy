@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tabela-custom">
                <div class="divisor-cabecalho header-custom">
                    <h3 class="text-center p-t-md">{{ __('Resetar Senha') }}</h3>
                </div>

                <div class="card-body fonte-form">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-10 btn-align text-right mb-4">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Enviar Link de Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
