<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk login
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:api');

// Route untuk Authors
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

// Route untuk Books
Route::apiResource('books', BookController::class)->only(['index', 'show']);

// Route untuk genres
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);


Route::middleware(['auth:api'])->group(function () {
    // Route untuk Transactions
    Route::apiResource('transactions', TransactionController::class)->only(['index', 'store', 'show']);

    Route::middleware(['role:admin'])->group(function () {
        // Route untuk Books
        Route::apiResource('books', BookController::class)->only(['store', 'update', 'destroy']);
        // Route untuk Authors
        Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
        // Route untuk genres
        Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
        // Route untuk Transactions
        Route::apiResource('transactions', TransactionController::class)->only(['update', 'destroy']);
    });
    
});

