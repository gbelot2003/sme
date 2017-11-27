{{--
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Track de cuentas</div>
                    <div class="panel-body">
                        <p>Introdusca los datos de busqueda</p>

                        <form id="formSearch" class="form">
                            {{--Codigo de Banco--}}
                            <div class="form-group">
                                <label for="codigo">Código de Banco</label>
                                <input type="number" class="form-control" id="codigo" placeholder="Código de Banco">
                            </div>

                            {{--No. de cuenta--}}
                            <div class="form-group">
                                <label for="cuenta">No. de Cuenta</label>
                                <input type="number" class="form-control" id="cuenta" placeholder="No. de Cuenta">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>
                        </form>
                    </div>


                </div>
            </div>
            <div class="col-md-8">
                <div id="contenido">
                    <img src="/images/SLIDER8.png" class="img-responsive" alt="SLIDER8.png">
                </div>
            </div>
        </div>
    </div>
@endsection
