<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Resource data not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $authors
        ],200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator ::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:authors,email',
            'bio' => 'required|string'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Insert data
        $author = Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource created successfully',
            'data' => $author
        ]);
    }

    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return view('authors.show', compact('author'));
    }
}