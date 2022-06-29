<nav>

    {{--    Muestra la clase active si esta en el home, después de la ? es true : false, ACTIVA
    MENU EN VERDE MIENTRAS SE ESTE EN ESA VIEWS
    --}}
    <a class="{{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}">Inicio</a>
    <a class="{{request()->is('mensaje') ? 'active' : ''}}" href="{{route('mensaje.index')}}">Saludo</a>
    <a class="{{request()->is('mensaje/create') ? 'active' : ''}}" href="{{route('mensaje.create')}}">Contacto</a>

    {{--    Validación de escondar menu login, solo para usuarios logeados.--}}
    @if(auth()->guest())
        <a class="{{request()->is('login') ? 'active' : ''}}" href="login">Login</a>
    @endif

    {{--    Para cerrar sesion--}}
    @if(auth()->check())
        <a href="/logout">Cerrar Sesión</a>
    @endif
</nav>
