@extends('partials.layout')

@section('title','Contacto')

@section('contenido')
    <h2>Ingresa tus datos:</h2>

    {{--    en caso de enviar el formulario bien, se lee el sessión (mensaje correcto) si no realiza la validacion--}}
    @if(session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else

        {{--    Validación de errores--}}
        @include('validaciones.validacionForm')

        <form action="{{route('mensaje.store')}}" method="POST">

            @include('messages.form',[
                'message'=>new App\Models\Message(),
                'showFields' =>auth()->guest()
                ])
            {{--Para mostrar los campos solo si es invitado--}}

        </form>
        <hr>
    @endif
@endsection


