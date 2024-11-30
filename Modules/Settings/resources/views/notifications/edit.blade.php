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


        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6 font-Roboto leading-10 tracking-wide">Notification Settings</h2>

        <form method="POST" action="{{ route('settings.notifications.update') }}">
            @csrf
            @method('PUT')

            <!-- Push Notifications -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Push Notifications</legend>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['likes', 'comments', 'shares', 'messages', 'friend_requests', 'follower_updates'] as $item)
                        <div class="flex items-center font-Montserrat">
                            <input type="checkbox" id="push_{{ $item }}" name="push_{{ $item }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                                {{ $notificationSettings->{"push_$item"} ? 'checked' : '' }}>
                            <label for="push_{{ $item }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                {{ ucfirst(str_replace('_', ' ', $item)) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <!-- Email Notifications -->
            <fieldset class="mb-6">
                
                

                    <label for="countries" class="block mb-2 text-md font-medium text-gray-900 dark:text-white font-ubuntu">Email Notifications</label>
                    <select name="email_notifications[]" id="countries" class="font-Montserrat bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach(['weekly_summary' => 'Weekly Activity Summary', 'security_alerts' => 'Security Alerts', 'updates_followed' => 'Updates from Followed Accounts'] as $key => $value)
                        <option value="{{ $key }}" {{ $notificationSettings->$key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                    </select>

  
            </fieldset>

            <!-- In-App Notifications -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">In-App Notifications</legend>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['mentions' => 'Mentioned in a Post', 'tagged' => 'Tagged in a Photo or Video'] as $key => $value)
                        <div class="flex items-center font-Montserrat">
                            <input type="checkbox" id="inapp_{{ $key }}" name="inapp_{{ $key }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                                {{ $notificationSettings->$key ? 'checked' : '' }}>
                            <label for="inapp_{{ $key }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                {{ $value }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <!-- Sound and Vibration -->
            <fieldset class="mb-6">
                <legend class="text-md font-ubuntu font-medium text-gray-700 dark:text-gray-300 mb-4">Sound and Vibration</legend>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['sound' => 'Enable Sound', 'vibrate' => 'Enable Vibration'] as $key => $value)
                        <div class="flex items-center font-Montserrat">
                            <input type="checkbox" id="{{ $key }}" name="{{ $key }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-500"
                                {{ $notificationSettings->$key ? 'checked' : '' }}>
                            <label for="{{ $key }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                {{ $value }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <x-primary-button>
                {{ __('Save Changes') }}
            </x-primary-button>
        </form>
    </div>
</x-setting-layout>
