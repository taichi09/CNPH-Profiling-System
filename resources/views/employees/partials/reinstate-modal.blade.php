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
                <div class="relative">
                    <input
                        type="text"
                        id="departmentInput"
                        name="department"
                        required
                        autocomplete="off"
                        placeholder="Search or type a department…"
                        class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <ul id="departmentDropdown"
                        class="hidden absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded shadow-lg max-h-52 overflow-y-auto text-sm">
                    </ul>
                </div>
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

<script>
(function () {
    const DEPARTMENTS = [
        'MEDICAL', 'NURSES', 'NURSING ATTENDANT', 'MIDWIVES', 'ADMINISTRATIVE',
        'TECHNICAL', 'ANCILLARY', 'COH/COC', 'HUMAN RESOURCE MANAGEMENT OFFICE',
        'QUALITY ASSURANCE UNIT', 'BUDGET/FINANCE', 'CASH OPERATION',
        'HIMS OPD RECORDS', 'OPD RECORDS', 'SUPPLY UNIT', 'PROCUREMENT',
        'INTEGRATED HOSPITAL OPERATIONS & MANAGEMENT PROGRAM', 'SECURITY',
        'MAINTENANCE', 'TRANSPORTATION', 'DISPATCH', 'HELP DESK', 'RADIOLOGY',
        'LABORATORY/BLOOD BANK', 'DENTAL CLINIC', 'DIALYSIS CENTER',
        'NUTRITION AND DIETETICS', 'HOUSEKEEPING', 'MALASAKIT/SOCIAL WORKER',
        'PHILHEALTH (PHILHEALTH 1)', 'PHILHEALTH (PHILHEALTH 2)',
        'PHILHEALTH (PHILHEALTH 3)', 'PHILHEALTH (PHILHEALTH 4)',
        'PHILHEALTH (PHILHEALTH E-KONSULTA)'
    ];

    const input = document.getElementById('departmentInput');
    const dropdown = document.getElementById('departmentDropdown');

    function renderDropdown(filter) {
        const q = filter.toLowerCase().trim();
        const matches = q
            ? DEPARTMENTS.filter(d => d.toLowerCase().includes(q))
            : DEPARTMENTS;

        dropdown.innerHTML = '';

        if (matches.length === 0) {
            const li = document.createElement('li');
            li.className = 'px-3 py-2 text-gray-400 italic';
            li.textContent = 'No match — your input will be used as-is';
            dropdown.appendChild(li);
        } else {
            matches.forEach(dept => {
                const li = document.createElement('li');
                li.className = 'px-3 py-2 cursor-pointer hover:bg-blue-50 hover:text-blue-700 text-gray-700';
                li.textContent = dept;
                li.addEventListener('mousedown', function (e) {
                    e.preventDefault();
                    input.value = dept;
                    closeDropdown();
                });
                dropdown.appendChild(li);
            });
        }

        dropdown.classList.remove('hidden');
    }

    function closeDropdown() {
        dropdown.classList.add('hidden');
    }

    input.addEventListener('focus', () => renderDropdown(input.value));
    input.addEventListener('input', () => renderDropdown(input.value));
    input.addEventListener('blur', closeDropdown);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeDropdown();
    });
})();
</script>