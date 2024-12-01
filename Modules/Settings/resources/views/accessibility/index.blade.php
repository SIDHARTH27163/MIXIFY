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

        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Accessibility Settings</h2>

        <form action="{{ route('settings.accessibility-settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Font Size -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Font Size</h3>
                <select name="font_size" 
                        class="w-full mt-2 px-4 py-2 rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    <option value="small" {{ $settings->font_size === 'small' ? 'selected' : '' }}>Small</option>
                    <option value="medium" {{ $settings->font_size === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="large" {{ $settings->font_size === 'large' ? 'selected' : '' }}>Large</option>
                </select>
            </div>

            <!-- Font Style -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Font Style</h3>
                <select name="font_style" 
                        class="w-full mt-2 px-4 py-2 rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    <option value="default" {{ $settings->font_style === 'default' ? 'selected' : '' }}>Default</option>
                    <option value="serif" {{ $settings->font_style === 'serif' ? 'selected' : '' }}>Serif</option>
                    <option value="sans-serif" {{ $settings->font_style === 'sans-serif' ? 'selected' : '' }}>Sans-serif</option>
                </select>
            </div>

            <!-- Screen Reader Support -->
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300">
                    <input type="checkbox" 
                           name="screen_reader_support" 
                           value="1" 
                           class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                           {{ $settings->screen_reader_support ? 'checked' : '' }}>
                    Enable screen reader support
                </label>
            </div>

            <!-- Video Captions -->
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300">
                    <input type="checkbox" 
                           name="video_captions" 
                           value="1" 
                           class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:focus:ring-blue-400"
                           {{ $settings->video_captions ? 'checked' : '' }}>
                    Enable captions for videos
                </label>
            </div>

            <x-primary-button>
                {{ __('Save Settings') }}
            </x-primary-button>
        </form>
    </div>
</x-setting-layout>
