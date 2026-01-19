<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    protected $fillable = ['user_id', 'comment_id'];

    public function up(): void
{
    Schema::create('comment_likes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('comment_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        
        // Memastikan satu user hanya bisa like satu kali pada komentar yang sama
        $table->unique(['user_id', 'comment_id']);
    });
}
}
