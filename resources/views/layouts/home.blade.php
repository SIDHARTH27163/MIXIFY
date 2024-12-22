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
    <body class="dark:bg-gray-950 bg-gray-50 scrollbar ">
     

    <div class="h-screen w-screen flex overflow-y-auto">
        <!-- container -->
    
        <aside
            class="hidden lg:flex flex-col items-center bg-white dark:bg-gray-950 text-gray-700 shadow
            h-full">
            <!-- Side Nav Bar-->
    
            <ul>
                <!-- Items Section -->
                <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
                    <a
                        href="."
                        class="h-16 px-6 flex justify-center items-center w-full
                        focus:text-orange-500">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                          </svg>
                          
    
                    </a>
                </li>
                <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
                    <a
                        href="/posts/create"
                        class="h-16 px-6  flex justify-center items-center w-full
                        focus:text-orange-500">
                       
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                      </svg>
                    </a>
                  
                </li>
    
                <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
                    <a
                        href="."
                        class="h-16 px-6 flex justify-center items-center w-full
                        focus:text-orange-500">
                        <svg
                            class="h-5 w-5 text-gray-800 dark:text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
    
                    </a>
                </li>
                <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
                    <a
                        href="/profile"
                        class="h-16 px-6  flex justify-center items-center w-full
                        focus:text-orange-500">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                          </svg>
                          
                    </a>
                </li>
                <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
                    <a
                        href="/settings"
                        class="h-16 px-6  flex justify-center items-center w-full
                        focus:text-orange-500">
                        <svg
                            class="h-5 w-5 text-gray-800 dark:text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1
                                0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0
                                0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2
                                2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0
                                0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1
                                0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0
                                0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65
                                0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0
                                1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0
                                1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2
                                0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0
                                1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0
                                2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0
                                0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65
                                1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </a>
                   
                </li>
               
            </ul>
    
            <div class="mt-auto h-16 flex items-center w-full">
                <!-- Action Section -->
                <button
                    class="h-16 w-10 mx-auto flex justify-center items-center
                    lg:w-full focus:text-orange-500 hover:bg-red-200 focus:outline-none">
                    <svg
                        class="h-5 w-5 text-red-700"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
    
                </button>
            </div>
    
        </aside>
    
        <div class="flex-1 flex flex-col">
            <nav class=" flex justify-between bg-white dark:bg-gray-950 h-auto py-2 px-2">
                <!-- top bar -->
    
               
    
                <ul class="flex items-center">
                    <!-- top bar center -->
                    <li>
                        <a href="{{ route('home') }}">
                            <x-application-logo class="block h-16 w-auto fill-current text-gray-800 dark:text-gray-50" />
                        </a>
                    </li>
                </ul>
    
                <ul class="flex items-center">
                    <!-- to bar right  -->
                    <li class="">
                        <label class="inline-flex items-center cursor-pointer mx-4">
                            <input type="checkbox" id="theme-toggle" class="sr-only peer">
                            <div class="relative w-11 h-6 bg-slate-900 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gray-300 dark:peer-focus:ring-gray-100 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-gray-400 after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-400"></div>
                            
                          </label>
                    </li>
                    <li class="">
                        <svg
                        class="text-gray-800 dark:text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-bell">
                            <path
                                d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
    
                    </li>

    
                    <li class="h-8 w-8">
                        <img
                            class="h-full w-full rounded-full mx-auto"
                            src="{{ Auth::user()->avatar }}"
                            alt="{{ Auth::user()->name }}" />
                    </li>
    
                </ul>
    
            </nav>
            <main class="py-1">
                {{ $slot }}
            </main>
        </div>
    
        <nav
            class="fixed bottom-0 w-full  bg-white dark:bg-slate-950 lg:hidden flex py-2
            overflow-x-auto">
            <!-- Bottom Icon Navigation Menu -->
    
            <a
                href="."
                class="flex flex-col flex-grow items-center justify-center
                overflow-hidden whitespace-no-wrap text-sm transition-colors
                duration-100 ease-in-out hover:bg-gray-200 focus:text-orange-500">
    
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                  </svg>
                  
    
                <span class="hidden text-sm capitalize">Inbox</span>
            </a>
            <a
                href="."
                class="flex flex-col flex-grow items-center justify-center 
                overflow-hidden whitespace-no-wrap text-sm transition-colors
                duration-100 ease-in-out hover:bg-gray-200 focus:text-orange-500">
    
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  
    
                <span class="hidden text-sm capitalize">Create</span>
            </a>
            <a
                href="."
                class="flex flex-col flex-grow items-center justify-center 
                overflow-hidden whitespace-no-wrap text-sm transition-colors
                duration-100 ease-in-out hover:bg-gray-200 focus:text-orange-500">
    
                <svg
                class="w-8 h-8 text-gray-800 dark:text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-bookmark">
                    <path
                        d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
    
                <span class="hidden text-sm capitalize">bookmark</span>
            </a>
            
    
            <a
            href="/profile"
            class="flex flex-col flex-grow items-center justify-center 
            overflow-hidden whitespace-no-wrap text-sm transition-colors
            duration-100 ease-in-out hover:bg-gray-200 focus:text-orange-500">

            <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
              </svg>
              

            <span class="hidden text-sm capitalize">profile</span>
        </a>
    
            <a
                href="/settings"
                class="flex flex-col flex-grow items-center justify-center 
                overflow-hidden whitespace-no-wrap text-sm transition-colors
                duration-100 ease-in-out hover:bg-gray-200 focus:text-orange-500">
    
                <svg
                class="w-8 h-8 text-gray-800 dark:text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83
                        2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65
                        0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0
                        0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2
                        2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0
                        0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0
                        4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2
                        0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0
                        1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1
                        1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0
                        0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0
                        1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0
                        0-1.51 1z"></path>
                </svg>
    
                <span class="hidden text-sm capitalize">Settings</span>
            </a>
            
    
        </nav>
    
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
