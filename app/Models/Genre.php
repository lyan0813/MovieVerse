<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    // 🔗 genre bisa punya banyak film
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}