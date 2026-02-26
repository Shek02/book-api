<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'title'); // default sort by title
        $books = Book::with('authors')->orderBy($sort)->get();

        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // create the book
        $book = Book::create($request->only(['title','published_year','genre']));

        // attach authors (many-to-many)
        $book->authors()->attach($request->authors);

        // load authors for response
        $book->load('authors');

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('authors')->findOrFail($id);

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->only(['title','published_year','genre']));

        // sync authors
        $book->authors()->sync($request->authors);

        $book->load('authors');

        return response()->json($book);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }
}
