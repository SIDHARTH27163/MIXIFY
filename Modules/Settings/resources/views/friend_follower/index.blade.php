<x-setting-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
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

        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Friend and Follower Settings</h2>

        <form action="{{ route('settings.friend-follower.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Friend Requests -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Friend Requests</h3>
                <select name="friend_request_permission" 
                        class="w-full mt-2 px-4 py-2 rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    <option value="everyone" {{ $settings->friend_request_permission === 'everyone' ? 'selected' : '' }}>Everyone</option>
                    <option value="friends_of_friends" {{ $settings->friend_request_permission === 'friends_of_friends' ? 'selected' : '' }}>Friends of Friends</option>
                    <option value="no_one" {{ $settings->friend_request_permission === 'no_one' ? 'selected' : '' }}>No One</option>
                </select>
            </div>

            <!-- Follower Controls -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Follower Controls</h3>
                <label class="block text-gray-700 dark:text-gray-300">
                    <input type="checkbox" 
                           name="approve_followers_manually" 
                           value="1" 
                           class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                           {{ $settings->approve_followers_manually ? 'checked' : '' }}>
                    Approve followers manually
                </label>
                <label class="block text-gray-700 dark:text-gray-300">
                    <input type="checkbox" 
                           name="remove_follower_without_blocking" 
                           value="1" 
                           class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                           {{ $settings->remove_follower_without_blocking ? 'checked' : '' }}>
                    Remove a follower without blocking
                </label>
            </div>

            <!-- Group Settings -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Group Settings</h3>
                <select name="default_group_visibility" 
                        class="w-full mt-2 px-4 py-2 rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    <option value="public" {{ $settings->default_group_visibility === 'public' ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ $settings->default_group_visibility === 'private' ? 'selected' : '' }}>Private</option>
                    <option value="secret" {{ $settings->default_group_visibility === 'secret' ? 'selected' : '' }}>Secret</option>
                </select>
            </div>

            <x-primary-button>
                {{ __('Save Settings') }}
            </x-primary-button>
        </form>
    </div>
</x-setting-layout>
