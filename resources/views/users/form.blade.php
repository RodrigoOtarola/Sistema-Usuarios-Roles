@csrf
<label for="name">Nombre
    <input class="form-control" type="text" name="name" value="{{$user->name ?? old('name')}}">
</label><br>

<label for="email">E-mail
    <input class="form-control" type="email" name="email" value="{{$user->email ?? old('email')}}">
</label><br>

{{--Para ocultar estos campos en edit, si tiene edit no muesta, si no tiene es para crear--}}
@unless($user->id)
    <label for="password">Password
        <input class="form-control" type="password" name="password">
    </label><br>

    <label for="password_confirmation">Password Confirm
        <input class="form-control" type="password" name="password_confirmation">
    </label><br>
@endunless
<br>
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
