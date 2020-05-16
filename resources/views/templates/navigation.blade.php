<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                MyBestMovies
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if(!Auth::check())
                <form class="navbar-form navbar-right" method="post" action="{{url('login')}}">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password" required/>
                    </div>
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-sign-in"></i> Sign in
                    </button>
                    <a class="btn btn-info" href="{{url('registro')}}">Registro</a>
                </form>
            @else
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user()->rol == 'administrador')
                        <li><a href="{{url('peliculas')}}">Peliculas</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Bienvenido, {{Auth::user()->nombres}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('usuarios/mis-peliculas')}}">Mis Peliculas</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('logout')}}">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>
            @endif

        </div><!--/.navbar-collapse -->
    </div>
</nav>