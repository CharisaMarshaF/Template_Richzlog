<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-3xl font-bold text-purple-700">Rekap Durasi Tasklist Pegawai</p>
    </div>

    <x-datatable id="rekapTaskDurasiTable">
        <x-slot:thead>
            <th class="text-center w-12">No</th>
            <th>Pegawai Name</th>
            <th>Total Tasklist</th>
            <th>Target</th>
            <th>Realisasi</th>
            <th>Sisa Jam Kerja</th>
        </x-slot:thead>

        @foreach([
            ['name' => 'Muh Agung P', 'total' => 10, 'target' => '6 h', 'realisasi' => '4 h', 'sisa' => '3 h 42 min'],
            ['name' => 'Brian Adi P', 'total' => 8, 'target' => '6 h', 'realisasi' => '4 h', 'sisa' => '3 h 42 min'],
            ['name' => 'Bayuuu', 'total' => 2, 'target' => '6 h', 'realisasi' => '4 h', 'sisa' => '3 h 42 min'],
        ] as $index => $pegawai)
        <tr class="bg-white border-b even:bg-gray-50 dark:even:bg-gray-900/50">
            <td class="text-center px-2 py-3">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $pegawai['name'] }}</td>
            <td class="px-4 py-3">{{ $pegawai['total'] }} Task</td>
            <td class="px-4 py-3">{{ $pegawai['target'] }}</td>
            <td class="px-4 py-3">{{ $pegawai['realisasi'] }}</td>
            <td class="px-4 py-3">{{ $pegawai['sisa'] }}</td>
        </tr>
        @endforeach
    </x-datatable>
</x-layout>
