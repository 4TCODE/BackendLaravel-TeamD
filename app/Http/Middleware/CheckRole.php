<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // If the user is not logged in, redirect to the login page
            return redirect('/login');
        }

        $user = Auth::user();

        // Check if the user does not have the role 'super_admin' or 'teacher'
        if (!$user->hasRole('super_admin') && !$user->hasRole('teacher')) {
            // Redirect to another page if the user does not have the role
            return redirect()->route('student.index');
        }

        // Allow the request to proceed if the user has the required role
        return $next($request);
    }
}
