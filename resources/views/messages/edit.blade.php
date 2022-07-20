@extends('partials.layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form action="{{route('mensaje.update',$message->id)}}" method="POST">
        @method('PUT')

        @include('messages.form',['btnText'=>'Actualizar'])

        {{--        Para cambiar texto de button--}}



    </form>
    <hr>

@endsection
