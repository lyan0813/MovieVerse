<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'director',
        'year',
        'duration',
        'description',
        'poster',
        'trailer',
        'country_id'
    ];

    // 🔗 relasi ke country (many to one)
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // 🔗 relasi ke genre (many to many)
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    // 🔗 relasi ke actor (many to many)
    public function actors()
    {
        return $this->belongsToMany(
            Actor::class,
            'film_actor',
            'film_id',
            'actor_id'
        );
    }

    // 🔗 relasi ke comment (one to many)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}