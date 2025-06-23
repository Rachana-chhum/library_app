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
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'librarian_id' => 'required|exists:librarians,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);
        return Borrower::create($request->all());
    }

    public function show($id)
    {
        return Borrower::with(['book', 'member', 'librarian'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $borrower = Borrower::findOrFail($id);
        $request->validate([
            'book_id' => 'exists:books,id',
            'member_id' => 'exists:members,id',
            'librarian_id' => 'exists:librarians,id',
            'borrow_date' => 'date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);
        $borrower->update($request->all());
        return $borrower;
    }

    public function destroy($id)
    {
        Borrower::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
