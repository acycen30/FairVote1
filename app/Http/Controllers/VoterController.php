<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function index()
    {
        $voters = Voter::all();
        return view('voters.index', compact('voters'));
    }

    public function create()
    {
        return view('voters.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voter_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_information' => 'required|string|max:255',
        ]);

        Voter::create($validatedData);

        return redirect()->route('voters.index')->with('success', 'Voter added successfully.');
    }

    public function show(Voter $voter)
    {
        return view('voters.show', compact('voter'));
    }

    public function edit(Voter $voter)
    {
        return view('voters.edit', compact('voter'));
    }

    public function update(Request $request, Voter $voter)
    {
        $validatedData = $request->validate([
            'voter_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_information' => 'required|string|max:255',
        ]);

        $voter->update($validatedData);

        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();

        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }
}
