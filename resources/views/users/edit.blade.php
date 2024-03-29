@extends('partials.layout')

@section('contenido')

    <div class="col-md-10 mt-5">
        <div class="card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar usuario:</span>
                </div>
                @if (session()->has('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                @include('validaciones.validacionForm')
                <div class="card-body">
                    <form action="{{route('usuarios.update',$user->id)}}" method="POST">

                        @method('PUT')

                        @include('users.form')

                        <br>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
