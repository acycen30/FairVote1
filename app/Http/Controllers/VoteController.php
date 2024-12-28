<?php


namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function create()
    {
        $candidates = Candidate::all();
        return view('vote.create', compact('candidates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $voterId = Auth::id();

        if (!$voterId) {
            return redirect()->back()->withErrors('You must log in to vote.');
        }

        if (Vote::where('voter_id', $voterId)->exists()) {
            return redirect()->back()->withErrors('You have already voted.');
        }

        Vote::create([
            'voter_id' => $voterId,
            'candidate_id' => $request->candidate_id,
        ]);

        return redirect()->route('vote.create')->with('success', 'Your vote has been submitted.');
    }
}
