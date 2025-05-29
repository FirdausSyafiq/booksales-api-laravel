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
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'isbn' => '9789793062792',
                'description' => 'Novel tentang perjuangan anak-anak Belitung untuk mendapatkan pendidikan.',
                'cover_photo' => 'laskar_pelangi.jpg',
                'published_year' => 2005,
                'price' => 85000,
                'stock' => 10,
                'author_id' => 1, // Andrea Hirata
                'genre_id' => 1   // Fiksi
            ],
            [
                'title' => 'Bumi',
                'isbn' => '9786020332956',
                'description' => 'Petualangan Raib dan teman-temannya di dunia paralel.',
                'cover_photo' => 'bumi.jpg',
                'published_year' => 2014,
                'price' => 89000,
                'stock' => 5,
                'author_id' => 2, // Tere Liye
                'genre_id' => 5   // Fantasi
            ],
            [
                'title' => 'Bumi Manusia',
                'isbn' => '9799731234',
                'description' => 'Novel sejarah yang berlatar belakang kolonialisme Belanda di Indonesia.',
                'cover_photo' => 'bumi_manusia.jpg',
                'published_year' => 1980,
                'price' => 95000,
                'stock' => 3,
                'author_id' => 3, // Pramoedya Ananta Toer
                'genre_id' => 6   // Sejarah
            ],
            [
                'title' => 'Supernova: Kesatria, Putri, dan Bintang Jatuh',
                'isbn' => '9789796519217',
                'description' => 'Novel fiksi ilmiah yang menggabungkan konsep fisika, filsafat, dan kehidupan sehari-hari.',
                'cover_photo' => 'supernova.jpg',
                'published_year' => 2001,
                'price' => 78000,
                'stock' => 2,
                'author_id' => 4, // Dee Lestari
                'genre_id' => 1   // Fiksi
            ],
            [
                'title' => 'Lelaki Harimau',
                'isbn' => '9786028811897',
                'description' => 'Kisah tentang seorang pemuda yang memiliki sisi harimau dalam dirinya.',
                'cover_photo' => 'lelaki_harimau.jpg',
                'published_year' => 2004,
                'price' => 82000,
                'stock' => 1,
                'author_id' => 5, // Eka Kurniawan
                'genre_id' => 3   // Misteri
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}