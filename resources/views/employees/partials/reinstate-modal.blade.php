<div id="reinstateModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-6">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Reinstate Employee</h3>
                <p class="text-sm text-gray-500">Reinstating <span id="reinstateEmployeeName" class="font-medium text-gray-700"></span></p>
            </div>
        </div>

        <form id="reinstateForm" method="POST" action="">
            @csrf
            @method('PATCH')

            {{-- Employment Status --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Employment Status <span class="text-red-500">*</span></label>
                <select name="employment_status" required
                    class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select status</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Regular">Regular</option>
                    <option value="COS">COS (Contract of Service)</option>
                    <option value="Job Order">Job Order</option>
                </select>
            </div>

            {{-- Department --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Department <span class="text-red-500">*</span></label>
                <select name="department" required
                    class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select department</option>
                    <optgroup label="Medical">
                        <option value="Medical - Doctors">Medical - Doctors</option>
                        <option value="Medical - Nurses">Medical - Nurses</option>
                        <option value="Medical - Midwives">Medical - Midwives</option>
                        <option value="Medical - Allied Health">Medical - Allied Health</option>
                    </optgroup>
                    <optgroup label="Administrative">
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="IT">IT</option>
                        <option value="Admin">Admin</option>
                    </optgroup>
                    <optgroup label="Support">
                        <option value="Security">Security</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Housekeeping">Housekeeping</option>
                    </optgroup>
                </select>
            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeReinstateModal()"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                    Reinstate Employee
                </button>
            </div>
        </form>
    </div>
</div>