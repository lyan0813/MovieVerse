<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Actor::create([
        'name' => 'Song Kang',
        'birthdate' => '1994-04-23',
        'gender' => 'male',
        'photo' => 'songkang.png'
    ]);  
    }
}