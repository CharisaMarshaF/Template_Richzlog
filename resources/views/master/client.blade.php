<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Client</p>
        <button data-modal-target="clientModal" class="btn-indigo">
            Tambah Client
        </button>
    </div>
    <x-datatable id="clientTable" :disableOrderColumn="5">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Nama Client</th>
            <th class="px-6 py-3">E-mail</th>
            <th class="px-6 py-3">Telepon</th>
            <th class="px-6 py-3">Address</th>
            <th class="w-20 px-2 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'FJM', 'email' => 'example@email.com', 'telp' => '09876548768', 'address' => 'Jl. Raya No. 1'],
        ['name' => 'KFC', 'email' => 'example@email.com', 'telp' => '09876548768', 'address' => 'Jl. Raya No. 2'],
        ['name' => 'Besari', 'email' => 'example@email.com', 'telp' => '09876548768', 'address' => 'Jl. Raya No. 3'],
        ['name' => 'Gacoan', 'email' => 'example@email.com', 'telp' => '09876548768', 'address' => 'Jl. Raya No. 4']
        ] as $index => $client)
        <tr class="bg-white border-b">
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4">
                {{ $client['name'] }}
            </td>
            <td class="px-6 py-4">{{ $client['email'] }}</td>
            <td class="px-6 py-4">{{ $client['telp'] }}</td>
            <td class="px-6 py-4">{{ $client['address'] }}</td>
            <td class="px-6 py-4">
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
                            <a href="#" data-modal-target="clientDetailModal" class="custom-action-modal" role="menuitem" tabindex="-1">
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
                            <a href="#" data-modal-target="clientModal" class="custom-action-modal" role="menuitem"
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
    <x-modal id="clientModal" title="Client Management" size="2xl">
        <form>
            <div class="space-y-4">
                <div>
                    <label for="clientName" class="custom-label">Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="clientName" name="clientName" class="custom-input-field pl-2"
                            placeholder="Input your company name">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="companyPhone" class="custom-label">Phone *</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.293 1.291a.25.25 0 00-.006.324l3.96 3.96a.25.25 0 00.324-.006l1.29-.293a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <input type="tel" id="companyPhone" name="companyPhone" class="custom-input-icon"
                                placeholder="Phone Number">
                        </div>
                    </div>

                    <div>
                        <label for="companyEmail" class="custom-label">Email*</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input type="email" id="companyEmail" name="companyEmail" class="custom-input-icon"
                                placeholder="Input your Email">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="companyAddress" class="custom-label">Address *</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="companyAddress" name="companyAddress" rows="2"
                            class="custom-text-area-field pl-10 py-2" placeholder="Input Address"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="updateClientModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal id="clientDetailModal" title="Detail Client FJM" size="lg">
        <div class="space-y-4">
            {{-- Client Info --}}
            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Indofood Indonesia
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    indofoodid@gmail.com
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.498 4.493a1 1 0 01-.502 1.21L8 11l3 3 1.293-1.293a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1c-7 0-14-7.284-14-15v-1z" />
                    </svg>
                    088345678456
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 12l4.243-4.243m0 8.486L9.172 12l8.485-8.485M7 7h.01M7 17h.01M17 7h.01M17 17h.01M12 12h.01" />
                    </svg>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </div>

            {{-- Project List Table --}}
            <div>
                <p class="font-medium text-sm text-gray-700 mb-1">List Project</p>
                <table class="w-full text-sm text-left border border-gray-200 rounded-md overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Project Name</th>
                            <th class="px-3 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="px-3 py-2 border">1</td>
                            <td class="px-3 py-2 border">Management apps</td>
                            <td class="px-3 py-2 border text-green-600 font-semibold">Complete</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-3 py-2 border">2</td>
                            <td class="px-3 py-2 border">Mobile Apps</td>
                            <td class="px-3 py-2 border text-yellow-500 font-semibold">Onprogres</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-3 py-2 border">3</td>
                            <td class="px-3 py-2 border">Stack Apps</td>
                            <td class="px-3 py-2 border text-green-600 font-semibold">Complete</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="button" data-modal-hide="clientDetailModal" class="custom-button-secondary">
                Close
            </button>
        </div>
    </x-modal>

</x-layout>
