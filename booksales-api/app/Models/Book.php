<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'isbn',
        'description',
        'cover_photo',
        'published_year',
        'price',
        'stock',
        'author_id',
        'genre_id',
    ];

    /**
     * Get the author that owns the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the genre that the book belongs to.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}