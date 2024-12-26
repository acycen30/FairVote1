<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Results')</title>
</head>
<body>
    <header>
        <h1>Voting Results</h1>
        <nav>
            <a href="{{ route('home') }}" class="btn btn-primary m-2">Home</a> |
            <a href="{{ route('vote') }}" class="btn btn-primary m-2">Vote Now</a> |
            <a href="{{ route('admin') }}" class="btn btn-warning m-2">Admin Panel</a> |
            <a href="{{ route('organizer') }}" class="btn btn-warning m-2">Organizer Panel</a>
        </nav>
    </header>

    <section>
        <h2 class="text-center mb-4">Current Vote Counts</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Candidate</th>
                    <th>Party Affiliation</th>
                    <th>Position</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voteCounts as $voteCount)
                    <tr>
                        <td>{{ $voteCount->candidate->candidate_name }}</td>
                        <td>{{ $voteCount->candidate->party_affiliation }}</td>
                        <td>{{ $voteCount->candidate->election_position }}</td>
                        <td>{{ $voteCount->vote_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
