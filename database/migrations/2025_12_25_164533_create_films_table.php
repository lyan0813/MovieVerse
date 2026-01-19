<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->string('director');
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->timestamps();

            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};