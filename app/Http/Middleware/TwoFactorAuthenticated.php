<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check() && Auth::user()->two_factor_enabled) {
            // If the user has not completed two-factor authentication
            if (!$request->session()->has('2fa_passed')) {
                return redirect()->route('two-factor.login'); // Redirect to your 2FA login route
            }
        }

        return $next($request);
    }
}