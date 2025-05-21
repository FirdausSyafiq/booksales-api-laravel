<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['id' => 1, 'name' => 'Fiksi', 'description' => 'Karya sastra berbasis imajinasi dan kreativitas'],
            ['id' => 2, 'name' => 'Non-Fiksi', 'description' => 'Karya sastra berbasis fakta dan kenyataan'],
            ['id' => 3, 'name' => 'Misteri', 'description' => 'Cerita dengan unsur teka-teki dan suspense'],
            ['id' => 4, 'name' => 'Romantis', 'description' => 'Cerita dengan fokus pada hubungan dan romansa'],
            ['id' => 5, 'name' => 'Horor', 'description' => 'Cerita yang bertujuan membangkitkan rasa takut'],
        ]);
    }
}
