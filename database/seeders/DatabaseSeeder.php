<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgrammeSeeder::class,
            EventSeeder::class,
            // NewsArticleSeeder::class,
            // GalleryItemSeeder::class,
            // StudentLeaderSeeder::class,
            // StudentClubSeeder::class,
            // StudentServiceSeeder::class,
            // InternationalServiceSeeder::class,
            // CountrySeeder::class,
            AboutSeeder::class,
        ]);
    }
}