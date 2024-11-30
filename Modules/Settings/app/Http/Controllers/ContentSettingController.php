<?php

// app/Modules/Settings/Http/Controllers/ContentSettingController.php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\ContentSetting; // Assuming you're using an Eloquent model for content settings
use Illuminate\Support\Facades\Auth;

class ContentSettingController extends Controller
{
    // Show the content settings form
    public function index()
    {
        // Get current settings for the authenticated user
        $contentSettings = ContentSetting::where('user_id', Auth::id())->first();
// If no settings exist, create a new one with default values
        if (!$contentSettings) {
            $contentSettings = new ContentSetting([
                'post_visibility' => 'public', 
                'location_sharing' => false,
                'hide_sensitive_content' => false,
                'auto_play_videos' => false,
                'language' => 'en'
            ]);
        }
                // Pass settings to the view
        return view('settings::content.content', compact('contentSettings'));
    }

    // Update the content settings
    public function update(Request $request)
    {
        
        try{
       
        // Validate incoming request data
        $validated = $request->validate([
            'post_visibility' => 'required|in:public,friends,only_me',
            'location_sharing' => 'boolean',
            'hide_sensitive_content' => 'boolean',
            'auto_play_videos' => 'boolean',
            'language' => 'required|string|in:en,es,fr',
        ]);
        // dd($validated);
        
        // Update or create the content settings for the authenticated user
        $settings = ContentSetting::updateOrCreate(
            ['user_id' => Auth::id()],
            $validated
        );
      

        // Redirect back with success message
        return redirect()->route('settings.content')->with('success', 'Content settings updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
        //  dd($e->getMessage());
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
    }
}
