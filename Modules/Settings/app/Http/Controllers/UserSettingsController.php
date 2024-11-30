<?php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\UserSetting;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function index()
    {
        $settings = UserSetting::firstOrCreate(['user_id' => auth()->id()]);
        return view('settings::usersettings.index', compact('settings'));
    }

    public function update(Request $request)
{
    try {
        // Prepare request data to handle unchecked checkboxes
        $data = $request->all();
        $data['allow_data_sharing'] = $request->has('allow_data_sharing') ? 1 : 0;
        $data['data_copy_download'] = $request->has('data_copy_download') ? 1 : 0;
        $data['manage_interests'] = $request->has('manage_interests') ? 1 : 0;
        $data['disable_personalized_ads'] = $request->has('disable_personalized_ads') ? 1 : 0;
        $data['enable_tracking'] = $request->has('enable_tracking') ? 1 : 0;
        $data['clear_history'] = $request->has('clear_history') ? 1 : 0;

        // Validate request data
        $validated = $request->validate([
            'allow_data_sharing' => 'nullable|boolean',
            'data_copy_download' => 'nullable|boolean',
            'manage_interests' => 'nullable|boolean',
            'disable_personalized_ads' => 'nullable|boolean',
            'enable_tracking' => 'nullable|boolean',
            'clear_history' => 'nullable|boolean',
            'custom_appearance.theme' => 'nullable|string|max:255',
        ]);

        // Fetch or create the user settings record
        $settings = UserSetting::firstOrCreate(['user_id' => auth()->id()]);

        // Update the settings
        $settings->update($data);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    } catch (\Exception $e) {
        \Log::error('User Settings Update Error', ['error' => $e->getMessage()]);
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
}

}