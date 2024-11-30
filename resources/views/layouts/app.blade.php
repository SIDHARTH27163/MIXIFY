<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-slate-900">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-900 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const themeToggle = document.getElementById('theme-toggle');
          const htmlElement = document.documentElement;
        
          // Set initial theme based on localStorage
          const savedTheme = localStorage.getItem('theme');
          if (savedTheme === 'dark') {
            htmlElement.classList.add('dark');
            themeToggle.checked = true;
          }
        
          // Toggle theme when checkbox is clicked
          themeToggle.addEventListener('change', function() {
            if (themeToggle.checked) {
              htmlElement.classList.add('dark');
              localStorage.setItem('theme', 'dark');
            } else {
              htmlElement.classList.remove('dark');
              localStorage.setItem('theme', 'light');
            }
          });
        });
        
        
        </script>
</html>
