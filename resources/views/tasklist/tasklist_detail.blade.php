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
    <style>
        /* Ensure the main layout takes full height */
        html,
        body {
            height: 100%;
            overflow: hidden;
            /* Prevent body scroll, let specific divs scroll */
        }

        .content-wrapper {
            transition: margin-left 0.3s ease-in-out, width 0.3s ease-in-out;
            /* Adjust width and margin based on sidebar state */
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
        }

        /* When sidebar is closed on desktop */
        .sidebar-closed-md {
            margin-left: 0 !important;
            width: 100% !important;
        }

        /* Specific for scrollable chat area */
        .chat-messages-container {
            flex: 1;
            /* Make this div take available height */
            overflow-y: auto;
            /* Enable scrolling for messages */
            position: relative;
            /* For absolute positioning of inner content */
            padding-bottom: 7rem;
            /* Space for input and preview area */
        }

        /* Adjust padding for the main content area */
        main {
            padding-top: 6rem;
            /* Enough space for the fixed navbar */
            display: flex;
            flex-direction: column;
            flex: 1;
            /* Make main content area take full height */
            overflow: hidden;
            /* Prevent main from having its own scrollbar */
        }

        section.flex-1 {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .md\:flex-row.flex-1 {
            flex: 1;
            overflow: hidden;
        }

        /* Ensure scrollable left panel */
        .left-panel {
            flex-shrink: 0;
            /* Prevent shrinking */
            overflow-y: auto;
            /* Make left panel scrollable if content overflows */
        }

    </style>
</head>

<body class="font-sans antialiased">
    <div x-data="{
                sidebarOpen: window.innerWidth >= 768, // Initial state: open on desktop
                isDesktop: window.innerWidth >= 768 // Track if current view is desktop
            }" x-init="
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
                    } else if (wasDesktop && !isDesktop) { // Resized from desktop to mobile
                         sidebarOpen = false; // Close sidebar when entering mobile view
                    }
                    // Always update the CSS variable based on current state and device
                    document.documentElement.style.setProperty('--sidebar-width', (sidebarOpen && isDesktop) ? '16rem' : '0rem');
                });
            " class="min-h-screen bg-gray-100 flex relative">

        {{-- Now the Blade component is inside the x-data scope --}}
        {{-- Assuming x-sidebar is a component that provides the sidebar structure --}}
        <x-sidebar></x-sidebar>

        <div x-cloak x-show="sidebarOpen && window.innerWidth < 768" x-transition.opacity.duration.300ms
            @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20"> {{-- Increased z-index --}}
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

            {{-- Main Content --}}
            <main class="flex-1 p-6 pt-24">
                <section class="flex-1 flex flex-col overflow-hidden">
                    <div class="flex flex-col md:flex-row flex-1 overflow-hidden">
                        <div
                            class="w-full md:w-96 pe-6 border-r border-gray-200 overflow-y-auto left-panel flex flex-col">
                            <div class="bg-white shadow rounded-xl p-4 pt">
                                <ul class="space-y-4">
                                    <li class="flex items-center gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">schedule</span>
                                        <span>2025-05-12 17:42</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">person</span>
                                        <span>Client Name</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">badge</span>
                                        <span>FJM</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">description</span>
                                        <span>Pembuatan Design Web Lorem ipsum dolor sit amet</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">timer</span>
                                        <span>4h 30min</span>
                                    </li>
                                </ul>

                                <div class="mt-6">
                                    <p class="font-semibold mb-2">Attachment :</p>
                                    <img src="https://via.placeholder.com/300x200/F0F4F8/8C9AB6?text=Attachment+Image"
                                        alt="Task attachment" class="rounded-lg w-full" />
                                </div>
                            </div>

                            {{-- This div now correctly uses mt-auto because its parent is a flex column --}}
                            <div class="space-y-3 mt-auto pt-6"> <button
                                    class="w-full py-2 border border-green-500 text-green-600 rounded-xl font-semibold flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined">alarm_on</span>
                                    Clock In
                                </button>
                                <button
                                    class="w-full py-2 border border-green-500 text-green-600 rounded-xl font-semibold flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined">send</span>
                                    Submit
                                </button>
                            </div>
                        </div>

                        <div class="flex-1 flex flex-col bg-gray-50 overflow-hidden">
                            <div class="flex items-center gap-3 mb-4 px-6 pt-6">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                    class="w-10 h-10 rounded-full object-cover" alt="PM Profile Picture" />
                                <div>
                                    <p class="font-semibold">PM Name</p>
                                    <p class="text-xs text-gray-500">075211987</p>
                                </div>
                            </div>

                            <div class="chat-messages-container" x-ref="chatBody">
                                <div class="absolute inset-0 overflow-y-auto px-6 pb-4 space-y-6 scroll-smooth"
                                    x-init="$nextTick(() => $refs.chatBody.scrollTop = $refs.chatBody.scrollHeight)">
                                    <div class="flex justify-center">
                                        <span
                                            class="inline-block bg-black text-white px-3 py-1 text-xs rounded-full">Today</span>
                                    </div>

                                    <div class="text-right">
                                        <div
                                            class="inline-block bg-[#5534A5] text-white px-4 py-2 rounded-2xl max-w-xs text-left">
                                            Morning Angelie, I have question about My Task
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:52</p>
                                    </div>

                                    <div>
                                        <div
                                            class="inline-block bg-white px-4 py-2 rounded-2xl max-w-xs shadow text-left">
                                            Yes sure, Any problem with your assignment?
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:53</p>
                                    </div>

                                    <div class="text-right space-y-2">
                                        <div class="flex justify-end">
                                            {{-- Updated chat attachment image based on Figma --}}
                                            <img src="https://via.placeholder.com/240x160/D0D4D8/6B7A8C?text=Chat+Attachment"
                                                alt="Chat attachment" class="w-60 rounded-lg mb-2" />
                                        </div>
                                        <div
                                            class="inline-block bg-[#5534A5] text-white px-4 py-2 rounded-2xl max-w-xs text-left">
                                            How to make a responsive display from the dashboard?
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:55</p>
                                    </div>

                                    <div class="text-right">
                                        <div
                                            class="inline-block bg-[#5534A5] text-white px-4 py-2 rounded-2xl max-w-xs text-left">
                                            Is there a plugin to do this task?
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:56</p>
                                    </div>

                                    <div>
                                        <div
                                            class="inline-block bg-white px-4 py-2 rounded-2xl max-w-xs shadow text-left">
                                            No plugins. You just have to make it smaller according to the size of the
                                            phone. Thank you very much. I'm glad you asked about the assignment
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:57</p>
                                    </div>

                                    {{-- Add more dummy messages if needed to test scrolling --}}
                                    <div class="text-right">
                                        <div
                                            class="inline-block bg-[#5534A5] text-white px-4 py-2 rounded-2xl max-w-xs text-left">
                                            This is another message to test full height and scrolling behavior.
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:58</p>
                                    </div>
                                    <div>
                                        <div
                                            class="inline-block bg-white px-4 py-2 rounded-2xl max-w-xs shadow text-left">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Today 11:59</p>
                                    </div>
                                </div>
                            </div>


                            <div id="filePreview" class="px-6 py-3 flex gap-3 overflow-x-auto border-t border-gray-200">
                            </div>

                            <div class="w-full px-6 py-4 bg-white border-t border-gray-200 flex items-center gap-2">
                                <label for="fileInput" class="cursor-pointer text-gray-600 hover:text-[#5534A5]"
                                    title="Upload Files">
                                    <span class="material-symbols-outlined">attach_file</span>
                                </label>
                                <input type="file" id="fileInput"
                                    accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                    multiple class="hidden" />

                                <input type="text" placeholder="Send your message..."
                                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2 outline-none" />

                                <button
                                    class="bg-[#5534A5] text-white px-4 py-2 rounded-md hover:bg-purple-800 flex items-center justify-center">
                                    <span class="material-symbols-outlined">send</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
    <script>
        const fileInput = document.getElementById('fileInput');
        const filePreview = document.getElementById('filePreview');
        const chatBody = document.querySelector('[x-ref="chatBody"]'); // Get the chat body element

        // Function to scroll chat to bottom
        function scrollChatToBottom() {
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        }

        // Scroll to bottom on initial load
        document.addEventListener('DOMContentLoaded', scrollChatToBottom);
        // Also scroll to bottom when new files are attached, as it might push the input area up
        fileInput.addEventListener('change', scrollChatToBottom);

        fileInput.addEventListener('change', function () {
            filePreview.innerHTML = ''; // Clear previous previews
            Array.from(fileInput.files).forEach((file) => {
                const reader = new FileReader();
                const wrapper = document.createElement('div');
                wrapper.className = 'relative group';

                const previewBox = document.createElement('div');
                previewBox.className =
                    'w-20 h-20 bg-gray-100 flex items-center justify-center rounded border overflow-hidden';

                const fileExt = file.name.split('.').pop().toLowerCase();
                const isImage = file.type.startsWith('image/');
                const isPDF = file.type === 'application/pdf';
                const isWord = file.type.includes('word') || ['doc', 'docx'].includes(fileExt);
                const isExcel = file.type.includes('excel') || file.type.includes('spreadsheetml') || [
                    'xls', 'xlsx'
                ].includes(fileExt);

                if (isImage) {
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-full object-cover';
                        previewBox.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else if (isPDF) {
                    const img = document.createElement('img');
                    img.src = 'https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg';
                    img.className = 'w-10 h-10 object-contain';
                    previewBox.appendChild(img);
                } else if (isWord) {
                    const img = document.createElement('img');
                    img.src = 'https://cdn-icons-png.flaticon.com/512/888/888883.png';
                    img.className = 'w-10 h-10 object-contain';
                    previewBox.appendChild(img);
                } else if (isExcel) {
                    const img = document.createElement('img');
                    img.src =
                        'https://upload.wikimedia.org/wikipedia/commons/7/73/Microsoft_Excel_2013-2019_logo.svg';
                    img.className = 'w-10 h-10 object-contain';
                    previewBox.appendChild(img);
                } else {
                    const icon = document.createElement('span');
                    icon.className = 'material-symbols-outlined text-gray-600 text-4xl';
                    icon.textContent = 'insert_drive_file';
                    previewBox.appendChild(icon);
                }

                const removeBtn = document.createElement('button');
                removeBtn.className =
                    'absolute top-1 right-1 bg-white text-red-500 rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 shadow';
                removeBtn.innerHTML = '✕';
                removeBtn.addEventListener('click', () => {
                    wrapper.remove();
                    // Optionally, remove the file from the FileList if you need to track it
                    // This part would be more complex and usually handled server-side or with a state management library
                });

                wrapper.appendChild(previewBox);
                wrapper.appendChild(removeBtn);
                filePreview.appendChild(wrapper);
            });
            scrollChatToBottom(); // Scroll to bottom after adding new files
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateElement = document.getElementById('currentDate');
            // Display the current date in "Monday, 23 June" format
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            };
            const today = new Date();
            dateElement.textContent = today.toLocaleDateString('en-US', options);
        });

    </script>
</body>

</html>
