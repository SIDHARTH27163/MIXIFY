<x-home-layout>
    <div class="font-poppins max-w-7xl mx-auto p-5 gap-4 dark:text-white text-black">
        
        <div class="mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-4xl grid grid-cols-2 gap-4">
            <!-- Preview Container -->
            <div id="preview-container" class="h-full bg-gray-50 dark:bg-gray-800 p-4 rounded-lg overflow-auto flex flex-col items-center justify-center border border-gray-300 dark:border-gray-600">
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <p class="text-lg font-semibold mb-4">Preview Area</p>
                    <p class="text-sm">Uploaded images and videos will appear here</p>
                </div>
            </div>

            <!-- Form Wrapper -->
            <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-5">
                @csrf
                <h2 class="text-xl font-semibold mb-4">Create a Post</h2>

                <!-- Step 1: Drag-and-Drop for Images or Video -->
                <div id="step-1" class="step">
                    <div class="mb-4">
                        <x-input-label :value="__('Upload Photos or Video')" />
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, GIF, or MP4 (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="media[]" multiple class="hidden" accept="image/*,video/*" />
                            </label>
                        </div>
                        
                    </div>

                    <!-- Next Button -->
                    <div class="mt-4">
                        <button type="button" id="next-button" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
                    </div>
                </div>

                <!-- Step 2: Additional Fields -->
                <div id="step-2" class="step hidden">
                    <!-- Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                       
                    </div>

                    <!-- Caption -->
                    <div class="mb-4">
                        <x-input-label for="caption" :value="__('Caption')" />
                        <x-text-area id="caption" name="caption" rows="3" class="block mt-1 w-full">{{ old('caption') }}</x-text-area>
                       
                    </div>

                    <!-- Tags -->
                    <div class="mb-4">
                        <x-input-label for="tags" :value="__('Tags')" />
                        <x-text-input id="tags" class="block mt-1 w-full" type="text" name="tags" placeholder="#example, #tags" />
                      
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" />
                     
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button>{{ __('Post') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Steps and Image Preview -->
    <script>
        document.getElementById('next-button').addEventListener('click', function () {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.remove('hidden');
        });

        const fileInput = document.getElementById('dropzone-file');
const previewContainer = document.getElementById('preview-container');

fileInput.addEventListener('change', function () {
    // Clear previous previews
    previewContainer.innerHTML = '';

    const files = Array.from(fileInput.files);

    if (files.length === 0) {
        // Reset preview area if no files are selected
        previewContainer.innerHTML = `
            <div class="text-center text-gray-500 dark:text-gray-400">
                <p class="text-lg font-semibold mb-4">Preview Area</p>
                <p class="text-sm">Uploaded images and videos will appear here</p>
            </div>
        `;
        return;
    }

    // Add grid layout for multiple files
    if (files.length > 1) {
        previewContainer.classList.add('grid', 'grid-cols-2', 'gap-4', 'sm:grid-cols-3');
    } else {
        previewContainer.classList.remove('grid', 'grid-cols-2', 'gap-4', 'sm:grid-cols-3');
    }

    // Show previews for all selected files
    files.forEach((file) => {
        const reader = new FileReader();

        reader.onload = (e) => {
            const previewElement = document.createElement('div');
            previewElement.classList.add('relative', 'h-48', 'w-full', 'rounded', 'overflow-hidden', 'shadow-md');

            // Add an image or video tag depending on file type
            if (file.type.startsWith('image/')) {
                previewElement.innerHTML = `<img src="${e.target.result}" alt="${file.name}" class="object-cover h-full w-full">`;
            } else if (file.type.startsWith('video/')) {
                previewElement.innerHTML = `<video src="${e.target.result}" controls class="object-cover h-full w-full"></video>`;
            }

            previewContainer.appendChild(previewElement);
        };

        reader.readAsDataURL(file);
    });
});

    </script>
    
</x-home-layout>
