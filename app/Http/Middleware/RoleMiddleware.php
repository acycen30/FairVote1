<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $roles = explode(',', $role); // Allow multiple roles (e.g., 'role:admin,organizer')

        if (!in_array($user->role, $roles)) {
            return redirect('/error')->with('error', 'Access Denied');
        }

        return $next($request);
    }
}
