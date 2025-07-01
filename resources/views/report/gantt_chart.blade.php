<x-layout>
    <p class="text-2xl font-semibold text-gray-800 mb-4">Gantt Chart - Juni</p>

    <div class="overflow-x-auto border rounded-lg shadow bg-white">
        <table class="min-w-max w-full table-fixed border-collapse" style="min-width: 1800px;">
            <thead class="bg-gray-100 sticky top-0 z-10">
                <tr>
                    <th class="w-48 px-4 py-2 border text-left text-sm text-gray-600" rowspan="2">Programmer</th>
                    <th class="px-2 py-2 border text-center text-sm text-gray-700" colspan="30">Juni</th>
                </tr>
                <tr>
                    @for($i = 1; $i <= 30; $i++)
                        <th class="w-12 px-2 py-1 border text-center text-sm text-gray-500" style="min-width: 50px;">{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody class="text-sm">
                @php
                    // Hari libur
                    $holidays = [
                        1 => 'Libur Hari Sabtu',
                        13 => 'Libur Hari Sabtu',
                        14 => 'Libur Hari Minggu',
                        20 => 'Waisak',
                        21 => 'Libur Hari Minggu',
                        27 => 'Libur Hari Sabtu',
                        28 => 'Libur Hari Minggu',
                    ];

                    // Data programmer & task
                    $data = [
                        [
                            'name' => 'Agung Prasetyo',
                            'tasks' => [
                                ['start' => 3, 'end' => 6, 'kode' => 'TL001'],
                                ['start' => 5, 'end' => 9, 'kode' => 'TL002'], // Overlap TL001
                                ['start' => 15, 'end' => 17, 'kode' => 'TL003'],
                            ]
                        ],
                        [
                            'name' => 'Rizky Maulana',
                            'tasks' => [
                                ['start' => 4, 'end' => 5, 'kode' => 'TL004'],
                                ['start' => 8, 'end' => 10, 'kode' => 'TL005'],
                                ['start' => 10, 'end' => 12, 'kode' => 'TL006'], // Overlap TL005
                            ]
                        ],
                        [
                            'name' => 'Nanda Septian',
                            'tasks' => [
                                ['start' => 7, 'end' => 9, 'kode' => 'TL007'],
                                ['start' => 15, 'end' => 15, 'kode' => 'TL008'],
                                ['start' => 16, 'end' => 19, 'kode' => 'TL009'],
                            ]
                        ],
                        [
                            'name' => 'Siti Mawar',
                            'tasks' => [
                                ['start' => 2, 'end' => 4, 'kode' => 'TL010'],
                                ['start' => 3, 'end' => 3, 'kode' => 'TL011'], // Overlap TL010
                                ['start' => 22, 'end' => 22, 'kode' => 'TL012'], // Start on holiday (Waisak)
                            ]
                        ],
                    ];

                    // Fungsi bagi task ke dalam lapisan agar tidak tabrakan
                    function distributeTasks($tasks) {
                        $levels = [];
                        foreach ($tasks as $task) {
                            $placed = false;
                            foreach ($levels as &$level) {
                                $conflict = false;
                                foreach ($level as $t) {
                                    if (!($task['end'] < $t['start'] || $task['start'] > $t['end'])) {
                                        $conflict = true;
                                        break;
                                    }
                                }
                                if (!$conflict) {
                                    $level[] = $task;
                                    $placed = true;
                                    break;
                                }
                            }
                            if (!$placed) {
                                $levels[] = [$task];
                            }
                        }
                        return $levels;
                    }
                @endphp

                @foreach($data as $person)
                    @php
                        $taskLevels = distributeTasks($person['tasks']);
                    @endphp

                    @foreach($taskLevels as $levelIndex => $taskRow)
                        <tr class="border-b">
                            @if($levelIndex == 0)
                                <td class="px-4 py-2 border text-gray-700 whitespace-nowrap" rowspan="{{ count($taskLevels) }}">
                                    {{ $person['name'] }}
                                </td>
                            @endif

                            @php $skipUntil = 0; @endphp
                            @for($i = 1; $i <= 30; $i++)
                                @if($i <= $skipUntil)
                                    @continue
                                @endif

                                @php
                                    $currentTask = null;
                                    foreach($taskRow as $task){
                                        if($task['start'] == $i){
                                            $currentTask = $task;
                                            break;
                                        }
                                    }

                                    $isHoliday = array_key_exists($i, $holidays);
                                    $holidayTitle = $isHoliday ? $holidays[$i] : '';
                                @endphp

                                @if($currentTask)
                                    @php
                                        $length = $currentTask['end'] - $currentTask['start'] + 1;
                                        $skipUntil = $currentTask['end'];
                                    @endphp
                                    <td colspan="{{ $length }}"
                                        class="px-1 py-1 border text-center align-middle"
                                        style="min-width: {{ 50 * $length }}px;"
                                        title="{{ $currentTask['kode'] }}">
                                        <span class="block w-full bg-purple-600 text-white text-xs font-semibold rounded px-1 py-1 text-center select-none whitespace-nowrap overflow-x-auto">
                                            {{ $currentTask['kode'] }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-1 py-1 border text-center align-middle {{ $isHoliday ? 'bg-red-200 text-red-800 font-semibold' : '' }}"
                                        style="min-width: 50px;"
                                        title="{{ $holidayTitle }}">
                                        &nbsp;
                                    </td>
                                @endif
                            @endfor
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
