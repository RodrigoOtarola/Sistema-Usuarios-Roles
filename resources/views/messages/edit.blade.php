@extends('partials.layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form action="{{route('mensaje.update',$message->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre
            <input class="form-control" type="text" name="nombre" value="{{$message->nombre}}">
        </label><br>
        <label for="email">E-mail
            <input class="form-control" type="email" name="email" value="{{$message->email}}">
        </label><br>
        <label for="comentario">
            Comentario
            <textarea class="form-control" name="comentario" id="" cols="30" rows="5">{{$message->comentario}}</textarea>
        </label><br>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
    <hr>

@endsection
