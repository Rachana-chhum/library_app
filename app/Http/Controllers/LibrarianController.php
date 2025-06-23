<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index()
    {
        return Librarian::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:librarians',
        ]);
        return Librarian::create($request->all());
    }

    public function show($id)
    {
        return Librarian::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $librarian = Librarian::findOrFail($id);
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:librarians,email,' . $id,
        ]);
        $librarian->update($request->all());
        return $librarian;
    }

    public function destroy($id)
    {
        Librarian::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}

