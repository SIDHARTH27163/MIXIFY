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

    $user = Auth::user();

    // Store user ID in the session for two-factor authentication
    $request->session()->put('login.id', $user->id);

    // Debugging output to check session value
    // print_r("Session Login ID: " . $request->session()->get('login.id'));

    if ($user->two_factor_secret) {
        $request->session()->put('two_factor_auth', true);
        return redirect()->route('two-factor.login');
    }

    return redirect()->intended(route('dashboard', absolute: false));

        // Redirect to the intended page if 2FA is not enabled
        // return redirect()->intended(route('dashboard', absolute: false));
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