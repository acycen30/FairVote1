<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VotersController extends Controller
{
    /**
     * Display a listing of the voters.
     */
    public function index()
    {
        // Retrieve all voters from the database
        $voters = Voter::all();
        
        // Return the 'voters.index' view with the voters data
        return view('voters.index', compact('voters'));
    }

    /**
     * Show the form for creating a new voter.
     */
    public function create()
    {
        // Return the 'voters.create' view for creating a new voter
        return view('voters.create');
    }

    /**
     * Store a newly created voter in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'voter_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_information' => 'required|string|max:255',
        ]);

        // Create a new voter using the validated data
        Voter::create($validatedData);

        // Redirect to the voters index with a success message
        return redirect()->route('voters.index')->with('success', 'Voter added successfully.');
    }

    /**
     * Display the specified voter.
     */
    public function show(Voter $voter)
    {
        // Return the 'voters.show' view for displaying the specified voter
        return view('voters.show', compact('voter'));
    }

    /**
     * Show the form for editing the specified voter.
     */
    public function edit(Voter $voter)
    {
        // Return the 'voters.edit' view for editing the specified voter
        return view('voters.edit', compact('voter'));
    }

    /**
     * Update the specified voter in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        // Validate the incoming request data for updating the voter
        $validatedData = $request->validate([
            'voter_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_information' => 'required|string|max:255',
        ]);

        // Update the voter with the validated data
        $voter->update($validatedData);

        // Redirect to the voters index with a success message
        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }

    /**
     * Remove the specified voter from storage.
     */
    public function destroy(Voter $voter)
    {
        // Delete the specified voter
        $voter->delete();

        // Redirect to the voters index with a success message
        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }
}
