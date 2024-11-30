<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\CommunicationSetting;
use Modules\Settings\Models\PersonalizationSetting; // Assuming you're using an Eloquent model for content settings
use Illuminate\Support\Facades\Auth;


class CommunicationPersonalizationController extends Controller
{
    public function edit()
    {
        
        $user = auth()->user();
        $communicationSettings = CommunicationSetting::firstOrNew(['user_id' => $user->id]);
        $personalizationSettings = PersonalizationSetting::firstOrNew(['user_id' => $user->id]);
    
        return view('settings::CommunicationPersonalization.index', compact('communicationSettings', 'personalizationSettings'));
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
    
            $request->validate([
                'allow_messages_from' => 'required|in:everyone,friends,no_one',
                'auto_delete_messages_after_days' => 'nullable|integer|min:0',
                'who_can_comment' => 'required|in:everyone,friends,no_one',
                'block_offensive_comments' => 'boolean',
                'who_can_tag' => 'array|nullable',  // Ensure the field is an array, and allow null if no selection
                'who_can_tag.*' => 'in:everyone,friends,no_one',  // Validate each selected option
                'who_can_mention' => 'required|in:everyone,friends,no_one',
                'data_usage' => 'boolean',
                'personalization' => 'boolean',
            ]);
    
            // Prepare the data
            $data = $request->only([
                'allow_messages_from',
                'auto_delete_messages_after_days',
                'who_can_comment',
                'block_offensive_comments',
                'who_can_mention',
            ]);
    
            // Convert who_can_tag array to a comma-separated string
            $data['who_can_tag'] = $request->input('who_can_tag') ? implode(',', $request->input('who_can_tag')) : null;
    
            // Update Communication Settings
            CommunicationSetting::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );
    
            // Update Personalization Settings
            PersonalizationSetting::updateOrCreate(
                ['user_id' => $user->id],
                $request->only(['data_usage', 'personalization'])
            );
    
            return back()->with('success', 'Settings updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
            dd($e->getMessage());
            return redirect()->back()->withErrors('Failed to update settings. Please try again.');
        }
    }
    
}
