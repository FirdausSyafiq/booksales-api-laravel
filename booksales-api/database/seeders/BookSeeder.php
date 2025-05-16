<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 data dummy book
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author_id' => 1, // Andrea Hirata
                'isbn' => '9789793062792',
                'description' => 'Novel tentang perjuangan anak-anak Belitung untuk mendapatkan pendidikan.',
                'published_year' => 2005,
                'price' => 85000
            ],
            [
                'title' => 'Bumi',
                'author_id' => 2, // Tere Liye
                'isbn' => '9786020332956',
                'description' => 'Petualangan Raib dan teman-temannya di dunia paralel.',
                'published_year' => 2014,
                'price' => 89000
            ],
            [
                'title' => 'Bumi Manusia',
                'author_id' => 3, // Pramoedya Ananta Toer
                'isbn' => '9799731234',
                'description' => 'Novel sejarah yang berlatar belakang kolonialisme Belanda di Indonesia.',
                'published_year' => 1980,
                'price' => 95000
            ],
            [
                'title' => 'Supernova: Kesatria, Putri, dan Bintang Jatuh',
                'author_id' => 4, // Dee Lestari
                'isbn' => '9789796519217',
                'description' => 'Novel fiksi ilmiah yang menggabungkan konsep fisika, filsafat, dan kehidupan sehari-hari.',
                'published_year' => 2001,
                'price' => 78000
            ],
            [
                'title' => 'Lelaki Harimau',
                'author_id' => 5, // Eka Kurniawan
                'isbn' => '9786028811897',
                'description' => 'Kisah tentang seorang pemuda yang memiliki sisi harimau dalam dirinya.',
                'published_year' => 2004,
                'price' => 82000
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}