<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('../../css/estilo.css') }}" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- HTML5Shiv -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->
        <title>{{ config('app.name', 'Libreasy') }}</title>
    </head>
<body id="corpo-welcome">

<header>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links navbar-transparente">
                <a href="#" class="float-left ml-4">Libreasy</a>
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Inscreva-se</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>

<div class="content page-welcome home-welcome">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-md-12 ">
                <div class="introducao">
                    <h1 class="mb-4">Sistema Desenvolvido Para Auxiliar o Controle de Bibliotecas de Pequeno Porte ou Pessoais</h1>
                    <a class="btn-custom" href="{{ route('register') }}">Inscreva-se</a>
                </div>
            </div> 
        </div>
    </div>
</div>
<footer id="foter-welcome">
    <div>
        <div class="container">
            <div class="copy ">
                <p>Libreasy &copy; - 2019. Alguns direitos reservados </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
