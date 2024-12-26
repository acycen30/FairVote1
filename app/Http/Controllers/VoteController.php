<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use App\Models\VoteCount;

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
            'candidate_id' => 'required|exists:candidates,candidate_id',
        ]);

        $voter = Auth::user();
        if (!$voter) {
            return redirect()->route('login')->with('error', 'You must be logged in to vote.');
        }

        $existingVote = Vote::where('voter_id', $voter->id)->first();
        if ($existingVote) {
            return redirect()->route('vote.create')->with('error', 'You have already voted.');
        }

        Vote::create([
            'voter_id' => $voter->id,
            'candidate_id' => $request->candidate_id,
        ]);

        $voteCount = VoteCount::where('candidate_id', $request->candidate_id)->first();
        if ($voteCount) {
            $voteCount->increment('vote_count');
        } else {
            VoteCount::create([
                'candidate_id' => $request->candidate_id,
                'election_id' => 1,
                'vote_count' => 1,
            ]);
        }

        return redirect()->route('home')->with('success', 'Your vote has been submitted successfully.');
    }

    public function index()
    {
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
