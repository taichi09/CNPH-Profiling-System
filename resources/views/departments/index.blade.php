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
                        <!-- Trigger Button -->
                        <button type="button"
                            data-hs-overlay="#add-department-modal"
                            class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Department
                        </button>
                    </div>
                </div>
                <!-- Search Bar -->
                @include('departments.partials.search-bar')
            </div>

            <!-- Table -->
            @include('departments.partials.table')
        </div>
    </main>

    <!-- ========== Add Department Modal ========== -->
    <!-- Full-screen backdrop (covers everything including sidebar) -->
    <div id="modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(17,24,39,0.6);z-index:9998;"></div>

    <div id="add-department-modal"
        class="flex items-start justify-center" style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;padding-top:5rem;padding-left:clamp(1rem, 20vw, 22rem);pointer-events:none;"
        role="dialog"
        tabindex="-1"
        aria-labelledby="add-department-modal-label"
        aria-modal="true">

        <!-- Modal Box -->
        <div class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-sm transform transition-all duration-300 scale-95 opacity-0 pointer-events-auto" id="modal-box">

            <!-- Modal Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="add-department-modal-label" class="font-bold text-gray-800 text-lg">
                    Add Department
                </h3>
                <button type="button"
                    id="modal-close-x"
                    class="size-8 inline-flex justify-center items-center rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <form id="add-department-form">
                    <div class="mb-4">
                        <label for="department-name" class="block text-sm font-medium text-gray-700 mb-1">
                            Department Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            id="department-name"
                            name="department_name"
                            class="py-2 px-3 block w-full border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="e.g. Marketing Department"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="department-description" class="block text-sm font-medium text-gray-700 mb-1">
                            Description <span class="text-gray-400 font-normal">(optional)</span>
                        </label>
                        <textarea id="department-description"
                            name="description"
                            rows="3"
                            class="py-2 px-3 block w-full border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 resize-none"
                            placeholder="Brief description of this department..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button"
                    id="modal-cancel-btn"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    form="add-department-form"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                    Save Department
                </button>
            </div>

        </div>
    </div>
    <!-- ========== End Modal ========== -->

    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>

    <script>
        const modal        = document.getElementById('add-department-modal');
        const modalBox     = document.getElementById('modal-box');
        const backdrop     = document.getElementById('modal-backdrop');
        const openBtn      = document.querySelector('[data-hs-overlay="#add-department-modal"]');
        const closeXBtn    = document.getElementById('modal-close-x');
        const cancelBtn    = document.getElementById('modal-cancel-btn');

        function openModal() {
            modal.style.display = 'flex';
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
                backdrop.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
            }, 200);
        }

        openBtn.addEventListener('click', openModal);
        closeXBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        // Close when clicking the backdrop
        backdrop.addEventListener('click', closeModal);

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.style.display === 'flex') {
                closeModal();
            }
        });
    </script>
</x-app-layout>
