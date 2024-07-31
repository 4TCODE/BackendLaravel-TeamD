<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
       
    //     // Get the authenticated user
    // $user = Auth::user();

    // // Check if the user has a specific role (e.g., 'admin' or 'user')
    // if ($user->hasRole('teacher')) {
    //     // Redirect to the dashboard if the user has the role
    //     return redirect()->intended(route('dashboard.index'));
    // } else {
    //     // Redirect to another page if the user does not have the role
    //     return redirect()->route('other.page');
    // }

        return redirect()->intended(route('dashboard.index'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}           
