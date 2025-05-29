<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Fiksi',
                'description' => 'Karya sastra yang berisi cerita atau narasi yang dibuat-buat, tidak berdasarkan fakta.'
            ],
            [
                'name' => 'Non-Fiksi',
                'description' => 'Karya tulis yang berdasarkan fakta dan kenyataan.'
            ],
            [
                'name' => 'Misteri',
                'description' => 'Genre yang berfokus pada pemecahan teka-teki atau kejahatan.'
            ],
            [
                'name' => 'Romance',
                'description' => 'Genre yang berfokus pada hubungan percintaan.'
            ],
            [
                'name' => 'Fantasi',
                'description' => 'Genre yang berisi elemen-elemen supernatural atau magis.'
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Genre yang berlatar belakang atau bertemakan sejarah.'
            ]
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}