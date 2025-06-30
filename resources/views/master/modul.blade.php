<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Modul</p>
        <button data-modal-target="modulModal" class="btn-indigo">
            Tambah Modul
        </button>
    </div>
    <x-datatable id="modulTable" :disableOrderColumn="4">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Modul Name</th>
            <th class="px-6 py-3">Modul Code</th>
            <th class="px-6 py-3">Description</th>
            <th class="px-6 py-3">Project</th>
            <th class="w-20 px-2 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'Dashboard','code' => '9876', 'desc' => 'Pengembangan Dashboard MyCRM', 'project' => 'MyCRM'],
        ['name' => 'Sidebar', 'code' => '876', 'desc' => 'Pengembangan Sidebar RichCRM', 'project' => 'RichCRM'],
        ['name' => 'Navbar', 'code' => 'i8765', 'desc' => 'Pengembangan Navbar MyCRM', 'project' => 'MyCRM'],
        ['name' => 'Alur Bug', 'code' => '8765', 'desc' => 'Pengembangan Alur Bug', 'project' => 'RichCRM'],
        ['name' => 'Alur Sistem', 'code' => '8765', 'desc' => 'Pengembangan Sistem', 'project' => 'MyLog'],
        ['name' => 'Redesign', 'code' => '8765', 'desc' => 'Redesain Frontend MyCRM', 'project' => 'MyCRM'],
        ] as $index => $modul)
        <tr class="bg-white border-b">
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4">{{ $modul['name'] }}</td>
            <td class="px-6 py-4">{{ $modul['code'] }}</td>
            <td class="px-6 py-4">{{ $modul['desc'] }}</td>
            <td class="px-6 py-4">{{ $modul['project'] }}</td>
            <td class="px-6 py-4 text-center">
                <div class="inline-block relative">
                    <button type="button" data-dropdown-toggle="dropdownAction-{{ $index }}"
                        class="dropdown-trigger inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 100-2 1 1 0 000 2zm0 7a1 1 0 100-2 1 1 0 000 2zm0 7a1 1 0 100-2 1 1 0 000 2z">
                            </path>
                        </svg>
                    </button>

                    <div id="dropdownAction-{{ $index }}"
                        class="dropdown-menu-content hidden absolute w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        role="menu" aria-orientation="vertical" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="#" data-modal-target="modulDetailModal" class="custom-action-modal" role="menuitem" tabindex="-1">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    Detail
                                </div>
                            </a>
                            <a href="#" data-modal-target="modulModal" class="custom-action-modal" role="menuitem"
                                tabindex="-1">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Edit
                                </div>
                            </a>
                            <a href="#" class="custom-action-modal" role="menuitem" tabindex="-1">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Delete
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </x-datatable>
    <x-modal id="modulModal" title="Modul Management" size="xl">
        <form>
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="modulName" class="custom-label">Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="modulName" name="modulName" class="custom-input-field"
                            placeholder="Modul Name Input">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="modulDescription" class="custom-label">Description</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="modulDescription" name="modulDescription" rows="3" class="custom-text-area-field"
                            placeholder="Modul Description"></textarea>
                    </div>
                </div>
                <div>
                    <label for="modulName" class="custom-label">Modul Code</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="modulName" name="modulName" class="custom-input-field"
                            placeholder="Modul Name Input">
                    </div>
                </div>

                <!-- Project -->
                <div>
                    <label for="modulProject" class="custom-label">Project</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                        <select id="modulProject" name="modulProject"
                            class="custom-input-icon pr-10 py-2 appearance-none">
                            <option value="" disabled selected>Select Project</option>
                            <option value="Project A">Project A</option>
                            <option value="Project B">Project B</option>
                            <option value="Project C">Project C</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="modulModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal id="modulDetailModal" title="Detail Modul" size="2xl">
        <div class="space-y-4">
            {{-- Header Detail Modul --}}
            <div class="flex justify-between items-center border-b pb-3">
                <div>
                    <p class="text-xl font-semibold text-gray-800">Dashboard</p>
                    <p class="text-sm text-gray-500">Code: <span class="font-medium text-gray-700">9876</span></p>
                </div>
                <div>
                    <span class="text-sm text-purple-700 bg-purple-100 px-3 py-1 rounded-md">
                        Project: MyCRM
                    </span>
                </div>
            </div>

            {{-- Description --}}
            <div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Pengembangan Dashboard MyCRM, fitur ini mencakup tampilan statistik dan integrasi data real-time.
                </p>
            </div>

            {{-- Subheading Tasklist --}}
            <div>
                <h3 class="text-md font-semibold text-gray-700 mt-4 mb-2 border-b pb-2">Tasklist Terkait Modul</h3>
                <div class="overflow-x-auto rounded-md">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama Task</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No Task</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach([
                            ['name' => 'Setup Dashboard UI', 'number' => 'TSK-001'],
                            ['name' => 'Integrasi API Statistik', 'number' => 'TSK-002'],
                            ['name' => 'Fix Responsive View', 'number' => 'TSK-003']
                            ] as $index => $task)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $task['name'] }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $task['number'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="button" data-modal-hide="modulDetailModal" class="custom-button-secondary">
                Close
            </button>
        </div>
    </x-modal>

</x-layout>
