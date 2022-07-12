@extends('partials.layout')

@section('contenido')
    <h3>{{$user->name}}</h3>
    <table>
        <tr>
            <th>Nombre:</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Roles:</th>
            <td>
                @foreach($user->roles as $role)
                    {{$role->display_name}}
                @endforeach
            </td>
        </tr>
    </table>
    @can('edit',$user)
        {{--    Recibe como parametro la directiva y el modelo, si el usuario puede editar el usuario para mostrarlo--}}
        <a class="btn btn-info" href="{{route('usuarios.edit',$user->id)}}">Editar</a>
    @endcan
    {{--    Para que pueda ver el boton eliminar.--}}
    @can('destroy',$user)
        <form style="display:inline" action="{{route('usuarios.destroy', $user->id)}}"
              method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Eliminar</button>
        </form>
    @endcan
@endsection
