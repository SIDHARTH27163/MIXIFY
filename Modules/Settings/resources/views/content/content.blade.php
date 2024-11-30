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

        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6 font-Roboto leading-10 tracking-wide">Content Settings</h2>

        <form method="POST" action="{{ route('settings.content.update') }}">
            @csrf
            @method('PUT')

            <!-- Post Preferences -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Post Preferences</legend>
                <div class="grid grid-cols-3 gap-4">
                    @foreach(['public' => 'Public', 'friends' => 'Friends', 'only_me' => 'Only Me'] as $value => $label)
                        <div class="flex items-center font-Montserrat">
                            <input type="radio" id="post_visibility_{{ $value }}" name="post_visibility" value="{{ $value }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                                {{ isset($contentSettings) && $contentSettings->post_visibility == $value ? 'checked' : '' }}>
                            <label for="post_visibility_{{ $value }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <!-- Location Sharing -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Location Sharing</legend>
                <div class="flex items-center font-Montserrat">
                   <!-- Location Sharing -->
                <input type="hidden" name="location_sharing" value="0">
                <input type="checkbox" id="location_sharing" name="location_sharing" value="1"
                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                    {{ isset($contentSettings) && $contentSettings->location_sharing ? 'checked' : '' }}>
                <label for="location_sharing" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Enable location sharing in posts</label>

                </div>
            </fieldset>

            <!-- Content Filters -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Content Filters</legend>
                <div class="flex items-center font-Montserrat">
                    <input type="checkbox" id="hide_sensitive_content" name="hide_sensitive_content"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                        {{ isset($contentSettings) && $contentSettings->hide_sensitive_content ? 'checked' : '' }}>
                    <label for="hide_sensitive_content" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Hide sensitive content</label>
                </div>
                <div class="flex items-center font-Montserrat mt-4">
                    <input type="hidden" name="auto_play_videos" value="0">
                    <input type="checkbox" id="auto_play_videos" name="auto_play_videos" value="1"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                        {{ isset($contentSettings) && $contentSettings->auto_play_videos ? 'checked' : '' }}>
                    <label for="auto_play_videos" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Enable auto-play for videos</label>

                </div>
            </fieldset>

            <!-- Language Preferences -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Language Preferences</legend>
                <div class="grid grid-cols-3 gap-4">
                    @foreach(['en' => 'English', 'es' => 'Spanish', 'fr' => 'French'] as $value => $label)
                        <div class="flex items-center font-Montserrat">
                            <input type="radio" id="language_{{ $value }}" name="language" value="{{ $value }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                                {{ isset($contentSettings) && $contentSettings->language == $value ? 'checked' : '' }}>
                            <label for="language_{{ $value }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <x-primary-button>
                {{ __('Save Settings') }}
            </x-primary-button>
        </form>
    </div>
</x-setting-layout>
