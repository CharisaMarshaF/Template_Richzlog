<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Tasklist - Approval</p>
        <button data-modal-target="addTasklistModal" class="btn-indigo">
            Tambah Tasklist
        </button>
    </div>

    <x-datatable id="tasklistTable" :disableOrderColumn="5">
        <x-slot:thead>
            <th class="text-center w-10">No</th>
            <th>No Task</th>
            <th>Tasklist Date</th>
            <th>Tasklist</th>
            <th>Programmer</th>
            <th class="text-center w-16">Action</th>
        </x-slot:thead>

        @php
        $tasklists = [
            ['no_task' => '0000078', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Bug Sidebar', 'programmer' => 'Trial programmer'],
            ['no_task' => '0000079', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Bug Navbar', 'programmer' => 'Trial programmer'],
            ['no_task' => '00000190', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Bug CRUD', 'programmer' => 'Trial programmer'],
            ['no_task' => '00000198', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Bug Delete Card', 'programmer' => 'Muh Agung P'],
            ['no_task' => '00001123', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Bug Tasklist', 'programmer' => 'Brian Adi P'],
            ['no_task' => '00002311', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan UI Dashboard', 'programmer' => 'Brian Adi P'],
            ['no_task' => '00009753', 'date' => '2025-05-12 17:42', 'tasklist' => 'Perbaikan Alur Web', 'programmer' => 'Muh Agung P'],
        ];
        @endphp

        @foreach($tasklists as $index => $task)
        <tr class="bg-white border-b">
            <td class="text-center px-2 py-3">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $task['no_task'] }}</td>
            <td class="px-4 py-3">{{ $task['date'] }}</td>
            <td class="px-4 py-3">{{ $task['tasklist'] }}</td>
            <td class="px-4 py-3">{{ $task['programmer'] }}</td>
            <td class="px-4 py-3 text-center">
                <a href="#" class="text-purple-600 hover:underline flex items-center justify-center gap-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Detail
                </a>
            </td>
        </tr>
        @endforeach
    </x-datatable>
    <x-modal id="addTasklistModal" title="Add Tasklist" size="2xl">
        <form>
            <div class="space-y-4">
                <div>
                    <label for="client" class="custom-label">Client</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <select id="client" name="client" class="custom-input-icon pr-10 py-2 appearance-none">
                            <option value="" disabled selected>Select Client</option>
                            <option value="Client A">Client A</option>
                            <option value="Client B">Client B</option>
                            <option value="Client C">Client C</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="project" class="custom-label">Project</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                            <select id="project" name="project" class="custom-input-icon pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Select Project</option>
                                <option value="Project A">Project A</option>
                                <option value="Project B">Project B</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="modul" class="custom-label">Modul</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <select id="modul" name="modul" class="custom-input-icon pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Select Modul</option>
                                <option value="Modul A">Modul A</option>
                                <option value="Modul B">Modul B</option>
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

                <div>
                    <label for="pegawai" class="custom-label">Pegawai</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <select id="pegawai" name="pegawai" class="custom-input-icon pr-10 py-2 appearance-none">
                            <option value="" disabled selected>Pegawai</option>
                            <option value="Pegawai 1">Trial Programmer</option>
                            <option value="Pegawai 2">Muh Agung P</option>
                            <option value="Pegawai 3">Brian Adi P</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="tasklist" class="custom-label">Tasklist</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="tasklist" name="tasklist" rows="2" class="custom-text-area-field"
                            placeholder="Tasklist"></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="tasklistStart" class="custom-label">Tasklist Start</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" id="tasklistStart" name="tasklistStart" class="custom-input-icon"
                                placeholder="Tasklist Start Input">
                        </div>
                    </div>
                    <div>
                        <label for="tasklistFinish" class="custom-label">Tasklist Finish</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" id="tasklistFinish" name="tasklistFinish" class="custom-input-icon"
                                placeholder="Tasklist Finish Input">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="urgensi" class="custom-label">Urgensi</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <select id="urgensi" name="urgensi" class="custom-input-icon pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Select Urgensi</option>
                                <option value="Low-1 Day">Low - 1 Day</option>
                                <option value="Medium-2 Days">Medium - 2 Days</option>
                                <option value="High-3 Days">High - 3 Days</option>
                                <option value="Urgent-1 Week">Urgent - 1 Week</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="kategori" class="custom-label">Kategori</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <select id="kategori" name="kategori" class="custom-input-icon pr-10 py-2 appearance-none">
                                <option value="" disabled selected>Select Kategori</option>
                                <option value="Mayor">Mayor</option>
                                <option value="Minor">Minor</option>
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

                <div>
                    <label class="custom-label">Files</label>
                    <div id="fileInputsContainer" class="space-y-2 mt-2">
                        <!-- Initial file input -->
                        <div class="flex items-center space-x-2 file-input-group">
                            <div class="relative flex-1">
                                <input type="text" readonly value="Input File" class="custom-input-icon"
                                    onclick="this.nextElementSibling.click()">
                                <input type="file" name="files[]" class="hidden file-upload-input"
                                    onchange="this.previousElementSibling.value = this.files[0] ? this.files[0].name : 'Input File';">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <button type="button" class="text-gray-500 hover:text-red-500 delete-file-input">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="button" id="addFileInputBtn" class="mt-3 btn-indigo w-full">
                        Add More Files
                    </button>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="addTasklistModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" class="custom-confirm-button">
                    Confirm
                </button>
            </div>
        </form>
    </x-modal>
</x-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // File input management
        const fileInputsContainer = document.getElementById('fileInputsContainer');
        const addFileInputBtn = document.getElementById('addFileInputBtn');

        // Function to create a new file input group
        function createFileInputGroup() {
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2 file-input-group';
            div.innerHTML = `
                <div class="relative flex-1">
                    <input type="text" readonly value="Input File" class="custom-input-icon" onclick="this.nextElementSibling.click()">
                    <input type="file" name="files[]" class="hidden file-upload-input" onchange="this.previousElementSibling.value = this.files[0] ? this.files[0].name : 'Input File';">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                <button type="button" class="text-gray-500 hover:text-red-500 delete-file-input">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            return div;
        }

        addFileInputBtn.addEventListener('click', function () {
            fileInputsContainer.appendChild(createFileInputGroup());
        });

        fileInputsContainer.addEventListener('click', function (e) {
            if (e.target.closest('.delete-file-input')) {
                if (fileInputsContainer.children.length > 1) {
                    e.target.closest('.file-input-group').remove();
                } else {
                    const lastInput = fileInputsContainer.querySelector('.file-upload-input');
                    if (lastInput) {
                        lastInput.value = ''; // Clear file selection
                        lastInput.previousElementSibling.value = 'Input File'; // Reset display text
                    }
                }
            }
        });
    });
</script>