<x-layout>
    <section class="py-6">
        <!-- Greeting Section -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Good Morning <span class="text-[#5534A5]">Dr.
                Trenggiling!</span></h1>

        <!-- Unapproved Task Card - Restyled -->
        <div
            class="bg-gradient-to-br from-indigo-500 to-purple-700 rounded-2xl shadow-2xl p-8 text-white flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-8 mb-8">
            <!-- Profile Image -->
            <div class="flex-shrink-0 relative">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Trenggiling"
                    class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-lg">
                <span class="absolute bottom-1 right-1 w-6 h-6 bg-green-400 rounded-full border-2 border-white"></span>
                <!-- Online indicator -->
            </div>

            <!-- Combined Task Info and Stat Cards Section -->
            <div class="flex flex-col flex-grow w-full space-y-5">
                <!-- Task Info (aligned horizontally with profile picture) -->
                <div class="flex items-center justify-center lg:justify-start">
                    <p class="text-xl font-semibold opacity-80 mr-4">UnApproved Task</p>
                    <p class="text-6xl font-extrabold">14</p>
                </div>

                <!-- Stat Cards Grid - Full Width and Icon on Side -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                    <!-- Total Project Card -->
                    <div
                        class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 flex items-center space-x-3 transition-all duration-300 hover:scale-105 hover:bg-opacity-35 cursor-pointer">
                        <div class="flex-shrink-0 rounded-full bg-white bg-opacity-40 p-3 shadow-inner">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 4h6m-6 0a2 2 0 100 4m0-4a2 2 0 110 4m-6 0h.01M6 14h.01M6 18h.01">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm opacity-90">Total Project</p>
                            <p class="font-extrabold text-xl">3</p>
                        </div>
                    </div>
                    <!-- Total Modul Card -->
                    <div
                        class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 flex items-center space-x-3 transition-all duration-300 hover:scale-105 hover:bg-opacity-35 cursor-pointer">
                        <div class="flex-shrink-0 rounded-full bg-white bg-opacity-40 p-3 shadow-inner">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.206 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.794 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.794 5 16.5 5c1.706 0 3.332.477 4.5 1.253v13C19.832 18.477 18.206 18 16.5 18c-1.706 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm opacity-90">Total Modul</p>
                            <p class="font-extrabold text-xl">82</p>
                        </div>
                    </div>
                    <!-- Total Tasklist Card -->
                    <div
                        class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 flex items-center space-x-3 transition-all duration-300 hover:scale-105 hover:bg-opacity-35 cursor-pointer">
                        <div class="flex-shrink-0 rounded-full bg-white bg-opacity-40 p-3 shadow-inner">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm opacity-90">Total Tasklist</p>
                            <p class="font-extrabold text-xl">78</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Presentase Section -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Project Presentase June</h2>
            <div class="space-y-6">
                <!-- Project 1 -->
                <div class="bg-gray-50 rounded-lg p-3 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-between text-sm text-gray-700 font-medium mb-2">
                        <span>Project Name</span>
                        <span>80%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-700 h-3 rounded-full transition-all duration-700 ease-out"
                            style="width: 80%"></div>
                    </div>
                </div>
                <!-- Project 2 -->
                <div class="bg-gray-50 rounded-lg p-3 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-between text-sm text-gray-700 font-medium mb-2">
                        <span>Project Name</span>
                        <span>45%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-3 rounded-full transition-all duration-700 ease-out"
                            style="width: 45%"></div>
                    </div>
                </div>
                <!-- Project 3 -->
                <div class="bg-gray-50 rounded-lg p-3 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-between text-sm text-gray-700 font-medium mb-2">
                        <span>Project Name</span>
                        <span>95%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-gradient-to-r from-green-500 to-green-700 h-3 rounded-full transition-all duration-700 ease-out"
                            style="width: 95%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-layout>
