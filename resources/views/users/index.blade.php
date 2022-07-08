@extends('partials.layout')

@section('contenido')

    <h3 class="mt-5">Usuarios:</h3>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Role</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->display_name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
