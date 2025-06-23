<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return Member::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:members',
            'address' => 'required|string',
        ]);
        return Member::create($request->all());
    }

    public function show($id)
    {
        return Member::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:members,email,' . $id,
            'address' => 'string',
        ]);
        $member->update($request->all());
        return $member;
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}

