<x-layout>
    <p class="text-3xl font-bold text-purple-700 mb-4">Laporan Durasi Tasklist</p>
    <x-datatable id="reportTasklistTable" :disableOrderColumn="6">
        <x-slot:thead>
            <th class="w-10 text-center px-2 py-3">No</th>
            <th class="px-4 py-3">Nama Pegawai</th>
            <th class="px-4 py-3">No Tasklist</th>
            <th class="px-4 py-3">Clock In</th>
            <th class="px-4 py-3">Clock Out</th>
            <th class="px-4 py-3">Durasi Pengerjaan</th>
            <th class="px-4 py-3 text-center">Action</th>
        </x-slot:thead>

        @foreach([
        ['name' => 'Charisa', 'tasklist' => '0007', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ['name' => 'Ahmad', 'tasklist' => '0009', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ['name' => 'Agung', 'tasklist' => '0106', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ['name' => 'Bayu', 'tasklist' => '0405', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ['name' => 'Brian', 'tasklist' => '0097', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ['name' => 'Raras', 'tasklist' => '0890', 'clock_in' => '2025-05-28 10:19:02', 'clock_out' => '2025-05-28
        10:19:02', 'durasi' => '00:08:56'],
        ] as $index => $item)
        <tr class="bg-white border-b">
            <td class="px-2 py-3 text-center">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $item['name'] }}</td>
            <td class="px-4 py-3">{{ $item['tasklist'] }}</td>
            <td class="px-4 py-3">{{ $item['clock_in'] }}</td>
            <td class="px-4 py-3">{{ $item['clock_out'] }}</td>
            <td class="px-4 py-3">{{ $item['durasi'] }}</td>
            <td class="px-4 py-3 text-center">
                <a href="#" data-modal-target="detailDurasiModal"
                    class="text-purple-600 hover:underline flex items-center justify-center gap-1">
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
    <x-modal id="detailDurasiModal" title="Detail Report Durasi Tasklist" size="3xl">
        <div class="space-y-4 text-gray-700">
            {{-- Bagian Informasi Umum Tasklist --}}
             <div class="border-b pb-4">
            <div class="grid grid-cols-3 gap-y-2 text-sm">
                <div class="font-medium">Nama Tasklist</div>
                <div class="col-span-2">: Test</div>

                <div class="font-medium">No Tasklist</div>
                <div class="col-span-2">: 0001</div>

                <div class="font-medium">Nama Pegawai</div>
                <div class="col-span-2">: BayuuuuArdiiiii Setiawaaannnnn</div>

                <div class="font-medium">Status</div>
                <div class="col-span-2">: Summited</div>

                <div class="font-medium">Total Durasi</div>
                <div class="col-span-2">: 8h 10min 12 sec</div>

                <div class="font-medium">Total Clock In/Out</div>
                <div class="col-span-2">: 9</div>
            </div>
        </div>

            <h4 class="text-xl font-semibold text-gray-800 pt-4 pb-2">Detail Clock In / Clock Out</h4>

            {{-- Bagian Tabel Detail Clock In / Clock Out --}}
            <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Clock In</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Clock Out</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Durasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Note</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Contoh data dummy untuk detail clock in/out --}}
                        @php
                        $clockDetails = [
                        ['clock_in' => '2025-05-28 10:15:34', 'clock_out' => '', 'durasi' => '', 'note' => 'Start
                        Clockin'],
                        ['clock_in' => '', 'clock_out' => '2025-05-28 10:15:38', 'durasi' => '00:00:04', 'note' =>
                        'Submitted Task'],
                        ['clock_in' => '2025-05-28 10:15:34', 'clock_out' => '', 'durasi' => '', 'note' => 'Start
                        Clockin'],
                        ['clock_in' => '2025-05-28 10:15:34', 'clock_out' => '', 'durasi' => '', 'note' => 'Start
                        Clockin'],
                        ['clock_in' => '', 'clock_out' => '2025-05-28 10:15:38', 'durasi' => '00:00:04', 'note' =>
                        'Submitted Task'],
                        ['clock_in' => '2025-05-28 10:15:34', 'clock_out' => '', 'durasi' => '', 'note' => 'Start
                        Clockin'],
                        ['clock_in' => '', 'clock_out' => '2025-05-28 10:16:34', 'durasi' => '01:00:04', 'note' =>
                        'Submitted Task'],
                        ];
                        @endphp

                        @foreach($clockDetails as $detail)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $detail['clock_in'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $detail['clock_out'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $detail['durasi'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $detail['note'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-modal>
</x-layout>
