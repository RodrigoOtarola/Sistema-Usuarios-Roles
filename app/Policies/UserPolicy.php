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

    //Metodo tiene que llevar el mismo nombre que el del Controller.
    public function edit(User $authUser, User $user){

        //Se debe conpara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }
}
