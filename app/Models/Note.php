<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //Campos para asignar de forma masiva
    protected $fillable=['body'];

    //Relacion con el modelo Message
    public function notable(){
        return $this->morphTo();//no le pasamos parametro
    }
}
