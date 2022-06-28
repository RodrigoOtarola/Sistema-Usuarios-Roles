@extends('partials.layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form action="{{route('mensaje.update',$message->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre
            <input type="text" name="nombre" value="{{$message->nombre}}">
        </label><br>
        <label for="email">E-mail
            <input type="email" name="email" value="{{$message->email}}">
        </label><br>
        <label for="comentario">
            Comentario
            <textarea name="comentario" id="" cols="30" rows="5">{{$message->comentario}}</textarea>
        </label><br>
        <button type="submit">Actualizar</button>
    </form>
    <hr>

@endsection
