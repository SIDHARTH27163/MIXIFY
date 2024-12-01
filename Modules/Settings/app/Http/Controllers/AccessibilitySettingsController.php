<?php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\AccessibilitySetting;
 // Assuming you're using an Eloquent model for content settings
use Illuminate\Support\Facades\Auth;


class AccessibilitySettingsController extends Controller
{
    public function index()
    {
        $settings = AccessibilitySetting::firstOrCreate(['user_id' => Auth::id()]);

        // return($settings);
        return view('settings::accessibility.index', compact('settings'));
        // return view('settings::accessibility.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try{
        $settings = AccessibilitySetting::firstOrCreate(['user_id' => Auth::id()]);
    
        // Validate input
        $validated = $request->validate([
            'font_size' => 'required|in:small,medium,large',
            'font_style' => 'required|in:default,serif,sans-serif',
            'screen_reader_support' => 'nullable|boolean',
            'video_captions' => 'nullable|boolean',
        ]);
    
        // Set defaults for checkboxes if not included in the request
        $validated['screen_reader_support'] = $request->has('screen_reader_support') ? (bool)$request->input('screen_reader_support') : false;
        $validated['video_captions'] = $request->has('video_captions') ? (bool)$request->input('video_captions') : false;
    
        // Update the settings
        $settings->update($validated);
    
        return redirect()->back()->with('success', 'Accessibility settings updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
        // dd($e->getMessage());
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
    }
    
}
