<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RichLog Dashboard') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- You can include your custom styles here or link a separate CSS file --}}
</head>
<body class="font-sans antialiased">
    <div x-data="{
                sidebarOpen: window.innerWidth >= 768, // Initial state: open on desktop
                isDesktop: window.innerWidth >= 768 // Track if current view is desktop
            }"
            x-init="
                // Set initial CSS variable for sidebar width based on current state
                document.documentElement.style.setProperty('--sidebar-width', (sidebarOpen && isDesktop) ? '16rem' : '0rem');

                // Watch sidebarOpen and update CSS variable
                $watch('sidebarOpen', value => {
                    document.documentElement.style.setProperty('--sidebar-width', (value && isDesktop) ? '16rem' : '0rem');
                });

                // Adjust sidebar visibility and width on window resize
                window.addEventListener('resize', () => {
                    const wasDesktop = isDesktop;
                    isDesktop = window.innerWidth >= 768;

                    if (!wasDesktop && isDesktop) { // Resized from mobile to desktop
                        sidebarOpen = true; // Force open sidebar when entering desktop view
                    }
                    // Always update the CSS variable based on current state and device
                    document.documentElement.style.setProperty('--sidebar-width', (sidebarOpen && isDesktop) ? '16rem' : '0rem');
                });
            "
            class="min-h-screen bg-gray-100 flex relative">

        {{-- Now the Blade component is inside the x-data scope --}}
        <x-sidebar></x-sidebar>

        <div x-cloak
            x-show="sidebarOpen && window.innerWidth < 768"
            x-transition.opacity.duration.300ms
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-10">
        </div>

        {{-- Main Content Wrapper --}}
        <div class="flex-1 flex flex-col content-wrapper"
            :class="{ 'sidebar-closed-md': !sidebarOpen && window.innerWidth >= 768 }">

            {{-- Fixed Navbar --}}
            <nav x-data="{ scrolled: false }"
                x-init="window.addEventListener('scroll', () => { scrolled = (window.scrollY > 50) });"
                :class="{ 'bg-white shadow-md': scrolled, 'bg-transparent': !scrolled }"
                class="px-6 py-4 flex justify-between items-center w-full z-10 fixed top-0 transition-all duration-300 ease-in-out"
                :style="`left: ${sidebarOpen && window.innerWidth >= 768 ? 'var(--sidebar-width)' : '0'}; width: calc(100% - ${sidebarOpen && window.innerWidth >= 768 ? 'var(--sidebar-width)' : '0'});`">

                {{-- Hamburger Menu Button (now visible on all screens) --}}
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    :class="{ 'text-gray-800': scrolled, 'text-gray-700': !scrolled }">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="flex items-center space-x-4 flex-grow justify-end">
                    <div class="relative w-1/3 max-w-sm">
                        <input type="text" placeholder="Search tasklist..." class="py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm w-full">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <div :class="{ 'text-gray-600': scrolled, 'text-gray-700': !scrolled }" class="flex items-center text-sm transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h.01M16 11h.01M9 15h.01M15 15h.01M3 21h18a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span id="currentDate"></span>
                    </div>
                    <div class="rounded-full bg-purple-200 p-2">
                        <svg class="w-6 h-6 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                </div>
            </nav>

            {{-- Main Content --}}
            <main class="flex-1 p-6 pt-24">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateElement = document.getElementById('currentDate');
            // Display the current date in "Monday, 23 June" format
            const options = { weekday: 'long', day: 'numeric', month: 'long' };
            const today = new Date();
            dateElement.textContent = today.toLocaleDateString('en-US', options);
        });
    </script>
</body>
</html>