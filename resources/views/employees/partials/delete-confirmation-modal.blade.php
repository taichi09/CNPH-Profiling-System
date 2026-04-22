<div id="resignModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Mark as Resigned</h3>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            Are you sure you want to mark <span id="resignEmployeeName" class="font-semibold text-gray-900"></span> as <span class="font-semibold text-red-600">RESIGNED</span>?
        </p>

        <form id="resignForm" method="POST" action="">
            @csrf
            @method('PATCH')

            {{-- Date of Resignation --}}
            <div class="mb-6">
                <label for="date_resigned" class="block text-sm font-medium text-gray-700 mb-1">
                    Date of Resignation <span class="text-red-500">*</span>
                </label>
                <input
                    type="date"
                    id="date_resigned"
                    name="date_resigned"
                    required
                    max="{{ date('Y-m-d') }}"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700">
                <p class="mt-1 text-xs text-gray-400">Cannot be a future date.</p>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeResignModal()"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Mark as Resigned
                </button>
            </div>
        </form>
    </div>
</div>