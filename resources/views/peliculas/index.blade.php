@extends('templates.template')


@section('contenido')

    <div class="jumbotron">
        <div class="container">
            <h1>Peliculas</h1>
            <p>Administrar Peliculas (Agregar, modificar, eliminar)</p>
        </div>
    </div>

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Principal</a></li>
            <li class="active">Peliculas</li>
        </ol>

        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Genero</th>
                            <th>Director</th>
                            <th>Año</th>
                            <th>Disponibilidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peliculas as $pelicula)
                            <tr>
                                <td>{{$pelicula->nombre}}</td>
                                <td>{{$pelicula->genero}}</td>
                                <td>{{$pelicula->director}}</td>
                                <td>{{$pelicula->año}}</td>
                                <td>{{$pelicula->cantidad}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$peliculas->links()}}
                </div>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-block btn-success" href="{{url('peliculas/registro')}}">
                    <i class="fa fa-plus-square"></i> Agregar nueva pelicula
                </a>
            </div>
        </div>
    </div>


@endsection