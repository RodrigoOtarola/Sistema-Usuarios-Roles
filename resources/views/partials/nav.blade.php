<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" href="#">Rodrigo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('mensaje.create')}}">Contacto</a>
            </li>

            <ul class="navbar-nav navbar-right">
                {{--    Validación de escondar menu login, solo para usuarios logeados.--}}
                @if(auth()->guest())


                    <a class="nav-link{{request()->is('login') ? 'active' : ''}}" href="login">Login</a>

                @else(auth()->check())

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mensaje.index')}}">Detalle</a>
                    </li>

                    @if(auth()->user()->hasRoles(['admin']))
                        {{--Si el usuario es admin, permite ver usuarios.--}}
                        <li class="">
                            <a class="nav-link" href="{{route('usuarios.index')}}">Usuarios</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{--    Para cerrar sesion--}}
                            <li><a class="dropdown-item" href="/logout">Cerrar Sesión</a></li>
                            {{--    Para editar información, se debe crear politica de acceso--}}
                            <li><a class="dropdown-item" href="/usuarios/{{auth()->id()}}/edit">Mi perfil</a></li>

                        </ul>
                    </li>
                    {{--                    <a class="nav-link me-auto" href="/logout">Cerrar Sesión</a>--}}
                @endif
            </ul>

        </ul>
    </div>

</nav>


<nav>

    {{--    Muestra la clase active si esta en el home, después de la ? es true : false, ACTIVA
    MENU EN VERDE MIENTRAS SE ESTE EN ESA VIEWS
    --}}


</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
