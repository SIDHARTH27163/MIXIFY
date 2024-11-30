<?php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Models\NotificationSetting;
use Illuminate\Support\Facades\Auth;

class NotificationSettingsController extends Controller
{
    public function edit()
    {
        $notificationSettings = NotificationSetting::firstOrCreate(['user_id' => Auth::id()]);
        return view('settings::notifications.edit', compact('notificationSettings'));
    }

    public function updateNotifications(Request $request)
    {
        try {
            $user = auth()->user();
    
            // Retrieve or create notification settings for the user
            $notificationSettings = NotificationSetting::firstOrCreate(['user_id' => $user->id]);
    
            // Update notification settings
            $notificationSettings->update([
                'push_likes' => $request->has('push_likes'),
                'push_comments' => $request->has('push_comments'),
                'push_shares' => $request->has('push_shares'),
                'push_messages' => $request->has('push_messages'),
                'push_friend_requests' => $request->has('push_friend_requests'),
                'push_follower_updates' => $request->has('push_follower_updates'),
                'email_weekly_summary' => in_array('weekly_summary', $request->input('email_notifications', [])),
                'email_security_alerts' => in_array('security_alerts', $request->input('email_notifications', [])),
                'email_updates_followed' => in_array('updates_followed', $request->input('email_notifications', [])),
                'inapp_mentions' => $request->has('inapp_mentions'),
                'inapp_tagged' => $request->has('inapp_tagged'),
                'sound' => $request->has('sound'),
                'vibrate' => $request->has('vibrate'),
            ]);
    
            return redirect()->back()->with('success', 'Notification settings updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Notification Settings Update Error', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to update settings. Please try again.');
        }
    }
    

}
