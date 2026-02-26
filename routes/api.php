<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
// ---------------------------
// Authors endpoints
// ---------------------------
Route::get('/authors', [AuthorController::class, 'index']);        // List all authors
Route::post('/authors', [AuthorController::class, 'store']);       // Create a new author
Route::get('/authors/{id}', [AuthorController::class, 'show']);    // Get a single author
Route::put('/authors/{id}', [AuthorController::class, 'update']);  // Update an author
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']); // Delete an author