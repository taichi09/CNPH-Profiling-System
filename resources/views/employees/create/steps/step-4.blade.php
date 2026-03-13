<form method="POST" action="{{ route('employees.create.step.post', 4) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Civil Service Eligibility</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding civil service eligibility.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">

                <!-- Eligibility -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col justify-center text-center">
                    <span>27. CES/CSEE/Career Service/RA 1080 (Board/Bar)/Under Special Laws/Category II/IV Eligibility</span>
                    <span>and Eligibilities for Uniformed Personnel</span>
                </div>

                <!-- Rating -->
                <div class="w-24 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Rating</span>
                    <span class="normal-case font-normal">(if Applicable)</span>
                </div>

                <!-- Date of Examination -->
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Date of</span>
                    <span>Examination /</span>
                    <span>Conferment</span>
                </div>

                <!-- Place of Examination -->
                <div class="w-36 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Place of Examination /</span>
                    <span>Conferment</span>
                </div>

                <!-- License -->
                <div class="w-48 shrink-0 border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        License <span class="normal-case font-normal">(if applicable)</span>
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">Number</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">Valid Until</div>
                    </div>
                </div>

            </div>

            <!-- Input Rows -->
            <div id="eligibility-list" class="flex flex-col">
                @php $eligibilities = old('eligibility', session('employee_step_4.eligibility', [[]])); @endphp
                @foreach($eligibilities as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <input type="text" name="eligibility[{{ $i }}][name]"
                        value="{{ $row['name'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="eligibility[{{ $i }}][rating]"
                        value="{{ $row['rating'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[{{ $i }}][date]"
                        value="{{ $row['date'] ?? '' }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[{{ $i }}][place]"
                        value="{{ $row['place'] ?? '' }}"
                        class="w-36 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="eligibility[{{ $i }}][license_no]"
                        value="{{ $row['license_no'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[{{ $i }}][license_valid]"
                        value="{{ $row['license_valid'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
                </div>
                @endforeach
            </div>

            <!-- Add Row Button -->
            <div class="px-2 py-1.5 border-t border-gray-300">
                <button type="button" onclick="addEligibility()"
                    class="text-xs text-green-700 hover:underline">+ Add Row</button>
            </div>
        </div>

        <script>
            let eligibilityIndex = {{ count(old('eligibility', session('employee_step_4.eligibility', [[]]))) }};
            function addEligibility() {
                const list = document.getElementById('eligibility-list');
                const row = document.createElement('div');
                row.className = 'flex items-stretch border-b border-gray-300';
                row.innerHTML = `
                    <input type="text" name="eligibility[${eligibilityIndex}][name]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="eligibility[${eligibilityIndex}][rating]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[${eligibilityIndex}][date]"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[${eligibilityIndex}][place]"
                        class="w-36 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="eligibility[${eligibilityIndex}][license_no]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="eligibility[${eligibilityIndex}][license_valid]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
                `;
                list.appendChild(row);
                eligibilityIndex++;
            }
        </script>

        <!-- Navigation -->
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