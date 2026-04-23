{{-- resources/views/employees/partials/import-modal.blade.php --}}

<div id="import-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col">

        {{-- Modal Header --}}
        <div class="p-6 border-b border-gray-200 flex items-center justify-between shrink-0">
            <div>
                <h3 class="text-lg font-bold text-gray-800" id="modal-title">Import Employees</h3>
                <p class="text-sm text-gray-500 mt-0.5" id="modal-subtitle">Upload a PDS Excel file (.xlsx / .xlsm)</p>
            </div>
            <button type="button" id="close-import-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Step Indicator --}}
        <div class="px-6 pt-4 pb-2 shrink-0">
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-2">
                    <div id="step1-dot" class="w-7 h-7 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center font-bold transition-colors">1</div>
                    <span id="step1-label" class="text-sm font-medium text-blue-600">Upload File</span>
                </div>
                <div class="flex-1 h-px bg-gray-200 mx-1"></div>
                <div class="flex items-center gap-2">
                    <div id="step2-dot" class="w-7 h-7 rounded-full bg-gray-200 text-gray-400 text-xs flex items-center justify-center font-bold transition-colors">2</div>
                    <span id="step2-label" class="text-sm font-medium text-gray-400 transition-colors">Preview Changes</span>
                </div>
            </div>
        </div>

        {{-- Scrollable Body --}}
        <div class="flex-1 overflow-y-auto p-6">

            {{-- ── STEP 1: Upload ── --}}
            <div id="step-upload">
                <div id="drop-zone"
                    class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                    <svg class="w-10 h-10 mx-auto text-gray-400 group-hover:text-blue-400 mb-3 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-sm font-medium text-gray-700 group-hover:text-blue-600">Click to browse or drag & drop</p>
                    <p class="text-xs text-gray-400 mt-1">Supports .xlsx, .xlsm, .xls — max 10MB</p>
                    <input type="file" id="import-file-input" accept=".xlsx,.xlsm,.xls" class="hidden">
                </div>

                {{-- Selected file pill --}}
                <div id="selected-file" class="hidden mt-3 flex items-center gap-3 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span id="selected-file-name" class="text-sm text-blue-700 font-medium truncate flex-1"></span>
                    <button type="button" id="remove-file" class="text-blue-400 hover:text-red-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div id="upload-error" class="hidden mt-3 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600"></div>
            </div>

            {{-- ── STEP 2: Preview ── --}}
            <div id="step-preview" class="hidden">
                {{-- Summary Cards --}}
                <div class="grid grid-cols-2 gap-3 mb-5">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                        <div id="count-new" class="text-2xl font-bold text-green-700">0</div>
                        <div class="text-xs text-green-600 font-medium mt-0.5">New Employees</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 text-center">
                        <div id="count-duplicate" class="text-2xl font-bold text-gray-500">0</div>
                        <div class="text-xs text-gray-500 font-medium mt-0.5">Skipped (Duplicate)</div>
                    </div>
                </div>

                {{-- Detail Lists --}}
                <div class="space-y-3" id="preview-details">
                    {{-- Populated by JS --}}
                </div>
            </div>

        </div>

        {{-- Modal Footer --}}
        <div class="p-6 border-t border-gray-200 flex items-center justify-between shrink-0">
            <button type="button" id="btn-back" class="hidden text-sm text-gray-600 hover:text-gray-800 flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back
            </button>
            <div class="flex gap-3 ml-auto">
                <button type="button" id="btn-cancel" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="button" id="btn-preview"
                    class="px-5 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    disabled>
                    <span id="btn-preview-text">Preview Changes</span>
                    <svg id="btn-preview-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                </button>
                <form id="confirm-import-form" action="{{ route('employees.import') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="temp_path" id="temp-path-input">
                    <button type="submit" id="btn-confirm"
                        class="px-5 py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium flex items-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Confirm Import
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    // ── Elements ──────────────────────────────────────────────────
    const modal          = document.getElementById('import-modal');
    const dropZone       = document.getElementById('drop-zone');
    const fileInput      = document.getElementById('import-file-input');
    const selectedFile   = document.getElementById('selected-file');
    const selectedName   = document.getElementById('selected-file-name');
    const removeFile     = document.getElementById('remove-file');
    const uploadError    = document.getElementById('upload-error');
    const stepUpload     = document.getElementById('step-upload');
    const stepPreview    = document.getElementById('step-preview');
    const btnPreview     = document.getElementById('btn-preview');
    const btnPreviewText = document.getElementById('btn-preview-text');
    const btnSpinner     = document.getElementById('btn-preview-spinner');
    const btnBack        = document.getElementById('btn-back');
    const btnCancel      = document.getElementById('btn-cancel');
    const confirmForm    = document.getElementById('confirm-import-form');
    const tempPathInput  = document.getElementById('temp-path-input');
    const step1Dot       = document.getElementById('step1-dot');
    const step2Dot       = document.getElementById('step2-dot');
    const step2Label     = document.getElementById('step2-label');

    // ── Open / Close ──────────────────────────────────────────────
    document.getElementById('import-btn').addEventListener('click', openModal);
    document.getElementById('close-import-modal').addEventListener('click', closeModal);
    btnCancel.addEventListener('click', closeModal);
    modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });

    function openModal() {
        resetModal();
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
        resetModal();
    }

    function resetModal() {
        fileInput.value = '';
        selectedFile.classList.add('hidden');
        uploadError.classList.add('hidden');
        stepUpload.classList.remove('hidden');
        stepPreview.classList.add('hidden');
        btnPreview.classList.remove('hidden');
        confirmForm.classList.add('hidden');
        btnBack.classList.add('hidden');
        btnPreview.disabled = true;
        // Reset steps
        step1Dot.className = 'w-7 h-7 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center font-bold transition-colors';
        step2Dot.className = 'w-7 h-7 rounded-full bg-gray-200 text-gray-400 text-xs flex items-center justify-center font-bold transition-colors';
        step2Label.className = 'text-sm font-medium text-gray-400 transition-colors';
    }

    // ── File Selection ─────────────────────────────────────────────
    dropZone.addEventListener('click', () => fileInput.click());
    dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('border-blue-400','bg-blue-50'); });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-blue-400','bg-blue-50'));
    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('border-blue-400','bg-blue-50');
        if (e.dataTransfer.files[0]) setFile(e.dataTransfer.files[0]);
    });
    fileInput.addEventListener('change', () => { if (fileInput.files[0]) setFile(fileInput.files[0]); });
    removeFile.addEventListener('click', e => {
        e.stopPropagation();
        fileInput.value = '';
        selectedFile.classList.add('hidden');
        btnPreview.disabled = true;
        uploadError.classList.add('hidden');
    });

    function setFile(file) {
        const ext = file.name.split('.').pop().toLowerCase();
        if (!['xlsx','xlsm','xls'].includes(ext)) {
            showError('Only .xlsx, .xlsm, or .xls files are allowed.');
            return;
        }
        uploadError.classList.add('hidden');
        selectedName.textContent = file.name;
        selectedFile.classList.remove('hidden');
        btnPreview.disabled = false;
    }

    // ── Preview Step ───────────────────────────────────────────────
    btnPreview.addEventListener('click', async () => {
        if (!fileInput.files[0]) return;

        setLoading(true);
        uploadError.classList.add('hidden');

        const fd = new FormData();
        fd.append('file', fileInput.files[0]);
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        try {
            const res  = await fetch('{{ route("employees.import.preview") }}', { method: 'POST', body: fd });
            const data = await res.json();

            if (!res.ok) throw new Error(data.message || data.errors?.file?.[0] || 'Preview failed.');

            tempPathInput.value = data.temp_path;
            renderPreview(data);
            goToStep2();
        } catch (err) {
            showError(err.message);
        } finally {
            setLoading(false);
        }
    });

    btnBack.addEventListener('click', () => {
        stepPreview.classList.add('hidden');
        stepUpload.classList.remove('hidden');
        btnPreview.classList.remove('hidden');
        confirmForm.classList.add('hidden');
        btnBack.classList.add('hidden');
        // Reset step indicator
        step1Dot.className = 'w-7 h-7 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center font-bold transition-colors';
        step2Dot.className = 'w-7 h-7 rounded-full bg-gray-200 text-gray-400 text-xs flex items-center justify-center font-bold transition-colors';
        step2Label.className = 'text-sm font-medium text-gray-400 transition-colors';
    });

    // ── Render Preview ─────────────────────────────────────────────
    function renderPreview(data) {
        document.getElementById('count-new').textContent       = data.summary.new_count;
        document.getElementById('count-duplicate').textContent = data.summary.duplicate_count;

        const container = document.getElementById('preview-details');
        container.innerHTML = '';

        if (data.new.length)       container.appendChild(buildSection('New Employees', data.new, 'green', 'M12 4v16m8-8H4'));
        if (data.duplicate.length) container.appendChild(buildSection('Skipped (Duplicates)', data.duplicate, 'gray', 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636'));
    }

    function buildSection(title, items, color, iconPath) {
        const colors = {
            green: { bg: 'bg-green-50', border: 'border-green-200', title: 'text-green-700', badge: 'bg-green-100 text-green-700', icon: 'text-green-500', row: 'text-green-800', sub: 'text-green-600' },
            gray:  { bg: 'bg-gray-50',  border: 'border-gray-200',  title: 'text-gray-600',  badge: 'bg-gray-100 text-gray-600',   icon: 'text-gray-400', row: 'text-gray-700', sub: 'text-gray-500' },
        };
        const c = colors[color];

        const wrap = document.createElement('div');
        wrap.className = `${c.bg} ${c.border} border rounded-lg overflow-hidden`;

        // Header (collapsible)
        const header = document.createElement('button');
        header.type = 'button';
        header.className = `w-full flex items-center justify-between p-3 text-left hover:opacity-80 transition-opacity`;
        header.innerHTML = `
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 ${c.icon} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}"/>
                </svg>
                <span class="text-sm font-semibold ${c.title}">${title}</span>
                <span class="text-xs px-2 py-0.5 rounded-full font-medium ${c.badge}">${items.length}</span>
            </div>
            <svg class="chevron w-4 h-4 ${c.icon} transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>`;

        const body = document.createElement('div');
        body.className = 'divide-y divide-gray-100 max-h-40 overflow-y-auto';

        items.forEach(item => {
            const row = document.createElement('div');
            row.className = 'px-4 py-2';
            row.innerHTML = `
                <p class="text-sm font-medium ${c.row}">${item.name || '—'}</p>
                ${item.employee_id ? `<p class="text-xs ${c.sub}">${item.employee_id}</p>` : ''}
                ${item.reason     ? `<p class="text-xs ${c.sub}">${item.reason}</p>`      : ''}`;
            body.appendChild(row);
        });

        // Toggle collapse
        let open = true;
        header.addEventListener('click', () => {
            open = !open;
            body.style.display = open ? '' : 'none';
            header.querySelector('.chevron').style.transform = open ? '' : 'rotate(-90deg)';
        });

        wrap.appendChild(header);
        wrap.appendChild(body);
        return wrap;
    }

    // ── Helpers ────────────────────────────────────────────────────
    function goToStep2() {
        stepUpload.classList.add('hidden');
        stepPreview.classList.remove('hidden');
        btnPreview.classList.add('hidden');
        confirmForm.classList.remove('hidden');
        btnBack.classList.remove('hidden');
        step1Dot.className = 'w-7 h-7 rounded-full bg-green-500 text-white text-xs flex items-center justify-center font-bold transition-colors';
        step1Dot.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
        step2Dot.className = 'w-7 h-7 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center font-bold transition-colors';
        step2Dot.textContent = '2';
        step2Label.className = 'text-sm font-medium text-blue-600 transition-colors';
    }

    function setLoading(on) {
        btnPreview.disabled = on;
        btnPreviewText.textContent = on ? 'Analyzing...' : 'Preview Changes';
        btnSpinner.classList.toggle('hidden', !on);
    }

    function showError(msg) {
        uploadError.textContent = msg;
        uploadError.classList.remove('hidden');
    }
})();
</script>