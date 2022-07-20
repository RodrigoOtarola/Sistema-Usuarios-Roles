@csrf
{{--            Muestra esto solo si el usuario no esta autenticado--}}

{{--Al menos que tengo user_id, se muestra todo--}}
@unless($message->user_id)
    <label for="nombre">Nombre
        <input class="form-control" type="text" name="nombre" value="{{$message->nombre ?? old('nombre')}}">
    </label><br>
    <label for="email">E-mail
        <input class="form-control" type="email" name="email" value="{{$message->email ?? old('email')}}">
    </label><br>
@endunless
<label for="comentario">
    Comentario
    <textarea class="form-control" name="comentario" id="" cols="30"
              rows="5">{{$message->comentario ?? old('comentario')}}</textarea>
</label><br>
<button class="btn btn-primary" type="submit">{{$btnText ?? 'Enviar'}}</button>
