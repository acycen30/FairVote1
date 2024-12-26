@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Candidate</h1>
    <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $candidate->name }}" required>
        </div>
        <div class="form-group">
            <label>Party Affiliation:</label>
            <input type="text" name="party_affiliation" class="form-control" value="{{ $candidate->party_affiliation }}" required>
        </div>
        <div class="form-group">
            <label>Election Position:</label>
            <input type="text" name="election_position" class="form-control" value="{{ $candidate->election_position }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
