<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Urgensi</p>
        <button data-modal-target="urgensiModal" class="btn-indigo">
            Tambah Urgensi
        </button>
    </div>
    <x-datatable id="urgencyTable" :disableOrderColumn="4">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">Kode</th>
            <th class="px-6 py-3">Name</th>
            <th class="px-6 py-3">Point</th>
            <th class="px-6 py-3">Lama Pengerjaan</th>
            <th class="w-20 px-2 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'Urgent', 'point' => 20, 'duration' => '2h 30min'],
        ['name' => 'Mayor', 'point' => 10, 'duration' => '3h'],
        ['name' => 'Minor', 'point' => 5, 'duration' => '4h'],
        ] as $index => $urgency)
        <tr class="bg-white border-b">
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 font-semibold">{{ $urgency['name'] }}</td>
            <td class="px-6 py-4">{{ $urgency['point'] }}</td>
            <td class="px-6 py-4">{{ $urgency['duration'] }}</td>
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
                            <a href="#" data-modal-target="urgensiModal" class="custom-action-modal" role="menuitem"
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
    <x-modal id="urgensiModal" title="Urgensi Management" size="xl">
        <form>
            <div class="space-y-4">
                <div>
                    <label for="urgensiName" class="custom-label">Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="urgensiName" name="urgensiName" class="custom-input-field"
                            placeholder="Urgensi Name Input">
                    </div>
                </div>

                <div>
                    <label for="urgensiPoint" class="custom-label">Point</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="urgensiPoint" name="urgensiPoint" class="custom-input-icon"
                            placeholder="Urgensi Point">
                    </div>
                </div>

                <div>
                    <label for="lamaPengerjaan" class="custom-label">Lama Pengerjaan</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="time" id="lamaPengerjaan" name="lamaPengerjaan" class="custom-input-field"
                            placeholder="Lama Pengerjaan Duration">
                    </div>
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="urgensiModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>
</x-layout>
