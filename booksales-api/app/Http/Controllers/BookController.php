<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $books
        ],200);
    }

    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);
        return view('books.show', compact('book'));
    }
}