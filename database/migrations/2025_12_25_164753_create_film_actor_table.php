<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('film_actor', function (Blueprint $table) {
    $table->id();
    $table->foreignId('film_id')->constrained()->cascadeOnDelete();
    $table->foreignId('actor_id')->constrained()->cascadeOnDelete();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('film_actor');
    }
};