<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();

        if ($books->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Resource data not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $books
        ], 200);
    }

    public function store(Request $request)  {
        // Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'isbn' => 'required|string|unique:books,isbn',
            'description' => 'required|string',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_year' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Upload image
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // Insert data
        $book = Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'cover_photo' => $image->hashName(),
            'published_year' => $request->published_year,
            'price' => $request->price
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $book
        ], 201);
    }

    public function show(string$id)
    {
        $book = Book::with(['author', 'genre'])->find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource by ID',
            'data' => $book
        ], 200);
    }

    public function update(string$id, Request $request)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'isbn' => 'required|string|unique:books,isbn',
            'description' => 'required|string',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_year' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Siapkan data yang ingin diupdate
        $data = [
            'title' => $request->title,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'published_year' => $request->published_year,
            'price' => $request->price
        ];

        // Handle image (upload & delete photo)
        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $image->store('books', 'public');
            
            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }
            
            $data['cover_photo'] = $image->hashName();
        }

        // Update data baru ke database
        $book->update($data);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $book
        ], 200);
    }

    public function destroy(string$id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        $book->delete();
        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully',
            'data' => $book
        ], 200);
    }
}