@extends('partials.layout')

@section('title','Mensaje')

@section('contenido')

    <h1>Todos los mensajes:</h1>

    <table border="2" width="70%">
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
                        <button>Editar</button>
                    </a>
                    <form style="display: inline" action="{{route('mensaje.destroy', $message->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>


@endsection
