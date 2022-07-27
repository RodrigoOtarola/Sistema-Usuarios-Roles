@extends('partials.layout')

@section('contenido')
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de usuarios:</span>
                    {{--Para crear nuevos usuarios--}}
                    <a class="btn btn-primary pull-right" href="{{route('usuarios.create')}}">Crear Usuario</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
{{--                        <th>ID</th>--}}
                        <th>Nombre</th>
{{--                        <th>Email</th>--}}
                        <th>Role</th>
                        <th>Nota</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
{{--                                <td>{{$user->id}}</td>--}}
                                <td>{{$user->name}}</td>
{{--                                <td>{{$user->email}}</td>--}}
                                {{--                <td>{{$user->role->display_name}}</td>--}}
                                <td>
                                    {{--                                    @foreach($user->roles as $role)--}}
                                    {{--                                        {{$role->display_name}}--}}
                                    {{--                                    @endforeach--}}

                                    {{--                                    Implode recibe como parameto el tipo de separador--}}
                                    {{$user->roles->pluck('display_name')->implode(' - ')}}
                                </td>

                                {{--Agregar notas a usuarios--}}
                                <td>{{$user->note->body??null}}</td>

                                {{--Etiquetas de usuarios--}}
                                <td>{{$user->tags->pluck('name')->implode('-')}}</td>

                                <td>
                                    <a class="btn btn-xs btn-warning"
                                       href="{{route('usuarios.edit',$user->id)}}">Editar</a>
                                    <form style="display:inline" action="{{route('usuarios.destroy', $user->id)}}"
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
{{--                    {{$users->links('pagination::bootstrap-4')}}--}}
                </div>
            </div>
        </div>
    </div>

@endsection
