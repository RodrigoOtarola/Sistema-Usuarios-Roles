<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //relacion polimorifica model Message
    public function messages(){
        return $this->morphedByMany(Message::class,'taggable');
    }

    //Relacion polimorfica model user
    public function user(){
        return $this->morphedByMany(User::class,'taggable');
    }
}
