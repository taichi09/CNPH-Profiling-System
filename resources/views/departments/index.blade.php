<x-app-layout>    
    <!-- Responsive main container -->
    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300">
        <!-- All Departments Section -->
        <div class="bg-white rounded-lg shadow">
            <!-- Header -->
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                    <h2 class="text-xl font-bold text-green-800">All Departments</h2>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="button"
                            id="open-add-modal-btn"
                            class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Department
                        </button>
                    </div>
                </div>
                @include('departments.partials.search-bar')
            </div>
            @include('departments.partials.table')
        </div>
    </main>

    <!-- Backdrop (shared) -->
    <div id="modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(17,24,39,0.6);z-index:9998;"></div>

    <!-- ========== Edit Department Modal ========== -->
    <div id="edit-department-modal"
        style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;padding-top:5rem;padding-left:clamp(1rem, 20vw, 22rem);"
        class="flex items-start justify-center"
        role="dialog" tabindex="-1"
        aria-labelledby="edit-department-modal-label" aria-modal="true">

        <div class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-sm transform transition-all duration-300 scale-95 opacity-0" id="edit-modal-box">

            <!-- Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="edit-department-modal-label" class="font-bold text-gray-800 text-lg">Edit Department</h3>
                <button type="button" id="edit-modal-close-x"
                    class="size-8 inline-flex justify-center items-center rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="p-4 sm:p-6">
                <form id="edit-department-form">
                    @csrf
                    <input type="hidden" id="edit-department-id">
                    <div class="mb-4">
                        <label for="edit-department-name" class="block text-sm font-medium text-gray-700 mb-1">
                            Department Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="edit-department-name" name="department_name"
                            class="py-2 px-3 block w-full border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="e.g. Marketing Department" required>
                        <p id="edit-dept-name-error" class="text-red-500 text-xs mt-1 hidden"></p>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button" id="edit-modal-cancel-btn"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none">
                    Cancel
                </button>
                <button type="submit" form="edit-department-form"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                    Save Changes
                </button>
            </div>

        </div>
    </div>
    <!-- ========== End Edit Modal ========== -->

    <!-- ========== Add Department Modal ========== -->
    <div id="add-department-modal"
        style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;padding-top:5rem;padding-left:clamp(1rem, 20vw, 22rem);"
        class="flex items-start justify-center"
        role="dialog" tabindex="-1"
        aria-labelledby="add-department-modal-label" aria-modal="true">

        <div class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-sm transform transition-all duration-300 scale-95 opacity-0" id="modal-box">

            <!-- Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="add-department-modal-label" class="font-bold text-gray-800 text-lg">Add Department</h3>
                <button type="button" id="modal-close-x"
                    class="size-8 inline-flex justify-center items-center rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="p-4 sm:p-6">
                <form id="add-department-form">
                    @csrf
                    <div class="mb-4">
                        <label for="department-name" class="block text-sm font-medium text-gray-700 mb-1">
                            Department Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="department-name" name="department_name"
                            class="py-2 px-3 block w-full border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="e.g. Marketing Department" required>
                        <p id="dept-name-error" class="text-red-500 text-xs mt-1 hidden"></p>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button" id="modal-cancel-btn"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none">
                    Cancel
                </button>
                <button type="submit" form="add-department-form"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                    Save Department
                </button>
            </div>

        </div>
    </div>
    <!-- ========== End Add Modal ========== -->

    <!-- ========== Success Modal ========== -->
    <div id="success-modal"
        style="display:none;position:fixed;inset:0;z-index:10000;"
        class="flex items-center justify-center">

        <div class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-sm mx-4 transform transition-all duration-300 scale-95 opacity-0" id="success-modal-box">

            <!-- Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 class="font-bold text-gray-800 text-lg">Success</h3>
                <button type="button" id="success-close-x"
                    class="size-8 inline-flex justify-center items-center rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="p-6 flex flex-col items-center text-center gap-3">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-green-100">
                    <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <p class="text-gray-800 font-semibold text-base" id="success-modal-message">Department added successfully.</p>
                <p class="text-gray-500 text-sm" id="success-modal-sub">The department has been saved and is now available in the list.</p>
            </div>

            <!-- Footer -->
            <div class="flex justify-center items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button" id="success-ok-btn"
                    class="py-2 px-6 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none">
                    OK
                </button>
            </div>

        </div>
    </div>
    <!-- ========== End Success Modal ========== -->

    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
<script>
    // ── Element References ──
    const modal         = document.getElementById('add-department-modal');
    const modalBox      = document.getElementById('modal-box');
    const backdrop      = document.getElementById('modal-backdrop');
    const openBtn       = document.getElementById('open-add-modal-btn');
    const closeXBtn     = document.getElementById('modal-close-x');
    const cancelBtn     = document.getElementById('modal-cancel-btn');
    const form          = document.getElementById('add-department-form');

    const successModal    = document.getElementById('success-modal');
    const successModalBox = document.getElementById('success-modal-box');
    const successCloseX   = document.getElementById('success-close-x');
    const successOkBtn    = document.getElementById('success-ok-btn');
    const successMessage  = document.getElementById('success-modal-message');
    const successSub      = document.getElementById('success-modal-sub');

    const editModal     = document.getElementById('edit-department-modal');
    const editModalBox  = document.getElementById('edit-modal-box');
    const editCloseX    = document.getElementById('edit-modal-close-x');
    const editCancelBtn = document.getElementById('edit-modal-cancel-btn');
    const editForm      = document.getElementById('edit-department-form');

    // ── Add Modal ──
    function openModal() {
        modal.style.display = 'flex';
        modal.style.pointerEvents = 'auto';
        backdrop.style.display = 'block';
        document.body.classList.add('overflow-hidden');
        requestAnimationFrame(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeModal() {
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.style.display = 'none';
            modal.style.pointerEvents = 'none';
            backdrop.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }

    // ── Edit Modal ──
    function openEditModal(id, name) {
        document.getElementById('edit-department-id').value = id;
        document.getElementById('edit-department-name').value = name;
        document.getElementById('edit-dept-name-error').classList.add('hidden');
        editModal.style.display = 'flex';
        editModal.style.pointerEvents = 'auto';
        backdrop.style.display = 'block';
        document.body.classList.add('overflow-hidden');
        requestAnimationFrame(() => {
            editModalBox.classList.remove('scale-95', 'opacity-0');
            editModalBox.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeEditModal() {
        editModalBox.classList.remove('scale-100', 'opacity-100');
        editModalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            editModal.style.display = 'none';
            editModal.style.pointerEvents = 'none';
            backdrop.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }

    // ── Success Modal ──
    function openSuccessModal(message, sub) {
        successMessage.textContent = message || 'Operation successful.';
        successSub.textContent = sub || 'The department has been saved and is now available in the list.';
        successModal.style.display = 'flex';
        backdrop.style.display = 'block';
        document.body.classList.add('overflow-hidden');
        requestAnimationFrame(() => {
            successModalBox.classList.remove('scale-95', 'opacity-0');
            successModalBox.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeSuccessModal() {
        successModalBox.classList.remove('scale-100', 'opacity-100');
        successModalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            successModal.style.display = 'none';
            backdrop.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
            location.reload();
        }, 200);
    }

    // ── Event Listeners ──
    openBtn.addEventListener('click', openModal);
    closeXBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    editCloseX.addEventListener('click', closeEditModal);
    editCancelBtn.addEventListener('click', closeEditModal);
    successCloseX.addEventListener('click', closeSuccessModal);
    successOkBtn.addEventListener('click', closeSuccessModal);

    backdrop.addEventListener('click', (e) => {
        e.stopPropagation();
        if (editModal.style.display === 'flex') { closeEditModal(); return; }
        if (modal.style.display === 'flex') { closeModal(); return; }
        if (successModal.style.display === 'flex') { closeSuccessModal(); return; }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (editModal.style.display === 'flex') { closeEditModal(); return; }
            if (modal.style.display === 'flex') { closeModal(); return; }
            if (successModal.style.display === 'flex') { closeSuccessModal(); return; }
        }
    });

    // ── Edit button delegation ──
    document.addEventListener('click', function (e) {
        const editBtn = e.target.closest('.edit-btn');
        if (editBtn) {
            e.stopPropagation();
            const id   = editBtn.dataset.id;
            const name = editBtn.dataset.name;
            if (!id) {
                console.error('Edit button missing data-id attribute');
                return;
            }
            openEditModal(id, name);
        }
    });

    // ── Add Department Form Submit ──
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const csrfToken     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const deptNameError = document.getElementById('dept-name-error');
        const submitBtn     = document.querySelector('[form="add-department-form"]');

        deptNameError.classList.add('hidden');
        deptNameError.textContent = '';
        submitBtn.disabled = true;
        submitBtn.textContent = 'Saving...';

        fetch('/departments', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                department_name: document.getElementById('department-name').value
            }),
        })
        .then(res => res.json().then(data => ({ status: res.status, data })))
        .then(result => {
            if (result.status === 200 && result.data.success) {
                form.reset();
                closeModal();
                setTimeout(() => openSuccessModal(
                    result.data.message,
                    'The new department has been saved and is now available in the list.'
                ), 250);
            } else if (result.data.errors) {
                deptNameError.textContent = result.data.errors.department_name?.[0] ?? 'Validation error.';
                deptNameError.classList.remove('hidden');
            }
        })
        .catch(() => {
            deptNameError.textContent = 'Something went wrong. Please try again.';
            deptNameError.classList.remove('hidden');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Save Department';
        });
    });

    // ── Edit Department Form Submit ──
    editForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const csrfToken     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const editNameError = document.getElementById('edit-dept-name-error');
        const submitBtn     = document.querySelector('[form="edit-department-form"]');
        const id            = document.getElementById('edit-department-id').value;

        if (!id) {
            editNameError.textContent = 'Department ID is missing. Please close and try again.';
            editNameError.classList.remove('hidden');
            return;
        }

        editNameError.classList.add('hidden');
        editNameError.textContent = '';
        submitBtn.disabled = true;
        submitBtn.textContent = 'Saving...';

        fetch(`/departments/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                department_name: document.getElementById('edit-department-name').value
            }),
        })
        .then(res => res.json().then(data => ({ status: res.status, data })))
        .then(result => {
            if ((result.status === 200 || result.status === 201) && result.data.success) {
                editForm.reset();
                closeEditModal();
                setTimeout(() => openSuccessModal(
                    result.data.message || 'Department updated successfully.',
                    'The department has been updated and changes are now reflected in the list.'
                ), 250);
            } else if (result.data.errors) {
                editNameError.textContent = result.data.errors.department_name?.[0] ?? 'Validation error.';
                editNameError.classList.remove('hidden');
            } else {
                editNameError.textContent = result.data.message ?? 'Update failed. Please try again.';
                editNameError.classList.remove('hidden');
            }
        })
        .catch(() => {
            editNameError.textContent = 'Something went wrong. Please try again.';
            editNameError.classList.remove('hidden');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Save Changes';
        });
    });
</script>
</x-app-layout>