{{-- Export Dropdown --}}
<div class="relative" x-data="{ open: false }" @click.outside="open = false">
    <button
        type="button"
        @click="open = !open"
        class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
        </svg>
        Export
        <svg class="w-3.5 h-3.5 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded-xl shadow-lg z-50 overflow-hidden"
        style="display:none;">

        <div class="px-3 py-2 border-b border-gray-100 bg-gray-50">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Export as</p>
        </div>

        {{-- PDF --}}
        <button type="button"
            onclick="openExportModal('pdf')"
            class="w-full flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 transition-colors group">
            <span class="w-7 h-7 rounded-md bg-red-100 flex items-center justify-center flex-shrink-0 group-hover:bg-red-200 transition-colors">
                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM8.5 18v-1h7v1h-7zm0-3v-1h7v1h-7zm0-3v-1h3v1h-3z"/>
                </svg>
            </span>
            <div class="text-left">
                <p class="font-medium text-xs">PDF</p>
                <p class="text-xs text-gray-400">Print-ready list</p>
            </div>
        </button>

        {{-- Excel --}}
        <button type="button"
            onclick="openExportModal('excel')"
            class="w-full flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors group">
            <span class="w-7 h-7 rounded-md bg-green-100 flex items-center justify-center flex-shrink-0 group-hover:bg-green-200 transition-colors">
                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM9 13l2 3-2 3h1.5l1.25-2L15 19h1.5l-2-3 2-3H15l-1.25 2L12.5 13H9z"/>
                </svg>
            </span>
            <div class="text-left">
                <p class="font-medium text-xs">Excel</p>
                <p class="text-xs text-gray-400">Spreadsheet (.xlsx)</p>
            </div>
        </button>
    </div>
</div>

{{-- ── Export Modal ─────────────────────────────────────────────────────── --}}
<div id="exportModal"
    class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50 px-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md flex flex-col">

        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <span id="exportModalIcon" class="w-8 h-8 rounded-lg flex items-center justify-center"></span>
                <div>
                    <h3 class="text-sm font-semibold text-gray-800">Export Employee List</h3>
                    <p class="text-xs text-gray-400" id="exportModalSubtitle"></p>
                </div>
            </div>
            <button onclick="closeExportModal()" class="text-gray-400 hover:text-gray-600 p-1 rounded-md hover:bg-gray-100">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="px-6 py-5 space-y-4">

            {{-- Title Input --}}
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Document Title</label>
                <input
                    type="text"
                    id="exportTitle"
                    placeholder="e.g. Active Employee List"
                    class="w-full px-3 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-800"
                />
                <p class="text-xs text-gray-400 mt-1">This will appear as the heading in your exported file.</p>
            </div>

            {{-- Record Count --}}
            <div class="flex items-center gap-2 px-3 py-2.5 bg-gray-50 border border-gray-100 rounded-lg">
                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h4"/>
                </svg>
                <span id="exportTotalCount" class="text-xs text-gray-500">Loading record count...</span>
            </div>

        </div>

        {{-- Modal Footer --}}
        <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
            <button onclick="closeExportModal()"
                class="py-2 px-4 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-100 transition-colors">
                Cancel
            </button>
            <button id="exportDownloadBtn" onclick="triggerDownload()"
                class="py-2 px-5 text-xs font-semibold rounded-lg bg-green-700 text-white hover:bg-green-800 transition-colors flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Preview & Export
            </button>
        </div>
    </div>
</div>

<script>
    let _exportFormat = 'pdf';

    function openExportModal(format) {
        _exportFormat = format;

        // Icon + subtitle
        const icon = document.getElementById('exportModalIcon');
        const subtitle = document.getElementById('exportModalSubtitle');
        if (format === 'pdf') {
            icon.className = 'w-8 h-8 rounded-lg flex items-center justify-center bg-red-100';
            icon.innerHTML = `<svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM8.5 18v-1h7v1h-7zm0-3v-1h7v1h-7zm0-3v-1h3v1h-3z"/></svg>`;
            subtitle.textContent = 'Exporting as PDF';
        } else {
            icon.className = 'w-8 h-8 rounded-lg flex items-center justify-center bg-green-100';
            icon.innerHTML = `<svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM9 13l2 3-2 3h1.5l1.25-2L15 19h1.5l-2-3 2-3H15l-1.25 2L12.5 13H9z"/></svg>`;
            subtitle.textContent = 'Exporting as Excel (.xlsx)';
        }

        // Reset title input
        const titleInput = document.getElementById('exportTitle');
        titleInput.value = '';

        // Show modal
        const modal = document.getElementById('exportModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Focus title input
        setTimeout(() => titleInput.focus(), 100);

        // Load record count
        loadRecordCount();
    }

    function closeExportModal() {
        const modal = document.getElementById('exportModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function loadRecordCount() {
        const params = new URLSearchParams(window.location.search);
        const countEl = document.getElementById('exportTotalCount');
        countEl.textContent = 'Loading record count...';

        fetch(`{{ route('employees.export.preview') }}?${params.toString()}`)
            .then(r => r.json())
            .then(data => {
                countEl.textContent = `${data.total} record(s) will be exported`;
            })
            .catch(() => {
                countEl.textContent = 'Could not load record count.';
            });
    }

    function triggerDownload() {
        const title = document.getElementById('exportTitle').value.trim();
        if (!title) {
            const input = document.getElementById('exportTitle');
            input.focus();
            input.classList.add('ring-2', 'ring-red-400', 'border-red-400');
            setTimeout(() => input.classList.remove('ring-2', 'ring-red-400', 'border-red-400'), 2000);
            return;
        }

        const params = new URLSearchParams(window.location.search);
        params.set('format', _exportFormat);
        params.set('custom_title', title);

        // Open preview in new tab
        window.open(`{{ route('employees.export') }}?${params.toString()}`, '_blank');
        closeExportModal();
    }

    // Close on backdrop click
    document.getElementById('exportModal').addEventListener('click', function(e) {
        if (e.target === this) closeExportModal();
    });

    // Submit on Enter key
    document.getElementById('exportTitle').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') triggerDownload();
    });
</script>