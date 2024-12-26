@extends('layouts.app')

@section('title', 'Voting Page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Cast Your Vote</h2>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('vote.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="candidate_id" class="form-label">Choose a Candidate:</label>
                    <select id="candidate_id" name="candidate_id" class="form-select" required>
                        <option value="">-- Select Candidate --</option>
                        @foreach($candidates as $candidate)
                            <option value="{{ $candidate->candidate_id }}">{{ $candidate->candidate_name }} ({{ $candidate->party_affiliation }})</option>
                        @endforeach
                    </select>
                    @error('candidate_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit Vote</button>
            </form>
        </div>
    </div>
@endsection
