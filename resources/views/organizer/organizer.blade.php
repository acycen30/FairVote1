<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Organizer Panel')</title>
</head>
<body>
    <header>
        <h1>Organizer Panel</h1>
        <nav>
            <a href="{{ route('home') }}" class="btn btn-primary m-2">Home</a> |
            <a href="{{ route('vote') }}" class="btn btn-primary m-2">Vote Now</a> |
            <a href="{{ route('results') }}" class="btn btn-info m-2">View Results</a> |
            <a href="{{ route('admin') }}" class="btn btn-warning m-2">Admin Panel</a>
        </nav>
    </header>

    <section>
        <h2 class="text-center mb-4">Organizer Actions</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('voters.index') }}" class="btn btn-primary w-100 mb-2">Manage Voters</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('candidates.index') }}" class="btn btn-primary w-100 mb-2">Manage Candidates</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('positions.index') }}" class="btn btn-primary w-100 mb-2">Manage Positions</a>
            </div>
        </div>
    </section>
</body>
</html>
