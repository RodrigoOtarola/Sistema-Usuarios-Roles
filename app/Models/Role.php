<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //Para retornar el tipo de rol
    public function user(){
        return $this->hasOne(User::class);
    }
}
