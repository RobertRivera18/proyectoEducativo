<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    
    //Relacion uno a muchos 
    public function posts(){
      return $this->hasMany(Post::class);
      
  }
}
