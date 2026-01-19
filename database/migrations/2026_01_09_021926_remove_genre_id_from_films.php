<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('films', function (Blueprint $table) {
            if (Schema::hasColumn('films', 'genre_id')) {
                $table->dropColumn('genre_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id')->nullable();
        });
    }
};