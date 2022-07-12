<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Ejecutara este metodo antes que los demas, si se devuelve un true no ejecutara los demas, valida si el usuario es admin.
    //método is admin, se encuentra en el modelo User
    public function before($user, $ability){
        if($user->isAdmin()){
            return true;
        }
    }

    //Metodo tiene que llevar el mismo nombre que el del Controller.
    public function edit(User $authUser, User $user){

        //Se debe conpara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user){

        //Para que no se puedan cambiar datos en el inspeccionar elemento.
        return $authUser->id === $user->id;
    }

    public function destroy(User $authUser, User $user){

        //Para que no se puedan cambiar datos en el inspeccionar elemento.
        return $authUser->id === $user->id;
    }
}
