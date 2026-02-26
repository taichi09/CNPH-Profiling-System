<!-- Backdrop -->
<div id="import-backdrop" style="display:none;position:fixed;inset:0;background:rgba(17,24,39,0.6);z-index:9998;"></div>

<!-- Modal -->
<div id="import-modal"
    style="display:none;position:fixed;inset:0;z-index:9999;"
    class="flex items-center justify-center"
    role="dialog"
    aria-modal="true">

    <!-- Modal Box -->
    <div id="import-modal-box" class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0">

        <!-- Modal Header -->
        <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
            <h3 class="font-bold text-gray-800 text-lg">Import Employees</h3>
            <button type="button" id="import-close-x" class="size-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form method="POST" action="{{ route('employees.import') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-4 sm:p-6">

                <!-- Instructions -->
                <p class="text-sm text-gray-500 mb-4">Upload a CSV file to import employees. Make sure your CSV columns are in this order:</p>
                <div class="bg-gray-50 rounded-lg p-3 mb-4 text-xs text-gray-600 font-mono">
                    surname, first_name, middle_name, extension, date_of_birth, place_of_birth, sex_at_birth, civil_status, height, weight, blood_type, umid_id_no, pagibig_id_no, philhealth_id_no, philsys_no, tin_no, agency_employee_no, citizenship, residential_address, residential_zip_code, permanent_address, permanent_zip_code, telephone_no, email_address, mobile_no
                </div>

                <!-- File Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select CSV File</label>
                    <input type="file" name="file" accept=".xlsx,.xls"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                {{-- Success message --}}
                @if(session('success'))
                    <p class="mt-3 text-sm text-green-600 font-medium">{{ session('success') }}</p>
                @endif

            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button" id="import-cancel-btn" class="py-2 px-4 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" class="py-2 px-4 text-sm font-semibold rounded-lg bg-green-700 text-white hover:bg-green-800">
                    Import
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Script -->
<script>
    const importModal     = document.getElementById('import-modal');
    const importModalBox  = document.getElementById('import-modal-box');
    const importBackdrop  = document.getElementById('import-backdrop');
    const importOpenBtn   = document.getElementById('import-btn');
    const importCloseX    = document.getElementById('import-close-x');
    const importCancelBtn = document.getElementById('import-cancel-btn');

    function openImportModal() {
        importModal.style.display = 'flex';
        importBackdrop.style.display = 'block';
        document.body.classList.add('overflow-hidden');
        requestAnimationFrame(() => {
            importModalBox.classList.remove('scale-95', 'opacity-0');
            importModalBox.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeImportModal() {
        importModalBox.classList.remove('scale-100', 'opacity-100');
        importModalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            importModal.style.display = 'none';
            importBackdrop.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }

    importOpenBtn.addEventListener('click', openImportModal);
    importCloseX.addEventListener('click', closeImportModal);
    importCancelBtn.addEventListener('click', closeImportModal);
    importBackdrop.addEventListener('click', closeImportModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && importModal.style.display === 'flex') closeImportModal();
    });
</script>