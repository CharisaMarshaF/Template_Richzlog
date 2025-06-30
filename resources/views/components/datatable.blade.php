@props(['id' => 'datatable', 'disableOrderColumn' => null])
<div class="bg-white rounded-lg shadow-md p-6 pt-2">
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-3 md:space-y-0">
        <div id="entriesPerPageContainer" class="flex items-center space-x-2"></div>
        <div id="dataTableSearchContainer" class="relative flex-grow md:flex-grow-0 w-full md:w-auto"></div>
    </div>

    <div class="overflow-x-auto">
        <table id="{{ $id ?? 'datatable' }}" class="w-full text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    {{ $thead }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        function setupDropdowns() {
            $(document).on('click', function (event) {
                if (!$(event.target).closest('.dropdown-trigger').length && !$(event.target).closest(
                        '.custom-floating-dropdown').length) {
                    $('.custom-floating-dropdown').remove();
                }
            });

            $('.dropdown-trigger').off('click').on('click', function (event) {
                event.stopPropagation();
                const triggerButton = $(this);
                const dropdownId = triggerButton.data('dropdown-toggle');
                const originalDropdown = $('#' + dropdownId);
                $('.custom-floating-dropdown').remove();
                const clonedDropdown = originalDropdown.clone().removeClass('hidden').addClass(
                    'custom-floating-dropdown');
                $('body').append(clonedDropdown);

                const buttonRect = triggerButton[0].getBoundingClientRect();
                const dropdownHeight = clonedDropdown.outerHeight();
                const dropdownWidth = clonedDropdown.outerWidth();

                let topPosition = buttonRect.bottom + window.scrollY + 8;
                let leftPosition = buttonRect.left + window.scrollX;

                const viewportHeight = window.innerHeight;
                if ((buttonRect.bottom + dropdownHeight) > viewportHeight && buttonRect.top >
                    dropdownHeight) {
                    topPosition = buttonRect.top + window.scrollY - dropdownHeight - 8;
                }

                const viewportWidth = window.innerWidth;
                if ((leftPosition + dropdownWidth) > viewportWidth) {
                    leftPosition = buttonRect.right + window.scrollX - dropdownWidth;
                }

                clonedDropdown.css({
                    position: 'absolute',
                    top: topPosition + 'px',
                    left: leftPosition + 'px',
                    'z-index': 99999
                });
            });
        }
        const table = $('#{{ $id ?? '
            datatable ' }}').DataTable({
            "dom": '<"flex flex-col md:flex-row justify-between items-center mb-4" <"flex items-center"l> <"flex items-center space-x-2"f>> <"block overflow-x-auto"t> <"flex flex-col md:flex-row justify-between items-center mt-4"ip>',
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "search": "_INPUT_",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            },
            "pagingType": "simple_numbers",
            columnDefs: [
                {
                    orderable: false,
                    targets: [{{ $disableOrderColumn ?? 0 }}]
                }
            ]


        });

        const wrapper = $('#{{ $id ?? '
            datatable ' }}_wrapper');
        const lengthMenu = wrapper.find('.dataTables_length').detach();
        lengthMenu.find('select').addClass(
            'py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm'
        );
        const label = lengthMenu.find('label');
        const select = label.find('select');
        const texts = label.contents().filter(function () {
            return this.nodeType === 3 && this.textContent.trim() !== '';
        });
        label.empty().append(select);
        texts.each(function () {
            label.append($(this));
        });
        label.addClass('flex items-center space-x-2 text-gray-700 text-sm');
        $('#entriesPerPageContainer').append(lengthMenu);

        const searchDiv = wrapper.find('.dataTables_filter').detach();
        const searchInput = searchDiv.find('input');
        searchInput.addClass(
            'py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm w-full'
        ).attr('placeholder', 'Search Anything');
        const icon =
            `<svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>`;
        searchInput.wrap('<div class="relative flex-grow"></div>').parent().prepend(icon);
        $('#dataTableSearchContainer').append(searchDiv);

        $('.dataTables_paginate').addClass('flex items-center space-x-2');
        $('.dataTables_info').addClass('text-gray-600 text-sm');
        $('.dataTables_paginate .paginate_button').addClass(
            'px-3 py-1 rounded-lg border border-gray-300 hover:bg-gray-100');
        $('.dataTables_paginate .paginate_button.current').addClass('bg-blue-500 text-white hover:bg-blue-600');
        $('.dataTables_paginate .paginate_button.disabled').addClass('opacity-50 cursor-not-allowed');

        setupDropdowns();
    });

</script>
@endpush
