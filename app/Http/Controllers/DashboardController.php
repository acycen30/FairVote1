<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $data = [
            'tasks' => [
                'Manage Users (Admin)',
                'View Reports (Admin)',
                'Manage Events (Organizer)',
                'View Voting Results (Both)',
            ],
            'role' => $user->role,
        ];

        return view('dashboard', $data);
    }
}
