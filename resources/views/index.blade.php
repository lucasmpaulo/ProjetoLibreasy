<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('../../css/estilo.css') }}" rel="stylesheet">
        <title>{{ config('app.name', 'Libreasy') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                <form class="login" method="POST">
                    <fieldset>
                        <legend class="legend">Login</legend>
                        <div class="input">
                            <input type="email" placeholder="Email" required />
                        <span><i class="fa fa-envelope-o"></i></span>
                        </div>     
                        <div class="input">
                            <input type="password" placeholder="Senha" required />
                        <span><i class="fa fa-lock"></i></span>
                        </div>
                        <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button> 
                    </fieldset>
                </form>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    
                </div>
            </div>
        </div>
        
    </body>
</html>
