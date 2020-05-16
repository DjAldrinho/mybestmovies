@extends('templates.template')


@section('contenido')
    <div class="jumbotron">
        <div class="container">
            <h1>Comprar o alquilar peliculas</h1>
            <p>Lista de peliculas a disposicion para alquilar o comprar</p>
        </div>
    </div>

    <div class="container">

        <ol class="breadcrumb">
            <li class="active">Principal</li>
        </ol>

        <!-- Example row of columns -->
        <div class="row">
            @if(isset($peliculas))
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
                                @if(Auth::check())
                                    <p>
                                        <a href="{{url('peliculas', ['alquiler', Crypt::encrypt($pelicula->id)])}}"
                                           class="btn btn-warning"
                                           role="button">
                                            <i class="fa fa-money"></i> Alquiler
                                        </a>
                                        <a href="{{url('peliculas', ['compra', Crypt::encrypt($pelicula->id)])}}"
                                           class="btn btn-danger" role="button">
                                            <i class="fa fa-gift"></i> Compra
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
        {{$peliculas->links()}}
        <hr>

        <footer>
            <p>&copy; 2017 Company, Inc.</p>
        </footer>
    </div> <!-- /container -->

@endsection