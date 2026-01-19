<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['name','birthdate','gender','photo'];

    public function films()
    {
        return $this->belongsToMany(Film::class,'film_actor');
    }
}