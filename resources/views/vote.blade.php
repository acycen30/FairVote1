<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vote')</title>
</head>
<body>
    <header>
        <h1>Vote for Your Favorite Candidate</h1>
        <nav>
            <a href="{{ route('home') }}" class="btn btn-primary m-2">Home</a> |
            <a href="{{ route('results') }}" class="btn btn-info m-2">View Results</a> |
            <a href="{{ route('admin') }}" class="btn btn-warning m-2">Admin Panel</a> |
            <a href="{{ route('organizer') }}" class="btn btn-warning m-2">Organizer Panel</a>
        </nav>
    </header>

    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Cast Your Vote</h2>
                <form method="POST" action="{{ route('vote.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="candidate" class="form-label">Choose a Candidate:</label>
                        <select id="candidate" name="candidate_id" class="form-select" required>
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
    </section>
</body>
</html>
