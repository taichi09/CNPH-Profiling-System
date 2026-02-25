<form method="POST" action="{{ route('employees.create.step.post', 4) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Civil Service Eligibility</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding civil service eligibility.</p>
        </div>

        <!-- Body -->
        <div class="w-full">
            <!-- Table Header -->
            <div class="grid grid-cols-12 gap-x-6 mb-2 text-xs font-bold text-gray-700 uppercase tracking-wide">
                <div class="col-span-4">Career Service/RA 1080 (Board/Bar) Under Special Laws/Category II/IV Eligibility and Eligibilities for Uniformed Personnel</div>
                <div class="col-span-1 text-center">Rating</div>
                <div class="col-span-2 text-center">Date of Examination</div>
                <div class="col-span-2 text-center">Place of Examination</div>
                <div class="col-span-2 text-center">License</div>
                <div class="col-span-1"></div>
            </div>

            <!-- Sub-header for License columns -->
            <div class="grid grid-cols-12 gap-x-6 mb-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">
                <div class="col-span-4"></div>
                <div class="col-span-1"></div>
                <div class="col-span-2"></div>
                <div class="col-span-2"></div>
                <div class="col-span-1 text-center">License No.</div>
                <div class="col-span-1 text-center">Valid Until</div>
                <div class="col-span-1"></div>
            </div>

            <!-- Rows -->
            <div id="eligibility-list" class="space-y-3">
                <div class="grid grid-cols-12 gap-x-6 items-center eligibility-row">
                <div class="col-span-4">
                    <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                    <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm text-center" />
                </div>
                <div class="col-span-2">
                    <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-2">
                    <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                    <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                    <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1 flex justify-center">
                    <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
                </div>
                </div>
            </div>

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
            function addRow() {
            const list = document.getElementById('eligibility-list');
            const row = document.createElement('div');
            row.className = 'grid grid-cols-12 gap-x-6 items-center eligibility-row';
            row.innerHTML = `
                <div class="col-span-4">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm text-center" />
                </div>
                <div class="col-span-2">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-2">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </div>
                <div class="col-span-1 flex justify-center">
                <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
                </div>
            `;
            list.appendChild(row);
            }

            function removeRow(btn) {
            const rows = document.querySelectorAll('.eligibility-row');
            if (rows.length > 1) {
                btn.closest('.eligibility-row').remove();
            }
            }
        </script>

        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 3) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>