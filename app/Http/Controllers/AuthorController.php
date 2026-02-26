<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return response()->json($author, 201); // 201 = Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, string $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->validated());

        return response()->json($author);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(null, 204); // 204 = No Content
    }
}
