<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoteCount;
use App\Models\Candidate;

class VoteCountController extends Controller
{
    public function index()
    {
        $voteCounts = VoteCount::with('candidate')->get();
        return view('results.index', compact('voteCounts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        $voteCount = VoteCount::with('candidate')->find($id);
        return view('results.show', compact('voteCount'));
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        $voteCount = VoteCount::find($id);
        $voteCount->update($request->all());
        return redirect()->route('results.index');
    }

    public function destroy(string $id)
    {
        $voteCount = VoteCount::find($id);
        $voteCount->delete();
        return redirect()->route('results.index');
    }
}
