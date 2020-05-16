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
            <li><a href="{{'/'}}">Principal</a></li>
            <li><a href="{{url('peliculas')}}">Peliculas</a></li>
            <li class="active">Registro</li>
        </ol>

        <div class="row">
            <div class="col-md-8">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
                <div class="well">
                    <fieldset>
                        <legend>Datos de usuario</legend>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-youtube-play"></i>
                                    </span>
                                    <input type="text" name="nombre" placeholder="Ingrese un nombre"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese un nombre"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <select name="genero" class="form-control" required>
                                        <option value="Accion">Acción</option>
                                        <option value="Comedia">Comedia</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Suspenso">Suspenso</option>
                                        <option value="Terror">Terror</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </span>
                                    <input type="text" name="año" placeholder="Ingrese un año"
                                           required class="form-control"
                                           title="Por favor, ingrese un año"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="director" placeholder="Ingrese el nombre del director"
                                           required class="form-control"
                                           title="Por favor, ingrese un director"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-dollar"></i>
                                    </span>
                                    <input type="number" name="precio_alquiler" placeholder="Precio de Alquiler"
                                           required class="form-control"
                                           title="Por favor, ingrese un valor"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-dollar"></i>
                                    </span>
                                    <input type="number" name="precio_compra" placeholder="Precio de Compra"
                                           required class="form-control"
                                           title="Por favor, ingrese un valor"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-line-chart"></i>
                                    </span>
                                    <input type="number" name="cantidad" placeholder="Cantidad disponible"
                                           required class="form-control"
                                           title="Por favor, ingrese un valor"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <textarea class="form-control" name="sinopsis" placeholder="Sinopsis de la pelicula"
                                              style="resize: none"
                                              required>

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-file-image-o"></i>
                                    </span>
                                    <input type="file" name="caratula" required title="Por favor, suba una caratula"/>
                                    Seleccionar caratula
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    <i class="fa fa-sign-in"></i> Registro
                                </button>
                            </div>
                            {!! csrf_field() !!}
                        </form>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-4">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection

