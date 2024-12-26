<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel')) - FairVote</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #FFFFFF;
            color: #000000;
        }

        .main-header {
            background-color: #FF0000;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .main-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .main-header p {
            font-size: 1rem;
            margin: 0;
        }

        .main-footer {
            background-color: #FFD700;
            color: #000000;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
        }

        .navbar {
            background-color: #FF0000;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #FFFFFF !important;
        }

        .navbar-nav .nav-link:hover {
            color: #FFD700 !important;
        }

        .btn-primary {
            background-color: #0000FF;
            border-color: #0000FF;
        }

        .btn-warning {
            background-color: #FFD700;
            border-color: #FFD700;
        }

        .content {
            margin-top: 20px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .main-header {
                padding: 8px;
            }

            .main-header h1 {
                font-size: 1.2rem;
            }

            .main-header p {
                font-size: 0.9rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <header class="main-header">
            <div class="container">
                <h1>FairVote</h1>
                <p>Your secure online voting platform</p>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/">FairVote</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                            @elseif(Auth::user()->role === 'organizer')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('organizer.dashboard') }}">Organizer Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/vote">Vote</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/results">Results</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container content">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="container">
                <p>Mark, Johann, Dane, and Draico</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
