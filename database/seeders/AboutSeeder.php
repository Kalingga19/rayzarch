<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'intro_text' => 'Rayzarchitecture adalah studio desain arsitektur...',
            'profile_name' => 'Rayz',
            'profile_text' => 'Architecture & Interior Designer',
            'motto_text' => 'YOUR VISION, OUR PRECISION',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
