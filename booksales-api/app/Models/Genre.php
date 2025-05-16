<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    
    // Data array untuk Genre
    public static function getAllGenres()
    {
        return [
            ['id' => 1, 'name' => 'Fiksi', 'description' => 'Karya sastra berbasis imajinasi dan kreativitas'],
            ['id' => 2, 'name' => 'Non-Fiksi', 'description' => 'Karya sastra berbasis fakta dan kenyataan'],
            ['id' => 3, 'name' => 'Misteri', 'description' => 'Cerita dengan unsur teka-teki dan suspense'],
            ['id' => 4, 'name' => 'Romantis', 'description' => 'Cerita dengan fokus pada hubungan dan romansa'],
            ['id' => 5, 'name' => 'Horor', 'description' => 'Cerita yang bertujuan membangkitkan rasa takut']
        ];
    }
}