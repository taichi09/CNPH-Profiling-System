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
                    <option value="Casual">Casual</option>
                    <option value="Contract of Service">COS (Contract of Service)</option>
                    <option value="Job Order">Job Order</option>
                </select>
            </div>

            {{-- Department --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Department <span class="text-red-500">*</span></label>
                <select name="department" required
                    class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select department</option>
                    <option value="MEDICAL">MEDICAL</option>
                    <option value="NURSES">NURSES</option>
                    <option value="NURSING ATTENDANT">NURSING ATTENDANT</option>
                    <option value="MIDWIVES">MIDWIVES</option>
                    <option value="ADMINISTRATIVE">ADMINISTRATIVE</option>
                    <option value="TECHNICAL">TECHNICAL</option>
                    <option value="ANCILLARY">ANCILLARY</option>
                    <option value="COH/COC">COH/COC</option>
                    <option value="HUMAN RESOURCE MANAGEMENT OFFICE">HUMAN RESOURCE MANAGEMENT OFFICE</option>
                    <option value="QUALITY ASSURANCE UNIT">QUALITY ASSURANCE UNIT</option>
                    <option value="BUDGET/FINANCE">BUDGET/FINANCE</option>
                    <option value="CASH OPERATION">CASH OPERATION</option>
                    <option value="HIMS OPD RECORDS">HIMS OPD RECORDS</option>
                    <option value="OPD RECORDS">OPD RECORDS</option>
                    <option value="SUPPLY UNIT">SUPPLY UNIT</option>
                    <option value="PROCUREMENT">PROCUREMENT</option>
                    <option value="INTEGRATED HOSPITAL OPERATIONS & MANAGEMENT PROGRAM">INTEGRATED HOSPITAL OPERATIONS &amp; MANAGEMENT PROGRAM</option>
                    <option value="SECURITY">SECURITY</option>
                    <option value="MAINTENANCE">MAINTENANCE</option>
                    <option value="TRANSPORTATION">TRANSPORTATION</option>
                    <option value="DISPATCH">DISPATCH</option>
                    <option value="HELP DESK">HELP DESK</option>
                    <option value="RADIOLOGY">RADIOLOGY</option>
                    <option value="LABORATORY/BLOOD BANK">LABORATORY/BLOOD BANK</option>
                    <option value="DENTAL CLINIC">DENTAL CLINIC</option>
                    <option value="DIALYSIS CENTER">DIALYSIS CENTER</option>
                    <option value="NUTRITION AND DIETETICS">NUTRITION AND DIETETICS</option>
                    <option value="HOUSEKEEPING">HOUSEKEEPING</option>
                    <option value="MALASAKIT/SOCIAL WORKER">MALASAKIT/SOCIAL WORKER</option>
                    <option value="PHILHEALTH (PHILHEALTH 1)">PHILHEALTH (PHILHEALTH 1)</option>
                    <option value="PHILHEALTH (PHILHEALTH 2)">PHILHEALTH (PHILHEALTH 2)</option>
                    <option value="PHILHEALTH (PHILHEALTH 3)">PHILHEALTH (PHILHEALTH 3)</option>
                    <option value="PHILHEALTH (PHILHEALTH 4)">PHILHEALTH (PHILHEALTH 4)</option>
                    <option value="PHILHEALTH (PHILHEALTH E-KONSULTA)">PHILHEALTH (PHILHEALTH E-KONSULTA)</option>
                </select>
            </div>

            {{-- Position/Designation --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Position / Designation <span class="text-red-500">*</span></label>
                <input type="text" name="position" required
                    class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter position or designation" />
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