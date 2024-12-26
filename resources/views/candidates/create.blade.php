@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Candidate</h1>
    <form action="{{ route('candidates.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Party Affiliation:</label>
            <input type="text" name="party_affiliation" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Election Position:</label>
            <input type="text" name="election_position" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
