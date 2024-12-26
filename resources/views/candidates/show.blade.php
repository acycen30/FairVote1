@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Candidate Details</h1>
    <p><strong>Name:</strong> {{ $candidate->name }}</p>
    <p><strong>Party:</strong> {{ $candidate->party_affiliation }}</p>
    <p><strong>Position:</strong> {{ $candidate->election_position }}</p>
    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
