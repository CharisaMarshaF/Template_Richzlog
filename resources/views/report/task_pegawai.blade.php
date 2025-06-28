<x-layout>
    <p class="text-3xl font-bold text-purple-700 mb-4">Laporan Task per Pegawai</p>

    <x-datatable id="taskPerPegawai" :disableOrderColumn="1">
        <x-slot:thead>
            <th class="w-10 text-center">No</th>
            <th>Nama Pegawai</th>
            <th>Project</th>
            <th>Modul</th>
            <th>Mulai Dikerjakan</th>
            <th>Target Durasi</th>
            <th>Selesai Dikerjakan</th>
        </x-slot:thead>

        @php
        // Simulasi durasi dalam menit
        $data = [
        [
        'name' => 'Charisa',
        'project' => 'FJM',
        'modul' => 'Summary',
        'mulai' => '2025-05-28 10:19:02',
        'target_duration_min' => 240, // 4 jam
        'realisasi_duration_min' => 196, // 3h 16m
        'realisasi' => '3h 16 Min 49 sec',
        ],
        [
        'name' => 'Ahmad',
        'status' => 'not_started',
        ],
        [
        'name' => 'Agung',
        'project' => 'Dextra',
        'modul' => 'Input',
        'mulai' => '2025-05-28 10:19:02',
        'target_duration_min' => 240,
        'realisasi_duration_min' => 1336,
        'realisasi' => '22h 16 Min 49 sec',
        ],
        [
        'name' => 'Brian',
        'status' => 'not_started',
        ],
        [
        'name' => 'Raras',
        'project' => 'FJM',
        'modul' => 'Search',
        'mulai' => '2025-05-28 10:19:02',
        'target_duration_min' => 360,
        'realisasi_duration_min' => 136,
        'realisasi' => '2h 16 Min 49 sec',
        ],
        ];
        @endphp

        @foreach ($data as $index => $item)
        @php
        $bgColor = '';
        $notStarted = isset($item['status']) && $item['status'] === 'not_started';
        if (!$notStarted) {
        $bgColor = $item['realisasi_duration_min'] > $item['target_duration_min'] ? 'bg-red-100' : 'bg-green-100';
        }
        @endphp
        <tr class="border-b {{ $bgColor }}">
            <td class="text-center px-2 py-3">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $item['name'] }}</td>

            @if ($notStarted)
            <td class="px-4 py-3 text-center italic text-red-600 " colspan="5">Belum Memulai Tugas</td>
            @else
            <td class="px-4 py-3">{{ $item['project'] }}</td>
            <td class="px-4 py-3">{{ $item['modul'] }}</td>
            <td class="px-4 py-3">{{ $item['mulai'] }}</td>
            <td class="px-4 py-3">{{ floor($item['target_duration_min'] / 60) }} Jam</td>
            <td class="px-4 py-3">{{ $item['realisasi'] }}</td>
            @endif

        </tr>
        @endforeach

    </x-datatable>
</x-layout>