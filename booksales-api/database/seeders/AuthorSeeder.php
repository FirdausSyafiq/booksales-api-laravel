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
        $authors = [
            [
                'name' => 'Andrea Hirata',
                'email' => 'andrea.hirata@email.com',
                'bio' => 'Penulis Indonesia yang terkenal dengan novel Laskar Pelangi. Lahir di Belitung dan mengangkat keindahan pulau kelahirannya dalam karya-karyanya.'
            ],
            [
                'name' => 'Tere Liye',
                'email' => 'tere.liye@email.com',
                'bio' => 'Penulis produktif Indonesia dengan nama asli Darwis. Dikenal dengan serial novel anak dan remaja yang inspiratif.'
            ],
            [
                'name' => 'Pramoedya Ananta Toer',
                'email' => 'pramoedya@email.com',
                'bio' => 'Sastrawan Indonesia terkemuka, penulis Tetralogi Buru. Penerima berbagai penghargaan sastra internasional.'
            ],
            [
                'name' => 'Dee Lestari',
                'email' => 'dee.lestari@email.com',
                'bio' => 'Penulis, penyanyi, dan komposer Indonesia. Dikenal dengan novel Supernova yang menggabungkan sains dan sastra.'
            ],
            [
                'name' => 'Eka Kurniawan',
                'email' => 'eka.kurniawan@email.com',
                'bio' => 'Penulis Indonesia yang karyanya telah diterjemahkan ke berbagai bahasa. Dikenal dengan gaya penulisan yang unik dan kritis.'
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}