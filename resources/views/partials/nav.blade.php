

<nav>

    {{--    Muestra la clase active si esta en el home, después de la ? es true : false, ACTIVA
    MENU EN VERDE MIENTRAS SE ESTE EN ESA VIEWS
    --}}
    <a class="{{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}">Inicio</a>
    <a class="{{request()->is('saludo') ? 'active' : ''}}" href="{{route('mensaje.index')}}">Saludo</a>
    <a class="{{request()->is('saludo/create') ? 'active' : ''}}" href="{{route('mensaje.create')}}">Contacto</a>
</nav>
