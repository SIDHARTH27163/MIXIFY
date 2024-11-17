<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\TwoFactorChallengeViewResponse;
use Illuminate\Contracts\Support\Responsable;

class CustomTwoFactorChallengeViewResponse implements TwoFactorChallengeViewResponse
{
    public function toResponse($request)
    {
        // Return the view for two-factor authentication challenge
        return view('auth.two-factor-challenge'); // Adjust the view path as needed
    }
}