@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Voter</h1>
    <form action="{{ route('voters.update', $voter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $voter->name }}" required>
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" class="form-control" value="{{ $voter->dob }}" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="Male" {{ $voter->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $voter->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Contact:</label>
            <input type="text" name="contact" class="form-control" value="{{ $voter->contact }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
