<?php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Models\PrivacySetting;
use Illuminate\Support\Facades\Auth;

class PrivacySettingsController extends Controller
{
    public function index()
    {
        $privacySettings = PrivacySetting::firstOrCreate(['user_id' => Auth::id()], [
            'profile_visibility' => 1,
            'last_seen_visibility' => 'everyone',
            'activity_status' => 1,
            'content_visibility' => 'everyone',
        ]);

        return view('settings::index', compact('privacySettings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'profile_visibility' => 'required|boolean',
            'last_seen_visibility' => 'required|in:everyone,friends,nobody',
            'activity_status' => 'required|boolean',
            'content_visibility' => 'required|in:everyone,friends,only_me',
        ]);

        $privacySettings = PrivacySetting::where('user_id', Auth::id())->first();
        $privacySettings->update($request->all());

        return redirect()->back()->with('success', 'Privacy settings updated successfully.');
    }
}
