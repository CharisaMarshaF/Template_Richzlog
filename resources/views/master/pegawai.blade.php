<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Pegawai</p>
        <button data-modal-target="addPegawai" class="btn-indigo">
            Tambah Pegawai
        </button>
    </div>

    <x-datatable id="pegawaiTable" :disableOrderColumn="5">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Nama Pegawai</th>
            <th class="px-6 py-3">No Telp</th>
            <th class="px-6 py-3">Jabatan</th>
            <th class="px-6 py-3">Status</th>
            <th class="w-20 px-2 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'Trial Programmer', 'image' => asset('assets/images/ex.jpg'), 'position' => 'Project
        Manager'],
        ['name' => 'Muh Agung P', 'image' => asset('assets/images/ex.jpg'), 'position' =>
        'Programmer'],
        ['name' => 'Brian Adi P', 'image' => asset('assets/images/ex.jpg'), 'position' => 'Programmer']
        ] as $index => $employee)
        <tr class="bg-white border-b">
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 flex items-center">
                <img class="w-8 h-8 rounded-full mr-2" src="{{ $employee['image'] }}" alt="{{ $employee['name'] }}">
                {{ $employee['name'] }}
            </td>
            <td class="px-6 py-4">088xxxxxxx1</td>
            <td class="px-6 py-4">{{ $employee['position'] }}</td>
            <td class="px-6 py-4">Active</td>
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
                            <a href="#" data-modal-target="addPegawai" class="custom-action-modal" role="menuitem" tabindex="-1">
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
                            <a href="#" data-modal-target="addPegawai" class="custom-action-modal" role="menuitem" tabindex="-1">
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
    <x-modal id="addPegawai" title="Add Pegawai" size="2xl">
        <form>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="custom-label">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="name" name="name" class="custom-input-icon"
                                placeholder="Pegawai name">
                        </div>
                    </div>
                    <div>
                        <label for="nip" class="custom-label">NIP</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="nip" name="nip" class="custom-input-icon" placeholder="NIP pegawai">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="custom-label">E-mail</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" class="custom-input-icon"
                                placeholder="example123@gmail.com">
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="custom-label">Phone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.293 1.291a.25.25 0 00-.006.324l3.96 3.96a.25.25 0 00.324-.006l1.29-.293a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <input type="tel" id="phone" name="phone" class="custom-input-icon"
                                placeholder="088xxxxxxxxxx">
                        </div>
                    </div>
                    <div>
                        <label for="gender" class="custom-label">Gender</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="gender" name="gender"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Gender select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
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
                    <div>
                        <label for="religion" class="custom-label">Agama</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="religion" name="religion"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Agama select</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
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
                <div>
                    <label for="alamat" class="custom-label">Alamat</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="alamat" name="alamat" rows="2" class="custom-text-area-field py-2"
                            placeholder="Pegawai Alamat"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="jabatan" class="custom-label">Jabatan Pegawai</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="jabatan" name="jabatan"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Jabatan select</option>
                                <option value="Manager">Manager</option>
                                <option value="Programmer">Programmer</option>
                                <option value="Designer">Designer</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-1.01-8.775-2.745M9 10a3 3 0 11-6 0 3 3 0 016 0zm-1 9a3 3 0 11-6 0 3 3 0 016 0zm14-9a3 3 0 11-6 0 3 3 0 016 0zm-1 9a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
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
                    <div>
                        <label for="status" class="custom-label">Pegawai Status</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="status" name="status"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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
                <div>
                    <label class="custom-label">Pegawai Photo Profile</label>
                    <div class="mt-2 flex items-center space-x-4">
                        <img id="previewImage" class="w-24 h-24 rounded-full object-cover"
                            src="{{ asset('assets/images/ex.jpg') }}" alt="Pegawai Photo Profile">

                        <div
                            class="flex-1 relative border-2 border-dashed border-gray-300 rounded-md p-6 text-center hover:border-purple-400 group">
                            <input type="file" id="photo" name="photo" accept="image/*"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                onchange="previewSelectedImage(event)">

                            <div class="flex justify-center items-center h-full flex-col pointer-events-none">
                                <svg class="w-12 h-12 text-gray-400 group-hover:text-purple-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Select a file or drag and drop here</p>
                                <p class="text-xs text-gray-500">JPG, PNG (max 10MB)</p>
                                <button type="button"
                                    class="mt-2 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                    SELECT FILE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="addPegawai"
                    class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit"
                    class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>

</x-layout>
<script>
    function previewSelectedImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function () {
            const preview = document.getElementById('previewImage');
            preview.src = reader.result;
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
