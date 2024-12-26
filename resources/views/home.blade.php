@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="text-center">
    <h1>Welcome to the Voting System</h1>
    <p>Welcome to our online voting system. Please choose an action from the navigation links below.</p>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('vote.create') }}" class="btn btn-primary mx-2">Vote Now</a>
        <a href="{{ route('results') }}" class="btn btn-info mx-2">View Results</a>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning mx-2">Admin Dashboard</a>
            @elseif(Auth::user()->role === 'organizer')
                <a href="{{ route('organizer.dashboard') }}" class="btn btn-warning mx-2">Organizer Dashboard</a>
            @endif
        @endauth
    </div>
</div>
@endsection
