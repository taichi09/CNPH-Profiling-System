<form method="POST" action="{{ route('employees.create.step.post', 7) }}">
    @csrf
    
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Learning and Development (L&amp;D) Interventions/<br>Training Programs Attended</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding training programs attended.</p>
        </div>

        <!-- Body -->
        <div class="w-full overflow-x-auto">
            <table class="w-full table-fixed text-sm">
                <colgroup>
                    <col style="width: 28%">  <!-- Title -->
                    <col style="width: 10%">  <!-- From -->
                    <col style="width: 2%">   <!-- Dash -->
                    <col style="width: 10%">  <!-- To -->
                    <col style="width: 14%">  <!-- Number of Hours -->
                    <col style="width: 18%">  <!-- Type of L&D -->
                    <col style="width: 14%">  <!-- Conducted/Sponsored By -->
                    <col style="width: 4%">   <!-- Remove -->
                </colgroup>
                <thead>
                    <tr class="text-xs font-bold text-gray-700 uppercase tracking-wide align-top">
                        <td class="pb-1 pr-6">
                            Title of Learning and Development Interventions/<br>Training Programs
                            <div class="font-normal normal-case text-gray-500">(Write in full)</div>
                        </td>
                        <td colspan="3" class="pb-1 pr-6">
                            Inclusive Dates of Attendance
                            <div class="font-normal normal-case text-gray-500">(dd/mm/yyyy)</div>
                        </td>
                        <td class="pb-1 pr-6">
                            Number of Hours
                        </td>
                        <td class="pb-1 pr-6">
                            Type of L&amp;D<br>
                            <span class="font-normal normal-case">(Managerial/<br>Supervisory/<br>Technical/etc)</span>
                        </td>
                        <td class="pb-1 pr-6">
                            Conducted/<br>Sponsored By
                            <div class="font-normal normal-case text-gray-500">(Write in full)</div>
                        </td>
                    </tr>
                    <tr class="text-xs text-gray-500">
                        <td class="pb-2"></td>
                        <td class="pb-2">From</td>
                        <td></td>
                        <td class="pb-2">To</td>
                        <td colspan="4"></td>
                    </tr>
                </thead>
                <tbody id="ld-list">
                    <tr class="ld-row">
                        <td class="pr-6 pb-3">
                            <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pb-3 pr-1">
                            <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pb-3 text-center text-gray-400 font-bold">—</td>
                        <td class="pb-3 pr-6 pl-1">
                            <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pr-6 pb-3">
                            <input type="number" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pr-6 pb-3">
                            <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pr-6 pb-3">
                            <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                        </td>
                        <td class="pb-3 text-center">
                            <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Add Another Button -->
            <div class="flex justify-center mt-6">
                <button
                type="button"
                onclick="addRow()"
                class="border border-gray-400 text-gray-600 hover:border-green-700 hover:text-green-700 px-6 py-2 rounded-full text-sm font-semibold tracking-wide transition-colors duration-200">
                + Add another
                </button>
            </div>
        </div>

        <script>
            function getRowHTML() {
            return `
                <td class="pr-6 pb-3">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pb-3 pr-1">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pb-3 text-center text-gray-400 font-bold">—</td>
                <td class="pb-3 pr-6 pl-1">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                <input type="number" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pb-3 text-center">
                <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
                </td>
            `;
            }

            function addRow() {
            const tbody = document.getElementById('ld-list');
            const row = document.createElement('tr');
            row.className = 'ld-row';
            row.innerHTML = getRowHTML();
            tbody.appendChild(row);
            }

            function removeRow(btn) {
            const rows = document.querySelectorAll('.ld-row');
            if (rows.length > 1) {
                btn.closest('.ld-row').remove();
            }
            }
        </script>

        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 6) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>