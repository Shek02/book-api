<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

// ---------------------------
// Authors endpoints
// ---------------------------
Route::get('/authors', [AuthorController::class, 'index']);        // List all authors
Route::post('/authors', [AuthorController::class, 'store']);       // Create a new author
Route::get('/authors/{id}', [AuthorController::class, 'show']);    // Get a single author
Route::put('/authors/{id}', [AuthorController::class, 'update']);  // Update an author
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']); // Delete an author

// ---------------------------
// Books endpoints
// ---------------------------
Route::get('/books', [BookController::class, 'index']);            // List all books
Route::post('/books', [BookController::class, 'store']);           // Create a new book
Route::get('/books/{id}', [BookController::class, 'show']);        // Get a single book
Route::put('/books/{id}', [BookController::class, 'update']);      // Update a book
Route::delete('/books/{id}', [BookController::class, 'destroy']);  // Delete a book