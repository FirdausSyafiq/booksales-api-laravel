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
        $author = Author::with('books')->find($id);
        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource by ID',
            'data' => $author
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:authors,email,' . $id,
            'bio' => 'required|string'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Siapkan data yang ingin di update
        $author->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $author
        ], 200);
    }


    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        $author->delete();
        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully',
            'data' => $author
        ], 200);
    }
}