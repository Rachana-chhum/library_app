<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('category')->get();
    }

    // App\Http\Controllers\BookController.php
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully!',
            'data' => $book
        ], 201);
    }


    public function show($id)
    {
        return Book::with('category')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validate([
            'title' => 'string',
            'author' => 'string',
            'quantity' => 'integer',
            'category_id' => 'exists:categories,id',
        ]);
        $book->update($request->all());
        return $book;
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
