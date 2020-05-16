<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compra o Alquiler de Peliculas</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" media="all"/>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" media="all"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" media="all"/>
    @yield('css')
</head>
<body>
@include('templates.navigation')
@yield('contenido')
</body>
<footer>
    @yield('js')
    <script src="{{asset('js/app.js')}}"></script>
</footer>
</html>
