@csrf
<label for="nombre">Nombre
    <input class="form-control" type="text" name="name" value="{{$user->name ?? old('name')}}">
</label><br>
<label for="email">E-mail
    <input class="form-control" type="email" name="email" value="{{$user->email ?? old('email')}}">
</label><br><br>
<div class="checkbox">
    @foreach($roles as $id => $name)
        <label>
            {{--Genera automaticamente checkbox, segun cantidad de perfiles--}}
            <input type="checkbox" name="roles[]"
                   value="{{$id}}" {{$user->roles->pluck('id')->contains($id) ? 'checked' : ''}}>
            {{$name}}
        </label>
    @endforeach
</div>
