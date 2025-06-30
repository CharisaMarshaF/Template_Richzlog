<x-layout>
    <div class="flex justify-between items-center mb-4">
        <p class="text-3xl font-bold text-purple-700">Rekap Tasklist Pegawai</p>
    </div>

    <x-datatable id="rekapTasklistTable">
        <x-slot:thead>
            <th class="text-center w-12">No</th>
            <th>Pegawai Name</th>
            <th>Total Tasklist</th>
            <th>Tasklist Terlambat</th>
            <th>Task Approved</th>
            <th>Tasklist Konfirmasi</th>
        </x-slot:thead>

        @foreach([
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Muh Agung P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Brian Adi P', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
            ['name' => 'Bayuuu', 'total' => 10, 'terlambat' => 3, 'approved' => 5, 'konfirmasi' => 2],
        ] as $index => $pegawai)
        <tr class="bg-white border-b">
            <td class="text-center px-2 py-3">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $pegawai['name'] }}</td>
            <td class="px-4 py-3">{{ $pegawai['total'] }} Task</td>
            <td class="px-4 py-3">{{ $pegawai['terlambat'] }} Task</td>
            <td class="px-4 py-3">{{ $pegawai['approved'] }} Task</td>
            <td class="px-4 py-3">{{ $pegawai['konfirmasi'] }} Task</td>
        </tr>
        @endforeach
    </x-datatable>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                const searchContainer = $('#rekapTasklistTable_wrapper .flex.items-center.space-x-2');
    
                // Cek apakah tombol belum ada agar tidak duplikat
                if ($('#btnExportRecap').length === 0) {
                    const exportBtn = $(`
                        <button id="btnExportRecap"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 focus:outline-none">
                            <i class="fas fa-file-export mr-2"></i> Export
                        </button>
                    `);
    
                    // Contoh aksi export
                    exportBtn.on('click', function () {
                        alert('Export clicked! Tambahkan logika ekspor di sini.');
                        // Misal: export ke Excel, PDF, dsb
                    });
    
                    searchContainer.append(exportBtn);
                }
            }, 300);
        });
    </script>
</x-layout>
