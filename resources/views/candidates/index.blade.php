@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Candidates</h1>
    <a href="{{ route('candidates.create') }}" class="btn btn-primary">Add New Candidate</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Party</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
            <tr>
                <td>{{ $candidate->id }}</td>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->party_affiliation }}</td>
                <td>{{ $candidate->election_position }}</td>
                <td>
                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
