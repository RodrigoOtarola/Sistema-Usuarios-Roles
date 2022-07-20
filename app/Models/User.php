<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    public function roles(){
        //return $this->belongsTo(Role::class); relacion uno a uno

        //muchos a muchos, 2do parametro es para pasar nombre de tabala pivote, por defecto reconecería role_user.
        return $this->belongsToMany(Role::class,'assigned_roles');
    }

    public function hasRoles(array $roles){

        return $this->roles->pluck('name')->intersect($roles)->count();

//        foreach ($roles as $role){

            //Con collection, primero obtiene los nombres en un arreglo y después de uno de los roles
//            return $this->roles->pluck('name')->contains($role);
            //foreach es para hacer loop para reconocer role
//            foreach ($this->roles as $userRole){
//                //Para que reconozca tipo de rol
//                if($userRole->name === $role){
//                    return true;
//                }
//            }
//        }

//        return false;
        //return $this->role === $role;
    }

    //Llamado desde el UserPolicy
    public function isAdmin(){
        return $this->hasRoles(['admin']);
    }

    //Relacion de user con messages, un usuario puede tener varios mensajes
    public function messages(){
        return $this->hasMany(Message::class);
    }

}
