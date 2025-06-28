@props([
'id' => 'modal',
'title' => 'Modal Title',
'size' => 'md' // default width
])

@php
$widthClass = match ($size) {
'sm' => 'max-w-sm',
'md' => 'max-w-md',
'lg' => 'max-w-lg',
'xl' => 'max-w-xl',
'2xl' => 'max-w-2xl',
'3xl' => 'max-w-3xl',
default => 'max-w-md',
};
@endphp

<div id="{{ $id }}"
    class="modal-background fixed inset-0 bg-black bg-opacity-40 z-50 hidden justify-center items-center p-3 overflow-y-auto">
    <div
        class="bg-white w-full {{ $widthClass }} rounded-xl shadow-xl relative modal-content transform scale-95 opacity-0 transition duration-300 max-h-full flex flex-col">
        <div class="flex justify-between items-center px-4 py-2 md:px-5 md:py-3 border-b">
            <h3 class="text-2xl font-semibold text-gray-800 leading-tight">{{ $title }}</h3>
            <button type="button" class="text-gray-500 hover:text-gray-700 text-lg" data-modal-close="{{ $id }}">
                &times;
            </button>
        </div>

        <div class="px-4 py-3 md:px-5 md:py-4 overflow-y-auto" style="max-height: 85vh;">
            {{ $slot }}
        </div>

        {{-- <div class="flex justify-end px-4 py-2 md:px-5 md:py-3 border-t">
            <button type="button" class="px-3 py-1.5 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-sm"
                data-modal-close="{{ $id }}">
                Close
            </button>
        </div> --}}
    </div>
</div>
