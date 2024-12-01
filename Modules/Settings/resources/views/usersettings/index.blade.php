<x-setting-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <!-- Success Message -->
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

        <h2 class="text-xl font-Robotoslab tracking-wide  font-semibold mb-6 text-gray-900 dark:text-gray-100">Manage Your Settings</h2>

        <form action="{{ route('settings.personalization.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Data Sharing -->
            <div class="mb-6">
                <h3 class="text-lg font-Roboto font-medium text-gray-800 dark:text-gray-200">Data Sharing</h3>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="allow_data_sharing" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->allow_data_sharing ? 'checked' : '' }}
                    >
                    Allow data sharing with third-party apps
                </label>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="data_copy_download" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->data_copy_download ? 'checked' : '' }}
                    >
                    Download a copy of your data
                </label>
            </div>

            <!-- Ad Preferences -->
            <div class="mb-6">
                <h3 class="text-lg font-Roboto font-medium text-gray-800 dark:text-gray-200">Ad Preferences</h3>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="manage_interests" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->manage_interests ? 'checked' : '' }}
                    >
                    Manage interests for targeted ads
                </label>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="disable_personalized_ads" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->disable_personalized_ads ? 'checked' : '' }}
                    >
                    Disable personalized ads
                </label>
            </div>

            <!-- Activity Tracking -->
            <div class="mb-6">
                <h3 class="text-lg font-Roboto font-medium text-gray-800 dark:text-gray-200">Activity Tracking</h3>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="enable_tracking" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->enable_tracking ? 'checked' : '' }}
                    >
                    Enable/Disable tracking of activities
                </label>
                <label class="block mt-2 text-gray-700 dark:text-gray-300">
                    <input 
                        type="checkbox" 
                        name="clear_history" 
                        value="1" 
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                        {{ $settings->clear_history ? 'checked' : '' }}
                    >
                    Clear watch history or search history
                </label>
            </div>

            <!-- Appearance and Accessibility -->
            

            <x-primary-button>
                {{ __('Save Settings') }}
            </x-primary-button>
        </form>
    </div>
</x-setting-layout>
