<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $guarded =['id'];
     //Relacion uno  a muchos inversa

     public function post(){
        return $this->belongsTo('App\Models\Post');
    }
    use HasFactory;
}
