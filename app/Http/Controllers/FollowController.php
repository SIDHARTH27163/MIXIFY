<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    // Follow a user
    public function follow(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }

        $follow = Follow::create([
            'follower_id' => Auth::id(),
            'followed_id' => $user->id,
            'status' => 'pending',
        ]);

        // Notify the followed user
        $user->notify(new \App\Notifications\FollowRequestNotification(Auth::user()));

        return back()->with('success', 'Follow request sent.');
    }

    // Unfollow a user
    public function unfollow(User $user)
    {
        $follow = Follow::where('follower_id', Auth::id())
                        ->where('followed_id', $user->id)
                        ->first();

        if ($follow) {
            $follow->delete();
            return back()->with('success', 'Unfollowed successfully.');
        }

        return back()->with('error', 'You are not following this user.');
    }

    // Accept a follow request
    public function acceptFollow(Request $request, $notificationId)
    {
        
        $notification = Auth::user()->notifications()->where('id', $notificationId)->firstOrFail();
       
        $followerId = $notification->data['follower_id'];

        // Update the follow status to accepted
        $follow = Follow::where('follower_id', $followerId)
                        ->where('followed_id', Auth::id())
                        ->firstOrFail();

        $follow->update(['status' => 'accepted']);
        
        // Notify the follower about the acceptance
        User::find($followerId)->notify(new \App\Notifications\FollowRequestResponseNotification('accepted'));

        // Delete the notification after responding
        $notification->delete();

        return back()->with('success', 'Follow request accepted.');
    }

    // Reject a follow request
    public function rejectFollow(Request $request, $notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $followerId = $notification->data['follower_id'];

        // Delete the pending follow request
        $follow = Follow::where('follower_id', $followerId)
                        ->where('followed_id', Auth::id())
                        ->firstOrFail();

        $follow->delete();

        // Notify the follower about the rejection
        User::find($followerId)->notify(new \App\Notifications\FollowRequestResponseNotification('rejected'));

        // Delete the notification after responding
        $notification->delete();

        return back()->with('success', 'Follow request rejected.');
    }

    // Follow Back a user
    public function followBack(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }

        // Check if already following
        $alreadyFollowing = Follow::where('follower_id', Auth::id())
            ->where('followed_id', $user->id)
            ->where('status', 'accepted')
            ->exists();

        if (!$alreadyFollowing) {
            Follow::create([
                'follower_id' => Auth::id(),
                'followed_id' => $user->id,
                'status' => 'accepted',  // Automatically accepted
            ]);
        }

        return back()->with('success', 'Followed back.');
    }
}
