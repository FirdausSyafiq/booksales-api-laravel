<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 data dummy author
        $authors = [
            [
                'name' => 'Andrea Hirata',
                'email' => 'andrea@example.com',
                'bio' => 'Penulis novel Laskar Pelangi dan beberapa karya terkenal lainnya.'
            ],
            [
                'name' => 'Tere Liye',
                'email' => 'tere@example.com',
                'bio' => 'Penulis produktif Indonesia dengan banyak novel bestseller.'
            ],
            [
                'name' => 'Pramoedya Ananta Toer',
                'email' => 'pram@example.com',
                'bio' => 'Sastrawan Indonesia yang terkenal dengan tetralogi Buru.'
            ],
            [
                'name' => 'Dee Lestari',
                'email' => 'dee@example.com',
                'bio' => 'Penulis seri Supernova dan mantan penyanyi Dewi Lestari.'
            ],
            [
                'name' => 'Eka Kurniawan',
                'email' => 'eka@example.com',
                'bio' => 'Penulis Cantik Itu Luka dan Lelaki Harimau yang telah diterjemahkan ke berbagai bahasa.'
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}