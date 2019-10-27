@extends('layouts.app')

@section('content')
<div class="container page-container m-b-md">
    <div class="col-md-12">
        <div class="tabela-custom fonte-form">
            <div class="divisor-cabecalho header-custom text-center">
                <h3 class="text-center mt-4 p-t-md">Cópias Cadastradas</h3>
            </div>
            <div class="card-body">
                @if(count($copias) >  0)
                
                @if(session()->has('error'))    
                <div class="alert alert-danger text-center">
                    {{ session()->get('error') }}
                </div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                
                <div class="container ">
                    <div class="row justify-content-center mb-3">
                    @foreach($copias as $c)
                        <div class="col-md-5 card-body card fonte-card mt-3 mr-3 mb-3">
                            <h2 class="card-title text-center divisor-titulo">Dados da Cópia </h2>
                            <p>Código da Cópia: <span>{{ $c->codigoCopia }}</span></p>
                            <p>Título do Livro: <span>{{ $c->livro->titulo }}</span></p>
                            <p>ISBN do Livro: <span>{{ $c->livro->isbn }}</span></p>
                            <p>Status: <span @if ($c->status->id == 1) class="text-success" @endif
                                @if ($c->status->id == 2) class="text-danger" @endif>{{ $c->status->status_atual }}</span></p>                            
                            {{-- 
                            <div style="width:100%;">
                                <p>Código de Barras: <span>{{ $c->barcode }}<img src="data:image/png;base64, {{ base64_encode($barcode)}}"></span></p>
                            </div> --}}
                            @if((Auth::user()->id) == $verify)
                            <div class="text-right  align-middle m-t-md">
                                <button class="btn btn-form btn-align mb-3 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    {{-- <a href="{{ route('editar.copia', ['id' => $id, 'livros' => $c->livro->id, 'copia' => $c->id])}}" class="dropdown-item">Editar</a> --}}
                                    @if($c->status->id == 1)
                                        <a href="{{route ('nova.locacao',['id' => $id, 'copia' => $c->id])}}" class="dropdown-item">Locar Cópia</a>
                                    @elseif($c->status->id == 2)
                                        <a href="{{ route ('devolver.locacao', ['id' => $id, 'copia' => $c->id])}}"
                                            onclick="event.preventDefault(); document.getElementById('devolver-form').submit(); 
                                            return confirm('Deseja Confirmar a Devolução?')" class="dropdown-item">Devolver Cópia
                                        </a>
                                    <form id="devolver-form" action="{{ route ('devolver.locacao', ['id' => $id, 'copia' => $c->id])}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif
                                    <a href="{{ route('apagar.copia', ['id' => $id, 'livros' => $c->livro->id, 'copia' => $c->id])}}" onclick="return confirm('Deseja Excluir Esta Cópia?')" class="dropdown-item">Apagar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                </div>
            @else
            <div class="naoCadastrado">
                <h2>Nenhuma Cópia Cadastrada</h2> 
            </div>
            @endif 
            <div>
                {{ $copias->links() }}
            </div>
            <div class="form-group m-t-md pb-4 row">
                <div class="col-12 btn-align mb-3 text-right">   
                @if((Auth::user()->id) == $verify)
                    <a href="{{route('nova.copia', ['id' =>$id, 'livros' => $livro])}}" class="btn btn-form mr-2 mt">Cadastrar</a>
                @endif
                    <a href="{{route('lista.livros', ['id' => $id])}}" class="btn btn-clear">Voltar</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
