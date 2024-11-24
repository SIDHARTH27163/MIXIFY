<x-setting-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg dark:bg-gray-900">
        @if (session('success'))
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('settings.privacy.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Profile Visibility -->
            <div>
                <label for="profile_visibility" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Profile Visibility
                </label>
                <select name="profile_visibility" id="profile_visibility" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="1" {{ $privacySettings->profile_visibility ? 'selected' : '' }}>Public</option>
                    <option value="0" {{ !$privacySettings->profile_visibility ? 'selected' : '' }}>Private</option>
                </select>
            </div>

            <!-- Last Seen Visibility -->
            <div>
                <label for="last_seen_visibility" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Last Seen Visibility
                </label>
                <select name="last_seen_visibility" id="last_seen_visibility" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="everyone" {{ $privacySettings->last_seen_visibility === 'everyone' ? 'selected' : '' }}>Everyone</option>
                    <option value="friends" {{ $privacySettings->last_seen_visibility === 'friends' ? 'selected' : '' }}>Friends</option>
                    <option value="nobody" {{ $privacySettings->last_seen_visibility === 'nobody' ? 'selected' : '' }}>Nobody</option>
                </select>
            </div>

            <!-- Activity Status -->
            <div>
                <label for="activity_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Activity Status
                </label>
                <select name="activity_status" id="activity_status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="1" {{ $privacySettings->activity_status ? 'selected' : '' }}>Enabled</option>
                    <option value="0" {{ !$privacySettings->activity_status ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>

            <!-- Content Visibility -->
            <div>
                <label for="content_visibility" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Content Visibility
                </label>
                <select name="content_visibility" id="content_visibility" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="everyone" {{ $privacySettings->content_visibility === 'everyone' ? 'selected' : '' }}>Everyone</option>
                    <option value="friends" {{ $privacySettings->content_visibility === 'friends' ? 'selected' : '' }}>Friends</option>
                    <option value="only_me" {{ $privacySettings->content_visibility === 'only_me' ? 'selected' : '' }}>Only Me</option>
                </select>
            </div>

            <!-- Theme Toggle -->
            

            <!-- Save Button -->
            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-setting-layout>
