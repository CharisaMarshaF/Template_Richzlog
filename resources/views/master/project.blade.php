<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-2xl font-semibold text-gray-800">Master - Project</p>
        <button data-modal-target="projectModal" data-action-type="add" class="btn-indigo modal-trigger">
            Tambah Project
        </button>
    </div>

    <x-datatable id="projectTable" :disableOrderColumn="5">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Project Name</th>
            <th class="px-6 py-3">Client Name</th>
            <th class="px-6 py-3">Project Type</th>
            <th class="px-6 py-3">Due Date</th>
            <th class="w-20 px-2 py-3 text-center">Actions</th>
        </x-slot:thead>

        @foreach([
        [
        'id' => 1,
        'project_name' => 'E-commerce Platform',
        'client_name' => 'PT. Sejahtera Abadi',
        'project_type' => 'Web Development',
        'status' => 'In Progress',
        'due_date' => '2025-12-31' // Tambah data due_date
        ],
        [
        'id' => 2,
        'project_name' => 'Mobile Banking App',
        'client_name' => 'Bank Sentosa',
        'project_type' => 'Mobile App',
        'status' => 'Completed',
        'due_date' => '2025-06-15' // Tambah data due_date
        ],
        [
        'id' => 3,
        'project_name' => 'Company Profile Website',
        'client_name' => 'CV. Jaya Mandiri',
        'project_type' => 'Web Design',
        'status' => 'Pending',
        'due_date' => '2025-09-01' // Tambah data due_date
        ]
        ] as $index => $project)
        <tr class="bg-white border-b" data-project-id="{{ $project['id'] }}"
            data-project-name="{{ $project['project_name'] }}" data-client-name="{{ $project['client_name'] }}"
            data-project-type="{{ $project['project_type'] }}" data-status="{{ $project['status'] }}"
            data-due-date="{{ $project['due_date'] }}">
            <!-- Tambah data-due-date -->
            <td class="px-2 py-4 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $project['project_name'] }}</td>
            <td class="px-6 py-4">{{ $project['client_name'] }}</td>
            <td class="px-6 py-4">{{ $project['project_type'] }}</td>
            <td class="px-6 py-4">{{ $project['due_date'] }}</td>
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
                            <a href="#" data-modal-target="projectDetailModal" class="custom-action-modal"
                                role="menuitem" tabindex="-1">
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
                            <a href="#" data-modal-target="projectModal" class="custom-action-modal" role="menuitem"
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

    <x-modal id="projectModal" title="Project Management" size="2xl">
        <form id="projectForm">
            <div class="space-y-4">
                <div>
                    <label for="projectName" class="custom-label">Project Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="projectName" name="project_name" class="custom-input-field pl-2"
                            placeholder="Input project name">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="menuStatus" class="custom-label">Client</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="menuStatus" name="menuStatus"
                                class="custom-input-icon pl-10 pr-10 py-2 appearance-none">
                                <option>Select Client</option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Canceled">Canceled</option>
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
                    <div>
                        <label for="projectType" class="custom-label">Project Type</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" id="projectType" name="project_type" class="custom-input-icon"
                                placeholder="e.g., Web Development, Mobile App">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="modulDescription" class="custom-label">Description</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="modulDescription" name="modulDescription" rows="3" class="custom-text-area-field"
                            placeholder="Modul Description"></textarea>
                    </div>
                </div>
                <div>
                    <label for="dueDate" class="custom-label">Due Date</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <input type="date" id="dueDate" name="due_date" class="custom-input-icon">
                    </div>
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-x-2">
                <button type="button" data-modal-hide="projectModal" class="custom-button-secondary">
                    Cancel
                </button>
                <button type="submit" id="modalSubmitButton" class="custom-confirm-button">
                    Save
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal id="projectDetailModal" title="Detail Project FJM" size="2xl">
        <div class="space-y-4 text-sm text-gray-700">
            {{-- Client + Status --}}
            {{-- Header Info --}}
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-4 border-b pb-4 mb-4">
                <div class="space-y-1">
                    <h2 class="text-lg font-semibold text-gray-800">Client:
                        <span class="text-purple-700">FJM</span>
                    </h2>
                    <p class="text-sm text-gray-500">Project Type:
                        <span class="font-medium text-gray-700">iOS Application</span>
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-semibold text-green-700 bg-green-100 px-2 py-1 rounded-md">
                        Active
                    </span>
                    <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-md">
                        IOS APP
                    </span>
                </div>
            </div>


            {{-- Description --}}
            <div>
                <p class="font-medium mb-1">Description</p>
                <div class="p-4 rounded-md bg-gray-50 border text-gray-600 leading-relaxed text-sm">
                    Welcome! By accessing or using this product, you agree to comply with the following terms and
                    conditions. These terms outline the rights and responsibilities associated with using this
                    product. Please take a moment to review them carefully.
                </div>
            </div>

            {{-- List Modul --}}
            <div>
                <p class="font-medium mb-1">List Modul</p>
                <table class="w-full text-sm text-left border border-gray-200 rounded-md overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Modul</th>
                            <th class="px-3 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="px-3 py-2 border">1</td>
                            <td class="px-3 py-2 border">Dashboard</td>
                            <td class="px-3 py-2 border text-green-600 font-semibold">Complete</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-3 py-2 border">2</td>
                            <td class="px-3 py-2 border">Task</td>
                            <td class="px-3 py-2 border text-yellow-500 font-semibold">On Track</td>
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
            <button type="button" data-modal-hide="projectDetailModal" class="custom-button-secondary">
                Close
            </button>
        </div>
    </x-modal>

</x-layout>
