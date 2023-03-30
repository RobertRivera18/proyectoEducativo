<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const  BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    //Query scope
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    protected $withCount = 'reviews';
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 0);
        } else {
            return 1;
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //Relacion de uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //Relacion de muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function levels()
    {
        return $this->belongsTo(Level::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function tipos()
    {
        return $this->belongsTo(TipoRecurso::class);
    }
    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
    }

    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //Relacion uno a mucho polimorfica de question
    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }
    public function scopeFilter($query,$filters)
    {
        $query->when($filters['category'], function ($query,$filters) {
            $query->whereIn('id', request('category'));
        })->when(request('order') ?? 'new', function ($query, $order) {
            $sort = $order === 'new' ? 'desc' : 'asc';
            $query->orderBy('created_at', $sort);
        });
    }
}
