@extends('partials.layout')

@section('title','Mensaje')

@section('contenido')

    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Todos los mensajes:</span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        {{--                        <th>ID</th>--}}
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Notas</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                {{--                                <td>{{$message->id}}</td>--}}

                                {{--                Relacion uno a uno en el modelo--}}
                                @if($message->user_id)
                                    <td>{{$message->user->name}}</td>
                                    <td>{{$message->user->email}}</td>
                                @else
                                    <td>{{$message->nombre}}</td>
                                    <td>{{$message->email}}</td>
                                @endif
                                <td><a href="{{route('mensaje.show',$message->id)}}">{{$message->comentario}}</a></td>

                                {{--Para mostrar notas del mensaje--}}
                                <td>{{$message->note->body??null}}</td>
                                <td>{{$message->tags->pluck('name')->implode('-')}}</td>

                                <td>
                                    <a class="btn btn-xs btn-warning" href="{{route('mensaje.edit',$message->id)}}">
                                        Editar
                                    </a>
                                    <form style="display: inline" action="{{route('mensaje.destroy', $message->id)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{$messages->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>


@endsection
