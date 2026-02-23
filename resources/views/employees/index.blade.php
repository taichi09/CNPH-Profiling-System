<x-app-layout>    
    <!-- Responsive main container - similar to Bootstrap's behavior -->
    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300">
        <!-- All Employees Section -->
        <div class="bg-white rounded-lg shadow">
            <!-- Header -->
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                    <h2 class="text-xl font-bold text-green-800">All Employees</h2>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="button" class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            Filter
                        </button>
                        <button type="button" class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Employee
                        </button>
                    </div>
                </div>
                <!-- Search Bar -->
                @include('employees.partials.search-bar')
            </div>

            <!-- Table -->
            @include('employees.partials.table')
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
</x-app-layout>
