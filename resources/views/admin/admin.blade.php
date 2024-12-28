<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="{{ route('home') }}" class="btn btn-primary m-2">Home</a> |
            <a href="{{ route('vote') }}" class="btn btn-primary m-2">Vote Now</a> |
            <a href="{{ route('results') }}" class="btn btn-info m-2">View Results</a> |
            <a href="{{ route('organizer') }}" class="btn btn-warning m-2">Organizer Panel</a>
        </nav>
    </header>

    <section>
        <h2 class="text-center mb-4">Manage Voting System</h2>
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
    </section>
</body>
</html>
