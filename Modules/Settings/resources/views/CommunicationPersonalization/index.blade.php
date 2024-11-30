<x-setting-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg dark:bg-gray-900">
        @if (session('success'))
        <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-200 rounded-md p-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6 font-Roboto leading-10 tracking-wide">Update Communication Settings</h2>

    <!-- Form to update settings -->
    <form action="{{ route('settings.communicationpersonalization.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Allow Messages From -->
        <div class="mb-6">
            <label for="allow_messages_from" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Allow Messages From</label>
            <div class="mt-2 space-y-2 font-Montserrat">
                <label class="inline-flex items-center">
                    <input type="radio" name="allow_messages_from" value="everyone" 
                    {{ old('allow_messages_from', $communicationSettings->allow_messages_from ?? '') == 'everyone' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Everyone</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="allow_messages_from" value="friends" 
                    {{ old('allow_messages_from', $communicationSettings->allow_messages_from ?? '') == 'friends' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Friends</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="allow_messages_from" value="no_one" 
                    {{ old('allow_messages_from', $communicationSettings->allow_messages_from ?? '') == 'no_one' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">No One</span>
                </label>
            </div>
        </div>

        <!-- Auto Delete Messages After Days -->
        <div class="mb-6 font-Montserrat">
            <label for="auto_delete_messages_after_days" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Auto Delete Messages After (Days)</label>
            <input type="number" name="auto_delete_messages_after_days" id="auto_delete_messages_after_days" 
                   value="{{ old('auto_delete_messages_after_days', $communicationSettings->auto_delete_messages_after_days ?? '') }}"
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-800 dark:text-gray-300 sm:text-sm">
        </div>

        <!-- Who Can Comment -->
        <div class="mb-6 font-Montserrat">
            <label for="who_can_comment" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Who Can Comment</label>
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_comment" value="everyone" 
                    {{ old('who_can_comment', $communicationSettings->who_can_comment ?? '') == 'everyone' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Everyone</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_comment" value="friends" 
                    {{ old('who_can_comment', $communicationSettings->who_can_comment ?? '') == 'friends' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Friends</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_comment" value="no_one" 
                    {{ old('who_can_comment', $communicationSettings->who_can_comment ?? '') == 'no_one' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">No One</span>
                </label>
            </div>
        </div>

        <!-- Block Offensive Comments -->
        <div class="mb-6 font-Montserrat">
            <label for="block_offensive_comments" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Block Offensive Comments</label>
            <input type="checkbox" name="block_offensive_comments" id="block_offensive_comments" 
                   value="1" class="mt-2 text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700" 
                   {{ old('block_offensive_comments', $communicationSettings->block_offensive_comments ?? false) ? 'checked' : '' }} />
        </div>

        <!-- Who Can Tag -->
        <div class="mb-6 font-Montserrat">
            <label for="who_can_tag" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Who Can Tag</label>
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="who_can_tag[]" value="everyone" 
                    {{ in_array('everyone', old('who_can_tag', explode(',', $communicationSettings->who_can_tag ?? ''))) ? 'checked' : '' }} 
                    class="form-checkbox text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Everyone</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="who_can_tag[]" value="friends" 
                    {{ in_array('friends', old('who_can_tag', explode(',', $communicationSettings->who_can_tag ?? ''))) ? 'checked' : '' }} 
                    class="form-checkbox text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Friends</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="who_can_tag[]" value="no_one" 
                    {{ in_array('no_one', old('who_can_tag', explode(',', $communicationSettings->who_can_tag ?? ''))) ? 'checked' : '' }} 
                    class="form-checkbox text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">No One</span>
                </label>
            </div>
        </div>

        <!-- Who Can Mention -->
        <div class="mb-6 font-Montserrat">
            <label for="who_can_mention" class="block text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300">Who Can Mention</label>
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_mention" value="everyone" 
                    {{ old('who_can_mention', $communicationSettings->who_can_mention ?? '') == 'everyone' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Everyone</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_mention" value="friends" 
                    {{ old('who_can_mention', $communicationSettings->who_can_mention ?? '') == 'friends' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Friends</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="who_can_mention" value="no_one" 
                    {{ old('who_can_mention', $communicationSettings->who_can_mention ?? '') == 'no_one' ? 'checked' : '' }} 
                    class="form-radio text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-700">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">No One</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-primary-button>
                {{ __('Save Settings') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-setting-layout>
