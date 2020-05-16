@extends('templates.template')

@section('contenido')
    <div class="jumbotron">
        <div class="container">
            <h1>Mis Peliculas</h1>
        </div>
    </div>

    <div class="container">

        <ol class="breadcrumb">
            <li class="active">Principal</li>
        </ol>

        <!-- Example row of columns -->
        <div class="row">
            @foreach($peliculas as $pelicula)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('storage/'.$pelicula->caratula)}}" alt="...">
                        <div class="caption">
                            <h3>{{$pelicula->nombre}}</h3>
                            <p>{{$pelicula->sinopsis}}</p>
                            <p>
                                <b>Director </b>
                                {{$pelicula->director}}
                            </p>
                            <p>
                                <b>Genero </b>
                                {{$pelicula->genero}}
                            </p>
                            <p>
                                <b>Año </b>
                                {{$pelicula->año}}
                            </p>
                            <p>
                                <b>Opcion Compra</b>
                                {{ucwords($pelicula->pivot->opcion_compra)}}
                            </p>
                            @if($pelicula->pivot->opcion_compra == 'compra')
                                <p>
                                    <b>Cantidad</b>
                                    {{$pelicula->pivot->valor_pagado/$pelicula->precio_compra}}
                                </p>
                            @endif
                            <p>
                                <b>Ref. Pago</b>
                                {{$pelicula->pivot->referencia_pago}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$peliculas->links()}}
        <hr>
        <footer>
            <p>&copy; 2017 Company, Inc.</p>
        </footer>
    </div> <!-- /container -->

@endsection