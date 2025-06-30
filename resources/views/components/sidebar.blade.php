<aside x-cloak
    x-show="sidebarOpen || window.innerWidth >= 768"
    x-transition:enter="transition-transform ease-out duration-300"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition-transform ease-in duration-200"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen,
    }"
    x-data="{
        activeItem: '{{ Route::currentRouteName() }}', // Initialize activeItem with the current route name
        isSistemActive() {
            const sistemRoutes = ['sistem.menu'];
            return sistemRoutes.includes(this.activeItem);
        },
        isMasterActive() {
            const masterRoutes = ['master.pegawai', 'master.client', 'master.project', 'master.modul', 'master.urgensi'];
            return masterRoutes.includes(this.activeItem);
        },
        isSupportActive() {
            const supportRoutes = ['support.bantuan', 'support.faq'];
            return supportRoutes.includes(this.activeItem);
        },
        isTasklistActive() {
            const tasklistRoutes = ['tasklist.all', 'tasklist.approval_task', 'tasklist.detail', 'tasklist.late', 'tasklist.recap', 'tasklist.real'];
            return tasklistRoutes.includes(this.activeItem);
        },
        isReportsActive() {
            const reportRoutes = ['report.durasi_task', 'report.task_pegawai'];
            return reportRoutes.includes(this.activeItem);
        }
    }"
    class="w-64 bg-white p-4 shadow-md flex flex-col justify-between fixed h-full z-20 custom-scrollbar overflow-y-auto">
    <div>
        <div class="flex items-center pb-8 pt-2 px-2">
            <div class="rounded-full mr-2 flex items-center justify-center">
                <img src="{{ asset('assets/images/richlog.png') }}" alt="RichLog Logo" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold text-gray-800">RichLog</span>
        </div>
        <nav class="space-y-1">
            <ul>
                {{-- Dashboard Item --}}
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" :class="{ 'active-link': activeItem === 'dashboard' }"
                        class="flex items-center py-2 px-3 rounded-lg text-sm relative overflow-hidden text-gray-800">
                        {{-- Active State indicator --}}
                        <div x-show="activeItem === 'dashboard'"
                            class="absolute left-0 top-0 h-full w-1.5 bg-purple-700 rounded-r-md"></div>
                        <svg class="w-5 h-5 mr-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        Dashboard
                    </a>
                </li>

                {{-- Sistem Dropdown (Corrected to be Sistem, not Master as in original comment) --}}
                <li class="mb-2" x-data="{ open: false }"
                    x-init="open = isSistemActive()"
                    :class="{ 'active-open': isSistemActive() }">
                    <a @click="open = !open" href="#"
                        class="flex items-center py-2 px-3 rounded-lg justify-between text-sm cursor-pointer text-gray-800"> {{-- Changed text-gray-700 to text-gray-800 --}}
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Sistem
                        </span>
                        <svg :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul x-show="open" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 height-0" x-transition:enter-end="opacity-100 height-full"
                        x-transition:leave="transition-all ease-in duration-250"
                        x-transition:leave-start="opacity-100 height-full" x-transition:leave-end="opacity-0 height-0"
                        class="pl-8 mt-1 space-y-1 overflow-hidden">
                        <li><a href="{{ route('sistem.menu') }}" :class="{ 'active-link': activeItem === 'sistem.menu' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Menu</a>
                        </li>
                    </ul>
                </li>

                {{-- Master Dropdown --}}
                <li class="mb-2" x-data="{ open: false }"
                    x-init="open = isMasterActive()"
                    :class="{ 'active-open': isMasterActive() }">
                    <a @click="open = !open" href="#"
                        class="flex items-center py-2 px-3 rounded-lg justify-between text-sm cursor-pointer text-gray-800"> {{-- Changed text-gray-700 to text-gray-800 --}}
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Master
                        </span>
                        <svg :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul x-show="open" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 height-0" x-transition:enter-end="opacity-100 height-full"
                        x-transition:leave="transition-all ease-in duration-250"
                        x-transition:leave-start="opacity-100 height-full" x-transition:leave-end="opacity-0 height-0"
                        class="pl-8 mt-1 space-y-1 overflow-hidden">
                        <li><a href="{{ route('master.pegawai') }}" :class="{ 'active-link': activeItem === 'master.pegawai' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Pegawai</a>
                        </li>
                        <li><a href="{{ route('master.client') }}" :class="{ 'active-link': activeItem === 'master.client' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Client</a>
                        </li>
                        <li><a href="{{ route('master.project') }}" :class="{ 'active-link': activeItem === 'master.project' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Project</a>
                        </li>
                        <li><a href="{{ route('master.modul') }}" :class="{ 'active-link': activeItem === 'master.modul' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Modul</a>
                        </li>
                        <li><a href="{{ route('master.urgensi') }}" :class="{ 'active-link': activeItem === 'master.urgensi' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Urgensi</a>
                        </li>
                    </ul>
                </li>

                {{-- Support Dropdown --}}
                {{-- <li class="mb-2" x-data="{ open: false }"
                    x-init="open = isSupportActive()"
                    :class="{ 'active-open': isSupportActive() }">
                    <a @click="open = !open" href="#"
                        class="flex items-center py-2 px-3 rounded-lg justify-between text-sm cursor-pointer text-gray-800">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 0a12.015 12.015 0 013.536 3.536m-3.536-3.536L5.636 18.364m0 0a12.015 12.015 0 01-3.536-3.536m3.536 3.536L18.364 5.636">
                                </path>
                            </svg>
                            Support
                        </span>
                        <svg :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul x-show="open" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 height-0" x-transition:enter-end="opacity-100 height-full"
                        x-transition:leave="transition-all ease-in duration-250"
                        x-transition:leave-start="opacity-100 height-full" x-transition:leave-end="opacity-0 height-0"
                        class="pl-8 mt-1 space-y-1 overflow-hidden">
                        <li><a href="{{ route('support.bantuan') }}" :class="{ 'active-link': activeItem === 'support.bantuan' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Bantuan</a>
                        </li>
                        <li><a href="{{ route('support.faq') }}" :class="{ 'active-link': activeItem === 'support.faq' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">FAQ</a></li>
                    </ul>
                </li> --}}

                {{-- Tasklists Dropdown --}}
                <li class="mb-2" x-data="{ open: false }"
                    x-init="open = isTasklistActive()"
                    :class="{ 'active-open': isTasklistActive() }">
                    <a @click="open = !open" href="#"
                        class="flex items-center py-2 px-3 rounded-lg justify-between text-sm cursor-pointer text-gray-800"> {{-- Changed text-gray-700 to text-gray-800 --}}
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            Tasklists
                        </span>
                        <svg :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul x-show="open" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 height-0" x-transition:enter-end="opacity-100 height-full"
                        x-transition:leave="transition-all ease-in duration-250"
                        x-transition:leave-start="opacity-100 height-full" x-transition:leave-end="opacity-0 height-0"
                        class="pl-8 mt-1 space-y-1 overflow-hidden">
                        <li><a href="{{ route('tasklist.all') }}" :class="{ 'active-link': activeItem === 'tasklist.all' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Tasklist All</a></li>
                        <li><a href="{{ route('tasklist.approval_task') }}" :class="{ 'active-link': activeItem === 'tasklist.approval_task' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Approval Tasklist</a></li>
                        <li><a href="{{ route('tasklist.late') }}" :class="{ 'active-link': activeItem === 'tasklist.late' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Tasklist Late</a></li>
                        <li><a href="{{ route('tasklist.recap') }}" :class="{ 'active-link': activeItem === 'tasklist.recap' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Tasklist Recap</a></li>
                        <li><a href="{{ route('tasklist.real') }}" :class="{ 'active-link': activeItem === 'tasklist.real' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Realisasi Tasklist</a></li>
                    </ul>
                </li>

                {{-- Reports Dropdown --}}
                <li class="mb-2" x-data="{ open: false }"
                    x-init="open = isReportsActive()"
                    :class="{ 'active-open': isReportsActive() }">
                    <a @click="open = !open" href="#"
                        class="flex items-center py-2 px-3 rounded-lg justify-between text-sm cursor-pointer text-gray-800"> {{-- Changed text-gray-700 to text-gray-800 --}}
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-4m0 0h3m-3 0l6-6m-6 6l6-6m0 0l-6-6"></path>
                            </svg>
                            Reports
                        </span>
                        <svg :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul x-show="open" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 height-0" x-transition:enter-end="opacity-100 height-full"
                        x-transition:leave="transition-all ease-in duration-250"
                        x-transition:leave-start="opacity-100 height-full" x-transition:leave-end="opacity-0 height-0"
                        class="pl-8 mt-1 space-y-1 overflow-hidden">
                        <li><a href="{{ route('report.durasi_task') }}" :class="{ 'active-link': activeItem === 'report.durasi_task' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Durasi Tasklist</a></li>
                        <li><a href="{{ route('report.task_pegawai') }}" :class="{ 'active-link': activeItem === 'report.task_pegawai' }"
                                class="block py-1 px-3 rounded-lg text-sm text-gray-800">Tasklist per Pegawai</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="mt-auto">
        <a href="{{ route('settings') }}" :class="{ 'active-link': activeItem === 'settings' }"
            class="flex items-center py-2 px-3 rounded-lg text-sm relative overflow-hidden text-gray-800">
            <div x-show="activeItem === 'settings'"
                class="absolute left-0 top-0 h-full w-1.5 bg-purple-700 rounded-r-md"></div>
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </a>
    </div>
</aside>