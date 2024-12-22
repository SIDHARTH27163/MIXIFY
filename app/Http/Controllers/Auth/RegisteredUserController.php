<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;  // Correctly import the Str class at the top
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generate an avatar URL using a service
        $avatar = 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=random&size=128';

        // Generate a default username based on the name (slugged version)
        $username = Str::slug($request->name) . rand(1000, 9999);

        // Ensure the username is unique
        while (User::where('username', $username)->exists()) {
            $username = Str::slug($request->name) . rand(1000, 9999);
        }

        // Create the user with the avatar and username
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar,
            'username' => $username,  // Store the generated username
        ]);

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
