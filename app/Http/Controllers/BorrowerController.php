<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        return Borrower::with(['book', 'member', 'librarian'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'librarian_id' => 'required|exists:librarians,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        $borrower = Borrower::create($data);

        return response()->json($borrower->load(['book', 'member', 'librarian']), 201);
    }


    public function show($id)
    {
        return Borrower::with(['book', 'member', 'librarian'])->findOrFail($id);
    }

    public function update(Request $request, Borrower $borrower)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'librarian_id' => 'required|exists:librarians,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        $borrower->update($data);

        return response()->json($borrower->load(['book', 'member', 'librarian']));
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();
        return response()->json(['message' => 'Borrower deleted successfully.']);
    }
}
