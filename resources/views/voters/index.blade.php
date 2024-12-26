@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Voters</h1>
    <a href="{{ route('voters.create') }}" class="btn btn-primary">Add New Voter</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voters as $voter)
            <tr>
                <td>{{ $voter->id }}</td>
                <td>{{ $voter->name }}</td>
                <td>{{ $voter->dob }}</td>
                <td>{{ $voter->gender }}</td>
                <td>{{ $voter->contact }}</td>
                <td>
                    <a href="{{ route('voters.show', $voter->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('voters.edit', $voter->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('voters.destroy', $voter->id) }}" method="POST" style="display:inline;">
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
