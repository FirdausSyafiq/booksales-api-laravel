<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // Mengambil data dari Model
        $genres = Genre::getAllGenres();
        
        // Mengirim data ke View
        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $genres
        ],200);
    }
    
    public function show($id)
    {
        $genres = Genre::getAllGenres();
        $genre = collect($genres)->firstWhere('id', $id);
        
        if (!$genre) {
            abort(404);
        }
        
        return view('genres.show', compact('genre'));
    }
}