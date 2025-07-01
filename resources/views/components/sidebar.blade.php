<aside id="sidebar" class="w-64 bg-white text-gray-700 shadow-lg flex flex-col fixed h-full z-30 border-r border-gray-200
    transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="p-6 text-2xl font-bold text-center flex items-center justify-center">
        <img src="{{ asset('assets/images/richlog.png') }}" alt="Logbook Icon"
            class="h-12 w-12 mr-2 text-primary-purple">
        <span class="text-primary-purple">RichLog</span>
    </div>

    <nav class="flex-1 px-4 py-4 pt-1 overflow-y-auto">
        <div class="space-y-2">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="sidebar-menu-item flex items-center p-3 rounded-lg transition-all duration-200 ease-in-out group
                {{ request()->routeIs('dashboard') ? 'bg-primary-purple text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-primary-purple' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>

            {{-- Sistem Menu --}}
            <div x-data="{ open: {{ request()->is('sistem*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="sidebar-menu-item flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200 ease-in-out group
                    {{ request()->is('sistem*') ? 'bg-primary-purple text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-primary-purple' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-3 {{ request()->is('sistem*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2m3 10V7"></path>
                        </svg>
                        <span>Sistem</span>
                    </span>
                    <svg class="w-4 h-4 transform transition-transform duration-200"
                        :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="mt-1 pl-8 space-y-1">
                    @foreach([
                        'sistem.menu' => 'Menu',
                    ] as $route => $label)
                        <a href="{{ route($route) }}"
                            class="submenu-item block p-2 rounded-lg text-sm transition-colors duration-200
                            {{ request()->routeIs($route) ? 'text-primary-purple font-semibold bg-gray-100' : 'text-gray-600 hover:bg-gray-50 hover:text-primary-purple' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- Master Menu --}}
            <div x-data="{ open: {{ request()->is('master*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="sidebar-menu-item flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200 ease-in-out group
                    {{ request()->is('master*') ? 'bg-primary-purple text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-primary-purple' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-3 {{ request()->is('master*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2m3 10V7"></path>
                        </svg>
                        <span>Master</span>
                    </span>
                    <svg class="w-4 h-4 transform transition-transform duration-200"
                        :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="mt-1 pl-8 space-y-1">
                    @foreach([
                        'master.pegawai' => 'Pegawai',
                        'master.client' => 'Client',
                        'master.project' => 'Project',
                        'master.modul' => 'Modul',
                        'master.urgensi' => 'Urgensi',
                        'master.hari_libur' => 'Hari Libur',
                    ] as $route => $label)
                        <a href="{{ route($route) }}"
                            class="submenu-item block p-2 rounded-lg text-sm transition-colors duration-200
                            {{ request()->routeIs($route) ? 'text-primary-purple font-semibold bg-gray-100' : 'text-gray-600 hover:bg-gray-50 hover:text-primary-purple' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Tasklist --}}
            <div x-data="{ open: {{ request()->is('tasklist*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="sidebar-menu-item flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200 ease-in-out group
                    {{ request()->is('tasklist*') ? 'bg-primary-purple text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-primary-purple' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-3 {{ request()->is('tasklist*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span>Tasklist</span>
                    </span>
                    <svg class="w-4 h-4 transform transition-transform duration-200"
                        :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="mt-1 pl-8 space-y-1">
                    @foreach([
                        'tasklist.all' => 'Semua Task',
                        'tasklist.approval_task' => 'Approval Task',
                        'tasklist.late' => 'Task Terlambat',
                        'tasklist.recap' => 'Rekap Task',
                        'tasklist.real' => 'Task Real',
                    ] as $route => $label)
                        <a href="{{ route($route) }}"
                            class="submenu-item block p-2 rounded-lg text-sm transition-colors duration-200
                            {{ request()->routeIs($route) ? 'text-primary-purple font-semibold bg-gray-100' : 'text-gray-600 hover:bg-gray-50 hover:text-primary-purple' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Report --}}
            <div x-data="{ open: {{ request()->is('report*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="sidebar-menu-item flex items-center justify-between w-full p-3 rounded-lg transition-all duration-200 ease-in-out group
                    {{ request()->is('report*') ? 'bg-primary-purple text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-primary-purple' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-3 {{ request()->is('report*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13.682m0-13.682A10.004 10.004 0 0012 2a10.004 10.004 0 00-7.397 3.253M12 6.253a10.004 10.004 0 017.397 3.253M12 6.253C12 8.92 12 12 12 12v7.935m-5.463 2.054a10.004 10.004 0 01-1.937-2.054M12 19.935a2.124 2.124 0 00-2.125 2.125A2.124 2.124 0 0012 24a2.124 2.124 0 002.125-2.125A2.124 2.124 0 0012 19.935zM12 12a4.4 4.4 0 10-4.4 4.4 4.4 0 004.4-4.4zm0 0v-4.4"></path>
                        </svg>
                        <span>Laporan</span>
                    </span>
                    <svg class="w-4 h-4 transform transition-transform duration-200"
                        :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="mt-1 pl-8 space-y-1">
                    @foreach([
                        'report.durasi_task' => 'Durasi Task',
                        'report.task_pegawai' => 'Task Pegawai',
                        'report.project_presentage' => 'Persentase Project',
                        'report.gantt_chart' => 'Gantt Chart',
                    ] as $route => $label)
                        <a href="{{ route($route) }}"
                            class="submenu-item block p-2 rounded-lg text-sm transition-colors duration-200
                            {{ request()->routeIs($route) ? 'text-primary-purple font-semibold bg-gray-100' : 'text-gray-600 hover:bg-gray-50 hover:text-primary-purple' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</aside>