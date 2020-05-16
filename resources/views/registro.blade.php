@extends('templates.template')


@section('contenido')
    <div class="jumbotron">
        <div class="container">
            <h1>Registro de usuarios</h1>
            <p>Suscribase para que pueda obtener todo los beneficios de nuestro servicio</p>
        </div>
    </div>

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{'/'}}">Principal</a></li>
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
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input type="email" name="email" placeholder="Ingrese su correo"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese su correo"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" placeholder="Ingrese su contraseña"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese su contraseña"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password_confirmation"
                                           placeholder="Confirme su contraseña"
                                           autofocus required class="form-control"
                                           title="Por favor, Confirme su contraseña"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nombres"
                                           placeholder="Ingrese su nombre completo"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese su nombre completo"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-drivers-license-o"></i>
                                    </span>
                                    <input type="text" name="identificacion"
                                           placeholder="Ingrese su identificacion"
                                           autofocus required class="form-control"
                                           title="Por favor, ingrese su identificacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <span>Al registrarse automaticamente, acepta nuestros terminos y condiciones</span>
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