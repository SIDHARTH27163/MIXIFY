import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import FullReload from 'vite-plugin-full-reload';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        FullReload([
            'resources/views/**/*.blade.php',
            'Modules/**/resources/views/**/*.blade.php', // Watch Blade files in modules
        ]),
    ],
});
