<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    // Data array untuk Author
    public static function getAllAuthors()
    {
        return [
            ['id' => 1, 'name' => 'Andrea Hirata', 'country' => 'Indonesia', 'birth_year' => 1967, 'famous_work' => 'Laskar Pelangi'],
            ['id' => 2, 'name' => 'Pramoedya Ananta Toer', 'country' => 'Indonesia', 'birth_year' => 1925, 'famous_work' => 'Bumi Manusia'],
            ['id' => 3, 'name' => 'Tere Liye', 'country' => 'Indonesia', 'birth_year' => 1979, 'famous_work' => 'Rindu'],
            ['id' => 4, 'name' => 'Dee Lestari', 'country' => 'Indonesia', 'birth_year' => 1976, 'famous_work' => 'Supernova'],
            ['id' => 5, 'name' => 'Eka Kurniawan', 'country' => 'Indonesia', 'birth_year' => 1975, 'famous_work' => 'Cantik itu Luka']
        ];
    }
}