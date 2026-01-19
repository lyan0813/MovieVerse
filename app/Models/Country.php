<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    // 🔗 satu country punya banyak film
    public function films()
    {
        return $this->hasMany(Film::class);
    }
}