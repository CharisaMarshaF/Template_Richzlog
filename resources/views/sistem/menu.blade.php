<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Sistem - Menu</p>
        <button data-modal-target="menuModal" class="btn-indigo">
            Tambah Menu
        </button>
    </div>

    <x-datatable id="menuTable">
        <x-slot:thead>
            <th class="w-16 text-center">No</th>
            <th>Menu Name</th>
            <th>Path Link</th>
            <th>Menu File</th>
            <th>Description</th>
            <th>Status</th>
            <th class="w-20 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'Dashboard', 'path' => '/dashboard', 'file' => 'dashboard/index.blade.php', 'desc' => 'Dashboard
        Parent', 'status' => 'Active'],
        ['name' => 'Master', 'path' => '/master', 'file' => 'master/index.blade.php', 'desc' => 'Master Parent',
        'status' => 'Active'],
        ['name' => '— Pegawai', 'path' => '/master/pegawai', 'file' => 'master/pegawai/index.blade.php', 'desc' =>
        'Master - Pegawai', 'status' => 'Inactive'],
        ['name' => '— Client', 'path' => '/master/client', 'file' => 'master/client/index.blade.php', 'desc' => 'Master
        - Client', 'status' => 'Inactive'],
        ] as $index => $menu)
        <tr class="bg-white border-b even:bg-gray-50">
            <td class="text-center px-2 py-3">{{ $index + 1 }}</td>
            <td class="px-4 py-3 font-semibold">{{ $menu['name'] }}</td>
            <td class="px-4 py-3">{{ $menu['path'] }}</td>
            <td class="px-4 py-3">{{ $menu['file'] }}</td>
            <td class="px-4 py-3">{{ $menu['desc'] }}</td>
            <td class="px-4 py-3 font-medium {{ $menu['status'] === 'Active' ? 'text-green-600' : 'text-red-600' }}">
                {{ $menu['status'] }}</td>
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
                            <a href="#" data-modal-target="menuModal" class="custom-action-modal" role="menuitem"
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
                            <a href="#" class="custom-action-modal" role="menuitem"
                                tabindex="-1">
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
    <x-modal id="menuModal" title="Menu Management" size="2xl">
        <form>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Menu Name -->
                    <div>
                        <label for="menuName" class="custom-label">Menu Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <input type="text" id="menuName" name="menuName" class="custom-input-icon"
                                placeholder="Dashboard">
                        </div>
                    </div>
                    <!-- Menu Parent -->
                    <div>
                        <label for="menuParent" class="custom-label">Menu Parent</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="menuParent" name="menuParent"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="" disabled selected>As a Parent</option>
                                <option value="Parent1">Parent Menu 1</option>
                                <option value="Parent2">Parent Menu 2</option>
                                <option value="Parent3">Parent Menu 3</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Path -->
                    <div>
                        <label for="menuPath" class="custom-label">Menu Path</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <input type="text" id="menuPath" name="menuPath" class="custom-input-icon"
                                placeholder="/tasklist/all">
                        </div>
                    </div>
                    <!-- Menu File -->
                    <div>
                        <label for="menuFile" class="custom-label">Menu File</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <input type="text" id="menuFile" name="menuFile" class="custom-input-icon"
                                placeholder="tasklist_all">
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="custom-label">Description</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="description" name="description" rows="3" class="custom-text-area-field py-2 pl-3"
                            placeholder="Menu Dashboard Parent"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Menu Order -->
                    <div>
                        <label for="menuOrder" class="custom-label">Menu Order</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <input type="number" id="menuOrder" name="menuOrder" class="custom-input-icon"
                                placeholder="3">
                        </div>
                    </div>
                    <!-- Menu Status -->
                    <div>
                        <label for="menuStatus" class="custom-label">Menu Status</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="menuStatus" name="menuStatus"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="menuModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>
</x-layout>
