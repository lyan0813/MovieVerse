<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('films', function (Blueprint $blueprint) {
            // Kita tambahkan kolom trailer setelah kolom poster
            $blueprint->string('trailer')->nullable()->after('poster');
        });
    }

    public function down(): void
    {
        Schema::table('films', function (Blueprint $blueprint) {
            $blueprint->dropColumn('trailer');
        });
    }
};