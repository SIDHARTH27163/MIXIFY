<?php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\FriendFollowerSetting;
 // Assuming you're using an Eloquent model for content settings
use Illuminate\Support\Facades\Auth;

class FriendFollowerSettingsController extends Controller
{
    public function index()
    {
        $settings = FriendFollowerSetting::firstOrCreate(['user_id' => Auth::id()]);
        return view('settings::friend_follower.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try{
        $settings = FriendFollowerSetting::firstOrCreate(['user_id' => Auth::id()]);

        $validated = $request->validate([
            'friend_request_permission' => 'required|in:everyone,friends_of_friends,no_one',
            'approve_followers_manually' => 'nullable|boolean',
            'remove_follower_without_blocking' => 'nullable|boolean',
            'default_group_visibility' => 'required|in:public,private,secret',
        ]);

        // Set checkbox defaults
        $validated['approve_followers_manually'] = $request->has('approve_followers_manually') ? 1 : 0;
        $validated['remove_follower_without_blocking'] = $request->has('remove_follower_without_blocking') ? 1 : 0;

        $settings->update($validated);

        return redirect()->back()->with('success', 'Friend and Follower settings updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
        // dd($e->getMessage());
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
    }
}
