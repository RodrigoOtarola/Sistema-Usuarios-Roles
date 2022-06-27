

<nav>

    {{--    Muestra la clase active si esta en el home, después de la ? es true : false, ACTIVA
    MENU EN VERDE MIENTRAS SE ESTE EN ESA VIEWS
    --}}
    <a class="{{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}">Inicio</a>
    <a class="{{request()->is('saludo') ? 'active' : ''}}" href="{{route('saludo')}}">Saludo</a>
    <a class="{{request()->is('contacto') ? 'active' : ''}}" href="{{route('saludo.create')}}">Contacto</a>
</nav>
