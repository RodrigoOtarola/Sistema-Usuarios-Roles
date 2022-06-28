@extends('partials.layout')

@section('title','Contacto')

@section('contenido')
    <h2>Hola desde contacto.</h2>

    {{--    en caso de enviar el formulario bien, se lee el sessión (mensaje correcto) si no realiza la validacion--}}
    @if(session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else

        {{--    Validación de errores--}}
        @include('validaciones.validacionForm')

        <form action="{{route('mensaje.store')}}" method="POST">
            @csrf
            <label for="nombre">Nombre
                <input type="text" name="nombre" value="{{old('nombre')}}">
            </label><br>
            <label for="email">E-mail
                <input type="email" name="email" value="{{old('email')}}">
            </label><br>
            <label for="comentario">
                Comentario
                <textarea name="comentario" id="" cols="30" rows="5">{{old('comentario')}}</textarea>
            </label><br>
            <button type="submit">Enviar</button>
        </form>
        <hr>
    @endif
@endsection


