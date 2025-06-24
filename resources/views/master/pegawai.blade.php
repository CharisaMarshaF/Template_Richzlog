<x-layout>
    <p class="text-3xl font-bold text-purple-700 mb-4">Master - Pegawai</p>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-200">
            <div class="relative flex items-center bg-gray-100 rounded-lg px-3 py-2 w-72 border border-gray-300">
                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" placeholder="Find Menu"
                    class="w-full bg-transparent text-gray-700 placeholder-gray-500 focus:outline-none text-sm">
            </div>
            <div class="flex items-center space-x-3">
                <button
                    class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-600 text-sm font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 6a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z">
                        </path>
                    </svg>
                    Filters
                </button>
                <button onclick="addPegawaiModal.showModal()"
                    class="flex items-center justify-center w-9 h-9 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 w-1 pe-0 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pegawai Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No Telp
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jabatan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover"
                                        src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile Image">
                                </div>
                                <div class="ml-4 text-sm font-medium text-gray-900">
                                    Trial Programmer
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            088xxxxxxx1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Project Manager
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-green-100 text-green-700">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button @click="open = !open" type="button"
                                    class="inline-flex justify-center w-8 h-8 items-center rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    id="menu-button-1" aria-expanded="true" aria-haspopup="true">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button-1"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-1">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            2
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover"
                                        src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile Image">
                                </div>
                                <div class="ml-4 text-sm font-medium text-gray-900">
                                    Muh Agung P
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            088xxxxxxx1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Programmer
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-gray-200 text-gray-700">
                                Action
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button @click="open = !open" type="button"
                                    class="inline-flex justify-center w-8 h-8 items-center rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    id="menu-button-2" aria-expanded="true" aria-haspopup="true">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button-2"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-1">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            3
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover"
                                        src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile Image">
                                </div>
                                <div class="ml-4 text-sm font-medium text-gray-900">
                                    Brian Adi P
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            088xxxxxxx1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Programmer
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-gray-200 text-gray-700">
                                Action
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button @click="open = !open" type="button"
                                    class="inline-flex justify-center w-8 h-8 items-center rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    id="menu-button-3" aria-expanded="true" aria-haspopup="true">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button-3"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-1">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="#"
                                            class="text-gray-700 flex items-center px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <dialog id="addPegawaiModal" class="modal modal-bottom sm:modal-middle" x-data="{
        pegawaiName: '',
        nipPegawai: '',
        email: '',
        phone: '',
        gender: '',
        agama: '',
        alamat: '',
        jabatan: '',
        status: 'Active',
        handleConfirm() {
            // Here you would typically submit the form data
            console.log('Form Confirmed!', {
                pegawaiName: this.pegawaiName,
                nipPegawai: this.nipPegawai,
                email: this.email,
                phone: this.phone,
                gender: this.gender,
                agama: this.agama,
                alamat: this.alamat,
                jabatan: this.jabatan,
                status: this.status
            });
            addPegawaiModal.close(); // Close modal after confirming
            // You can also add form submission logic here (e.g., fetch API call)
        },
        handleCancel() {
            addPegawaiModal.close(); // Close modal
        }
    }">
        <div class="modal-box max-w-3xl"> 
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Pegawai Management</h3>
            <p class="py-4 text-sm text-gray-500">Fill in the details for the new employee.</p>

            <form @submit.prevent="handleConfirm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" placeholder="Pegawai Name" x-model="pegawaiName"
                            class="input input-bordered w-full" />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">NIP</span>
                        </label>
                        <input type="text" placeholder="NIP pegawai" x-model="nipPegawai"
                            class="input input-bordered w-full" />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">E-mail</span>
                        </label>
                        <input type="email" placeholder="example123@gmail.com" x-model="email"
                            class="input input-bordered w-full" />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Phone</span>
                        </label>
                        <input type="tel" placeholder="088xxxxxxxxx" x-model="phone"
                            class="input input-bordered w-full" />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <select class="select select-bordered w-full" x-model="gender">
                            <option disabled selected value="">Gender select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Agama</span>
                        </label>
                        <select class="select select-bordered w-full" x-model="agama">
                            <option disabled selected value="">Agama select</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label>
                        <textarea placeholder="Pegawai Alamat" x-model="alamat" class="textarea textarea-bordered w-full"></textarea>
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Jabatan Pegawai</span>
                        </label>
                        <select class="select select-bordered w-full" x-model="jabatan">
                            <option disabled selected value="">Jabatan select</option>
                            <option value="Project Manager">Project Manager</option>
                            <option value="Programmer">Programmer</option>
                            <option value="UI/UX Designer">UI/UX Designer</option>
                            <option value="Quality Assurance">Quality Assurance</option>
                        </select>
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Pegawai Status</span>
                        </label>
                        <select class="select select-bordered w-full" x-model="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="label">
                            <span class="label-text">Pegawai Photo Profile</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="avatar">
                                <div class="w-24 h-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                    <img src="https://via.placeholder.com/150" alt="Profile" />
                                </div>
                            </div>
                            <div
                                class="flex-grow border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition duration-200">
                                <input type="file" class="hidden" id="profile-picture-upload" />
                                <label for="profile-picture-upload" class="cursor-pointer">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-600">Select a file or drag and drop here</p>
                                    <p class="text-xs text-gray-500">JPG, PNG or PDF. Up to 10MB</p>
                                    <button type="button" class="btn btn-sm btn-outline btn-primary mt-2">SELECT
                                        FILE</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-action mt-6">
                    <button type="button" class="btn btn-ghost" @click="handleCancel()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

</x-layout>

<script>
    // Make sure Alpine.js is included in your project for x-data and x-model directives to work.
    // If you are using a CDN, it would look something like this in your head or before the closing </body> tag:
    // <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</script>