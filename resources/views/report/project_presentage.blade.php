<x-layout>
    <div class="mb-6">
        <p class="text-2xl font-semibold text-gray-800 mb-4">Presentase Project</p>

        <!-- Card Filter Project -->
        <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
            <label for="projectSelect" class="block text-base font-medium text-gray-700 mb-2">Pilih Project</label>
            <select id="projectSelect" name="projectSelect"
                class="w-full border border-gray-300 rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="">-- Pilih Project --</option>
                <option value="project1">Sistem Manajemen</option>
                <option value="project2">Mobile Apps</option>
                <option value="project3">ERP System</option>
            </select>
        </div>

    </div>

    <!-- Table Presentase -->
    <x-datatable id="presentaseProjectTable" :disableOrderColumn="0">
        <x-slot:thead>
            <th class="w-16 px-2 py-3 text-center">No</th>
            <th class="px-6 py-3">Nama Modul</th>
            <th class="px-6 py-3 text-center">Total Tasklist</th>
            <th class="px-6 py-3 text-center">Tasklist Selesai</th>
            <th class="px-6 py-3 text-center">Persentase</th>
        </x-slot:thead>

        @php
        $data = [
        ['modul' => 'Login & Register', 'total' => 10, 'selesai' => 8],
        ['modul' => 'Dashboard', 'total' => 15, 'selesai' => 12],
        ['modul' => 'Dashboard', 'total' => 15, 'selesai' => 12],
        ['modul' => 'User Management', 'total' => 20, 'selesai' => 20],
        ['modul' => 'Laporan', 'total' => 5, 'selesai' => 2],
        ];
        $totalTasklist = 0;
        $totalSelesai = 0;
        @endphp

        @foreach($data as $index => $row)
        @php
        $persen = $row['total'] > 0 ? round(($row['selesai'] / $row['total']) * 100) : 0;
        $totalTasklist += $row['total'];
        $totalSelesai += $row['selesai'];
        @endphp
        <tr class="bg-white border-b">
            <td class="px-2 py-3 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-3">{{ $row['modul'] }}</td>
            <td class="px-6 py-3 text-center">{{ $row['total'] }}</td>
            <td class="px-6 py-3 text-center">{{ $row['selesai'] }}</td>
            <td class="px-6 py-3 text-center text-sm font-semibold 
                    {{ $persen >= 75 ? 'text-green-600' : ($persen >= 50 ? 'text-yellow-500' : 'text-red-500') }}">
                {{ $persen }}%
            </td>
        </tr>
        @endforeach

        @php
        $totalPersen = $totalTasklist > 0 ? round(($totalSelesai / $totalTasklist) * 100) : 0;
        @endphp

        <tfoot>
            <tr class="bg-gray-100 border-t font-semibold text-sm">
                <td class="px-2 py-3 text-center" colspan="2">Total</td>
                <td class="px-6 py-3 text-center">{{ $totalTasklist }}</td>
                <td class="px-6 py-3 text-center">{{ $totalSelesai }}</td>
                <td
                    class="px-6 py-3 text-center 
                    {{ $totalPersen >= 75 ? 'text-green-600' : ($totalPersen >= 50 ? 'text-yellow-500' : 'text-red-500') }}">
                    {{ $totalPersen }}%
                </td>
            </tr>
        </tfoot>
    </x-datatable>
</x-layout>
