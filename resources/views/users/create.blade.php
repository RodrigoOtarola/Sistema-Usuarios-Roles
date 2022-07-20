@extends('partials.layout')

@section('contenido')

    <div class="col-md-10 mt-5">
        <div class="card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Crear usuario:</span>
                </div>
                @if (session()->has('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                @include('validaciones.validacionForm')
                <div class="card-body">
                    <form action="{{route('usuarios.create')}}" method="POST">

                        @include('users.form',['user'=>new App\Models\User()])

                        <br>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
