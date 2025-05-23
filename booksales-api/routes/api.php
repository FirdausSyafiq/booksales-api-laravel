<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk Authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::post('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');

// Route untuk Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::post('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Route untuk genres
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');
Route::post('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');