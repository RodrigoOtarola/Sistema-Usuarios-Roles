@extends('partials.layout')

@section('title','Mensaje')

@section('contenido')

    <h3 class="mt-5">Todos los mensajes:</h3>

    <table class="table">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Mensaje</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td>
                    <a href="{{route('mensaje.show',$message->id)}}">
                        {{$message->nombre}}</a>
                </td>
                <td>{{$message->email}}</td>
                <td>{{$message->comentario}}</td>
                <td>
                    <a href="{{route('mensaje.edit',$message->id)}}">
                        <button class="btn btn-xs btn-warning">Editar</button>
                    </a>
                    <form style="display: inline" action="{{route('mensaje.destroy', $message->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button  class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>


@endsection
