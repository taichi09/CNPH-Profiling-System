<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    
    <!-- Responsive main container -->
    <main class="lg:ml-72 p-4 sm:p-6 mt-16 transition-all duration-300">
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
                <div class="relative w-full sm:max-w-xs">
                    <input type="text" class="py-2 px-4 pl-10 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-3">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="w-16 px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="w-1/3 px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department Name</th>
                            <th scope="col" class="w-1/3 px-4 sm:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No. of Employees</th>
                            <th scope="col" class="w-1/4 px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">HR Department</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-center text-gray-900">24</td>
                            <td class="px-4 sm:px-6 py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-green-600 text-white hover:bg-green-700">Edit</button>
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">2</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">Finance Department</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-center text-gray-900">24</td>
                            <td class="px-4 sm:px-6 py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-green-600 text-white hover:bg-green-700">Edit</button>
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">3</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">IT Department</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-center text-gray-900">24</td>
                            <td class="px-4 sm:px-6 py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-green-600 text-white hover:bg-green-700">Edit</button>
                                    <button type="button" class="py-1 px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- ========== Add Department Modal ========== -->
    <!-- Full-screen backdrop (covers everything including sidebar) -->
    <div id="modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(17,24,39,0.6);z-index:9998;"></div>

    <div id="add-department-modal"
        class="hidden flex items-start justify-center" style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;padding-top:5rem;padding-left:clamp(1rem, 20vw, 22rem);pointer-events:none;"
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
</body>
</html>