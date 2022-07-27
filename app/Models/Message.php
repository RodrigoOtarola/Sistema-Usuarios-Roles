<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=['nombre','email','comentario'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion con modelo Note
    public function note(){
        //Un mensaje solo puede tener una nota
        return $this->morphOne(Note::class,'notable');//Recibe el prefijo con el que se crea la relacion.
    }

    //Relacion modelo tags.
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
