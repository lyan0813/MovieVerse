<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
       Country::insert([
        ['name' => 'South Korea'],
        ['name' => 'Japan'],
        ['name' => 'China'],
        ['name' => 'USA'],
        ['name' => 'Thailand'],
        ['name' => 'Indonesia'],
    ]);
    }
}