<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('film_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table->foreignId('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->foreignId('genre_id')->references('id')->on('genres')->onDelete('cascade');

            $table->unique(['film_id', 'genre_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('film_genre');
    }
};