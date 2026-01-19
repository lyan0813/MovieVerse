<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::insert([
            ['name' => 'Romance'],
            ['name' => 'Drama'],
            ['name' => 'Action'],
            ['name' => 'science-fiction'],
        ]);
    }
}