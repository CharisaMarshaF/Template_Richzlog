{{-- <!DOCTYPE html>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="font-sans antialiased">
    <div x-data="{
                sidebarOpen: window.innerWidth >= 768,
                isDesktop: window.innerWidth >= 768
            }" x-init="
                document.documentElement.style.setProperty('--sidebar-width', (sidebarOpen && isDesktop) ? '16rem' : '0rem');
                $watch('sidebarOpen', value => {
                    document.documentElement.style.setProperty('--sidebar-width', (value && isDesktop) ? '16rem' : '0rem');
                });
                window.addEventListener('resize', () => {
                    const wasDesktop = isDesktop;
                    isDesktop = window.innerWidth >= 768;

                    if (!wasDesktop && isDesktop) {
                        sidebarOpen = true;
                    }
                    document.documentElement.style.setProperty('--sidebar-width', (sidebarOpen && isDesktop) ? '16rem' : '0rem');
                });
            " class="min-h-screen bg-gray-100 flex relative">
        <x-sidebar></x-sidebar>

        <div x-cloak x-show="sidebarOpen && window.innerWidth < 768" x-transition.opacity.duration.300ms
            @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-10">
        </div>

        <div class="flex-1 flex flex-col content-wrapper"
            :class="{ 'sidebar-closed-md': !sidebarOpen && window.innerWidth >= 768 }">

            <nav x-data="{ scrolled: false }"
                x-init="window.addEventListener('scroll', () => { scrolled = (window.scrollY > 50) });"
                :class="{ 'bg-white shadow-md': scrolled, 'bg-transparent': !scrolled }"
                class="px-6 py-4 flex justify-between items-center w-full z-10 fixed top-0 transition-all duration-300 ease-in-out"
                :style="`left: ${sidebarOpen && window.innerWidth >= 768 ? 'var(--sidebar-width)' : '0'}; width: calc(100% - ${sidebarOpen && window.innerWidth >= 768 ? 'var(--sidebar-width)' : '0'});`">

                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    :class="{ 'text-gray-800': scrolled, 'text-gray-700': !scrolled }">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="flex items-center space-x-4 flex-grow justify-end">
                    <div class="relative w-1/3 max-w-sm">
                        <input type="text" placeholder="Search tasklist..."
                            class="py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm w-full">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div :class="{ 'text-gray-600': scrolled, 'text-gray-700': !scrolled }"
                        class="flex items-center text-sm transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h.01M16 11h.01M9 15h.01M15 15h.01M3 21h18a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span id="currentDate"></span>
                    </div>
                    <div class="rounded-full bg-purple-200 p-2">
                        <svg class="w-6 h-6 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </nav>

            <main class="flex-1 p-6 pt-24">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateElement = document.getElementById('currentDate');
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            };
            const today = new Date();
            dateElement.textContent = today.toLocaleDateString('en-US', options);
        });
        // Modal functionality
        $(document).on('click', '[data-modal-target]', function () {
            const target = $(this).data('modal-target');
            const $modal = $('#' + target);
            const $content = $modal.find('.modal-content');

            // ✅ Tutup semua dropdown menu floating
            $('.custom-floating-dropdown').remove();

            // ✅ Tampilkan modal dengan animasi
            $modal.removeClass('hidden').addClass('flex');
            setTimeout(() => {
                $content.removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
            }, 10);
        });


        $(document).on('click', '[data-modal-close]', function () {
            const target = $(this).data('modal-close');
            const $modal = $('#' + target);
            const $content = $modal.find('.modal-content');

            $content.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');
            setTimeout(() => {
                $modal.removeClass('flex').addClass('hidden');
            }, 300); // Durasi sesuai class `duration-300`
        });

        $(document).on('click', '.modal-background', function (e) {
            if (e.target === this) {
                const $modal = $(this);
                const $content = $modal.find('.modal-content');

                $content.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');
                setTimeout(() => {
                    $modal.removeClass('flex').addClass('hidden');
                }, 300);
            }
        });

    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'RichLog Dashboard') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div class="flex min-h-screen">
        <x-sidebar></x-sidebar>

        <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden"></div>

        <div id="main-content-wrapper" class="flex-1 flex flex-col md:ml-64 transition-all duration-300 ease-in-out">

            <header class="bg-white shadow-custom p-4 flex items-center justify-between sticky top-0 z-20 border-b border-gray-200">
                <div class="flex items-center">
                    <button id="menu-toggle" class="p-2 mr-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-purple">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    </div>

                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-primary-purple transition-all duration-200 text-sm">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    <button class="relative p-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-200">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">3</span>
                    </button>

                    <div class="relative group">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <div class="relative">
                                <img class="w-8 h-8 sm:w-9 sm:h-9 rounded-full object-cover border-2 border-primary-purple" src="{{ asset('assets/images/ex.jpg') }}" alt="User Profile">
                                <span class="absolute bottom-0 right-0 block h-2 w-2 sm:h-2.5 sm:w-2.5 rounded-full bg-green-500 ring-1 ring-white sm:ring-2"></span>
                            </div>
                            <span class="hidden md:block font-medium text-gray-700 text-sm">John Doe</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Keluar</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 md:p-6 overflow-y-auto">
                <div class="container-fluid mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>