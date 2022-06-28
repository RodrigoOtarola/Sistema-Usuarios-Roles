@extends('partials.layout')

@section('contenido')

    <h2>Mensajes:</h2>
    <p>Enviado por {{$message->nombre}} - {{$message->email}}.</p>
    <p>{{$message->comentario}}</p>

@endsection
