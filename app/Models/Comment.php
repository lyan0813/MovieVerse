<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'film_id',  
        'comment',
        ];

    // 🔗 comment milik satu film
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    // 🔗 comment milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes() {
    return $this->hasMany(CommentLike::class);
}
}