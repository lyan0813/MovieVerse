<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Country;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $country = Country::where('name', 'South Korea')->first();

        $film = Film::create([
            'title' => 'My Demon',
            'year' => 2023,
            'duration' => 139,
            'director' => 'Kim Jang Han',
            'description' => 'Romance fantasy drama',
            'poster' => 'My_Demon.jpg',
            'country_id' => $country->id,
        ]);

        $genres = Genre::whereIn('name', ['Romance', 'Drama'])->pluck('id');
        $film->genres()->attach($genres);
    }
}
