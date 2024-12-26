@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Voter Details</h1>
    <p><strong>Name:</strong> {{ $voter->name }}</p>
    <p><strong>Date of Birth:</strong> {{ $voter->dob }}</p>
    <p><strong>Gender:</strong> {{ $voter->gender }}</p>
    <p><strong>Contact:</strong> {{ $voter->contact }}</p>
    <a href="{{ route('voters.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
