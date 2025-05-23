<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        // Mengambil semua data genre
        $genres = Genre::all();
        
        if ($genres->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Resource data not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource created successfully',
            'data' => $genre
        ], 201);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource by ID',
            'data' => $genre
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        // Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Siapkan data yang ingin di update
        $genre->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $genre
        ], 200);
    }


    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
                'data' => []
            ], 404);
        }

        $genre->delete();
        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully',
            'data' => $genre
        ], 200);
    }
}
