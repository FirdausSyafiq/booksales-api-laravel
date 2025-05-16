<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Mengambil data dari Model
        $authors = Author::getAllAuthors();
        
        // Mengirim data ke View
        return view('authors.index', compact('authors'));
    }
    
    public function show($id)
    {
        $authors = Author::getAllAuthors();
        $author = collect($authors)->firstWhere('id', $id);
        
        if (!$author) {
            abort(404);
        }
        
        return view('authors.show', compact('author'));
    }
}