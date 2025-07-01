<x-layout>
    <div class="mx-auto">
        <div
            class="relative bg-gradient-to-br from-primary-purple to-light-purple p-6 md:p-8 rounded-xl-2xl shadow-xl-custom mb-6 md:mb-8 flex flex-col md:flex-row items-center justify-between gap-4 text-white overflow-hidden text-center md:text-left">
            <div class="absolute inset-0 opacity-10 bg-no-repeat bg-center bg-cover"
                style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNzUiIGhlaWdodD0iNzUiIHZpZXdCb3g9IjAgMCA3NSA3NSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzcuNSIgY3k9IjM3LjUiIHI9IjM3LjUiIGZpbGw9IiNGRkZGRkYiIGZpbGwtb3BhY2VpdHk9IjAuMiIvPgo8cGF0aCBkPSJNIDM3LjUgMCBDMTYuODA3OSAwIDAgMTYuODA3OSAwIDM3LjUgQyAwIDU4LjE5MjEgMTYuODA3OSA3NSAzNy41IDc1IEM1OC4xOTIxIDc1IDc1IDU4LjE5MjEgNzUgMzcuNSBDNzUgMTYuODA3OSA1OC4xOTIxIDAgMzcuNSA3LjVaIiBmaWxsPSJ3aGl0ZSIgZmlsbC1vcGFjaXR5PSIwLjEiLz4KPC9zdmc+'); transform: scale(3) translate(20%, -20%);">
            </div>

            <div class="flex flex-col md:flex-row items-center md:space-x-6 space-y-4 md:space-y-0 z-10">
                <div class="relative">
                    <img class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white object-cover shadow-lg"
                        src="https://picsum.photos/id/1005/200/200" alt="Profile Picture">
                    <span
                        class="absolute bottom-1 right-1 md:bottom-2 md:right-2 block h-4 w-4 md:h-5 md:w-5 rounded-full bg-green-400 ring-2 ring-white md:ring-4"></span>
                </div>
                <div>
                    <p class="text-3xl md:text-4xl font-extrabold">John Doe</p>
                    <p class="text-lg md:text-xl font-light opacity-90 mt-0 md:mt-1">Project Manager</p>
                    <p class="text-md md:text-lg opacity-80 mt-1 md:mt-2">Karanganyar, Central Java, Indonesia</p>
                    <p class="text-sm md:text-md opacity-70">NIP: 1234567890</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
            <div
                class="group relative bg-white p-4 md:p-5 rounded-lg-xl shadow-card-purple text-gray-800 flex items-center space-x-3 md:space-x-4
                                    transform hover:-translate-y-1 hover:shadow-card-hover-glow transition-all duration-300 ease-in-out cursor-pointer border border-gray-100">
                <div class="flex-shrink-0 p-2 md:p-3 rounded-full bg-light-purple text-white">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl md:text-3xl font-extrabold text-primary-purple">7</p>
                    <p class="text-sm md:text-md font-semibold text-gray-600">Proyek Aktif</p>
                </div>
            </div>

            <div
                class="group relative bg-white p-4 md:p-5 rounded-lg-xl shadow-card-purple text-gray-800 flex items-center space-x-3 md:space-x-4
                                    transform hover:-translate-y-1 hover:shadow-card-hover-glow transition-all duration-300 ease-in-out cursor-pointer border border-gray-100">
                <div class="flex-shrink-0 p-2 md:p-3 rounded-full bg-accent-green text-white">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m-9 4h.01M12 12h.01">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl md:text-3xl font-extrabold text-accent-green">12</p>
                    <p class="text-sm md:text-md font-semibold text-gray-600">Total Modul</p>
                </div>
            </div>

            <div
                class="group relative bg-white p-4 md:p-5 rounded-lg-xl shadow-card-purple text-gray-800 flex items-center space-x-3 md:space-x-4
                                    transform hover:-translate-y-1 hover:shadow-card-hover-glow transition-all duration-300 ease-in-out cursor-pointer border border-gray-100">
                <div class="flex-shrink-0 p-2 md:p-3 rounded-full bg-accent-yellow text-white">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl md:text-3xl font-extrabold text-accent-yellow">45</p>
                    <p class="text-sm md:text-md font-semibold text-gray-600">Total Tasklist</p>
                </div>
            </div>

            <div
                class="group relative bg-white p-4 md:p-5 rounded-lg-xl shadow-card-purple text-gray-800 flex items-center space-x-3 md:space-x-4
                                    transform hover:-translate-y-1 hover:shadow-card-hover-glow transition-all duration-300 ease-in-out cursor-pointer border border-gray-100">
                <div class="flex-shrink-0 p-2 md:p-3 rounded-full bg-primary-purple text-white">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2m2-2a4 4 0 100-8m4 0a4 4 0 100-8m0 16a4 4 0 100-8">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl md:text-3xl font-extrabold text-primary-purple">18</p>
                    <p class="text-sm md:text-md font-semibold text-gray-600">Total Klien</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 md:gap-6 mb-6 md:mb-8">
            <div class="bg-white p-5 md:p-6 rounded-xl-2xl shadow-custom border border-gray-100">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-5 md:mb-6">Pemberitahuan Task Kritis</h2>
                <ul class="space-y-3 md:space-y-4">
                    <li class="flex items-center bg-red-50 p-3 rounded-lg border border-red-200">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-red-500 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800 text-sm md:text-base">Perbaikan Bug Kritis (Modul Login)
                            </p>
                            <p class="text-xs md:text-sm text-gray-600">Prioritas: Tinggi - Deadline: 03 Juli 2025</p>
                        </div>
                    </li>
                    <li class="flex items-center bg-yellow-50 p-3 rounded-lg border border-yellow-200">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-yellow-500 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800 text-sm md:text-base">Integrasi API Pembayaran</p>
                            <p class="text-xs md:text-sm text-gray-600">Prioritas: Sedang - Deadline: 08 Juli 2025</p>
                        </div>
                    </li>
                    <li class="flex items-center bg-blue-50 p-3 rounded-lg border border-blue-200">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800 text-sm md:text-base">Penyiapan Server UAT (Project X)
                            </p>
                            <p class="text-xs md:text-sm text-gray-600">Status: Menunggu Konfirmasi Klien</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white p-5 md:p-6 rounded-xl-2xl shadow-custom border border-gray-100">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-5 md:mb-6">Status Task Umum</h2>
            <div class="space-y-5 md:space-y-6">
                <div>
                    <div class="flex items-center justify-between mb-1 md:mb-2">
                        <span class="text-md md:text-lg font-medium text-gray-700">Selesai</span>
                        <span class="text-md md:text-lg font-bold text-primary-purple">70%</span>
                    </div>
                    <div class="w-full bg-soft-purple rounded-full h-3 md:h-4">
                        <div class="bg-primary-purple h-3 md:h-4 rounded-full" style="width:70%;"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1 md:mb-2">
                        <span class="text-md md:text-lg font-medium text-gray-700">Dalam Proses</span>
                        <span class="text-md md:text-lg font-bold text-dark-purple">20%</span>
                    </div>
                    <div class="w-full bg-light-purple rounded-full h-3 md:h-4">
                        <div class="bg-dark-purple h-3 md:h-4 rounded-full" style="width:20%;"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1 md:mb-2">
                        <span class="text-md md:text-lg font-medium text-gray-700">Belum Dimulai</span>
                        <span class="text-md md:text-lg font-bold text-gray-600">10%</span>
                    </div>
                    <div class="w-full bg-gray-300 rounded-full h-3 md:h-4">
                        <div class="bg-gray-500 h-3 md:h-4 rounded-full" style="width:10%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
