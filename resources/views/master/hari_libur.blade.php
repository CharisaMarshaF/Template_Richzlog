<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Hari Libur</p>
        <button data-modal-target="holidayModal" class="btn-indigo">
            Tambah Hari Libur
        </button>
    </div>

    <x-datatable id="holidayTable" :disableOrderColumn="4">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Tanggal</th>
            <th class="px-6 py-3">Deskripsi</th>
            <th class="px-6 py-3">Status</th>
            <th class="w-20 px-2 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['tanggal' => '20 May', 'deskripsi' => 'Waisak', 'status' => 'Nasional'],
        ['tanggal' => '1 April', 'deskripsi' => 'Cuti Perusahaan', 'status' => 'Bukan Nasional'],
        ['tanggal' => '17 Agustus', 'deskripsi' => 'Hari Kemerdekaan', 'status' => 'Nasional']
        ] as $index => $holiday)
        <tr class="bg-white border-b">
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4">{{ $holiday['tanggal'] }}</td>
            <td class="px-6 py-4">{{ $holiday['deskripsi'] }}</td>
            <td class="px-6 py-4">{{ $holiday['status'] }}</td>
            <td class="px-6 py-4 text-center">
                <div class="inline-block relative">
                    <button type="button" data-dropdown-toggle="dropdownAction-{{ $index }}"
                        class="dropdown-trigger inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v.01M12 12v.01M12 19v.01" />
                        </svg>
                    </button>
                    <div id="dropdownAction-{{ $index }}"
                        class="dropdown-menu-content hidden absolute w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                        role="menu">
                        <div class="py-1" role="none">
                            <a href="#" data-modal-target="holidayModal" class="custom-action-modal" role="menuitem">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </div>
                            </a>
                            <a href="#" class="custom-action-modal" role="menuitem">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

    <x-modal id="holidayModal" title="Manajemen Hari Libur" size="xl">
        <form>
            <div class="space-y-4">
                <div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="holidayDay" class="custom-label">Tanggal</label>
                            <select id="holidayDay" name="holidayDay" class="custom-input-field mt-1">
                                <option value="">Pilih Tanggal</option>
                                @for($i = 1; $i <= 31; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>

                        <div>
                            <label for="holidayMonth" class="custom-label">Bulan</label>
                            <select id="holidayMonth" name="holidayMonth" class="custom-input-field mt-1">
                                <option value="">Pilih Bulan</option>
                                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
                                as $index => $month)
                                <option value="{{ $index + 1 }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div>
                    <label for="holidayDescription" class="custom-label">Deskripsi</label>
                    <input type="text" id="holidayDescription" name="holidayDescription" class="custom-input-field mt-1"
                        placeholder="Contoh: Waisak, Tahun Baru, dll.">
                </div>

                <div>
                    <label for="holidayStatus" class="custom-label">Status</label>
                    <select id="holidayStatus" name="holidayStatus" class="custom-input-field mt-1">
                        <option value="">Pilih Status</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Bukan Nasional">Bukan Nasional</option>
                    </select>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="holidayModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Simpan
                </button>
            </div>
        </form>
    </x-modal>
</x-layout>
