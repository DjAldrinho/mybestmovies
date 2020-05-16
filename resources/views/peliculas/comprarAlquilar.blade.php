@extends('templates.template')


@section('contenido')

    <div class="jumbotron">
        <div class="container">
            <h1>{{ucwords($opcion)}}</h1>
            <p>
                @if($opcion == 'compra')
                    Proceder con la compra de la pelicula: {{$pelicula->nombre}}
                @else
                    Proceder con el alquiler de la pelicula: {{$pelicula->nombre}}
                    <br/>
                    El Aqluiler de esta pelicula solo es por 48 horas, la no devolucion de este producto puede causar
                    demanda y recargos en su cuenta
                @endif
            </p>
        </div>
    </div>

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{'/'}}">Principal</a></li>
            <li id="nombrePelicula">{{$pelicula->nombre}}</li>
            <li class="active">{{ucwords($opcion)}}</li>
        </ol>
        <div class="row">
            <div class="well">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{asset('storage/'.$pelicula->caratula)}}" alt="..." class="media-object">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$pelicula->nombre}}</h4>
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
                            @if($opcion == 'compra')
                                <b>Precio Compra</b>
                                <i>${{$pelicula->precio_compra}} <b>COP</b></i>
                            @else
                                <b>Precio Alquiler</b>
                                <i>${{$pelicula->precio_alquiler}} <b>COP</b></i>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="well">
                <fieldset>
                    <legend>Trailer</legend>
                    <div id="results" class="row">

                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
                <div class="well">
                    <form method="post" action="{{url('confirmar-compra')}}">
                        <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-credit-card"></i>
                                    </span>
                                <select name="metodo_pago"
                                        autofocus required class="form-control"
                                        title="Por favor, seleccione su metodo de pago">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="mastercard">Mastercard</option>
                                    <option value="visa">Visa</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </span>
                                <input type="text" name="numero_cuenta"
                                       placeholder="Ingrese su numero de cuenta"
                                       autofocus required class="form-control"
                                       title="Por favor, ingrese su numero de cuenta"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </span>
                                <input type="text" name="fecha_validacion"
                                       placeholder="Ingrese fecha de validacion"
                                       autofocus required class="form-control"
                                       title="Por favor, ingrese fecha de validacion"/>
                            </div>
                        </div>
                        @if($opcion == 'compra')
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <input type="number" name="cantidad"
                                           placeholder="Ingrese cantidad"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese cantidad"/>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">
                                <i class="fa fa-money"></i> {{ucwords($opcion)}}
                            </button>
                        </div>
                        {!! csrf_field() !!}
                        <input type="hidden" name="opcion_compra" value="{{$opcion}}"/>
                        <input type="hidden" name="pelicula" value="{{$pelicula->id}}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
@endsection