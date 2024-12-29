<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show($id, Request $request)
{
    $user = User::findOrFail($id);

    $currentUserId = Auth::id();

    // Check follow statuses
    $isFollowing = Follow::where('follower_id', $currentUserId)
                         ->where('followed_id', $user->id)
                         ->where('status', 'accepted')
                         ->exists();

    $isFollowPending = Follow::where('follower_id', $currentUserId)
                             ->where('followed_id', $user->id)
                             ->where('status', 'pending')
                             ->exists();

    $canFollowBack = Follow::where('follower_id', $user->id)
                           ->where('followed_id', $currentUserId)
                           ->where('status', 'accepted')
                           ->exists();

    // Fetch follow request notification
    $followRequestNotification = DB::table('notifications')
        ->where('notifiable_id', $currentUserId)
        ->where('type', 'App\Notifications\FollowRequestNotification')
        ->whereRaw("JSON_EXTRACT(data, '$.follower_id') = ?", [$user->id])
        ->first(); // Use `first()` instead of `get()` to retrieve a single record

    $notificationId = $followRequestNotification ? $followRequestNotification->id : null;

    // Profile privacy and posts
    $privacy =  DB::table('privacy_settings')
    ->where('user_id', $user->id)
   
    ->first();
    
    $posts = DB::table('posts')
    ->where('user_id', $user->id)
   
    ->get(); // Use `first()` instead of `get()` to retrieve a single record

  
    return view('profile.show', compact(
        'user', 'isFollowing', 'isFollowPending', 'canFollowBack', 'privacy', 'posts', 'notificationId'
    ));
}

    

    

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
