@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h2 class="text-center mb-4">Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('voters.index') }}" class="btn btn-primary w-100 mb-2">Manage Voters</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('candidates.index') }}" class="btn btn-primary w-100 mb-2">Manage Candidates</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('positions.index') }}" class="btn btn-primary w-100 mb-2">Manage Positions</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('vote-counts.index') }}" class="btn btn-primary w-100 mb-2">View Vote Counts</a>
        </div>
    </div>
@endsection
