<form method="POST" action="{{ route('employees.create.step.post', 7) }}">
    @csrf
    
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Learning and Development (L&amp;D) Interventions/<br>Training Programs Attended</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding training programs attended.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">

                <!-- Title of L&D -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>30. Title of Learning and Development Interventions/Training Programs</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>

                <!-- Inclusive Dates of Attendance -->
                <div class="w-36 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        Inclusive Dates of Attendance
                        <span class="normal-case font-normal">(dd/mm/yyyy)</span>
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>

                <!-- Number of Hours -->
                <div class="w-20 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Number</span>
                    <span>of Hours</span>
                </div>

                <!-- Type of L&D -->
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Type of L&D</span>
                    <span class="normal-case font-normal">(Managerial/</span>
                    <span class="normal-case font-normal">Supervisory/</span>
                    <span class="normal-case font-normal">Technical/etc)</span>
                </div>

                <!-- Conducted/Sponsored By -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>Conducted/ Sponsored By</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>

            </div>

            <!-- Input Rows -->
            <div id="ld-list" class="flex flex-col">
                @php $lds = old('ld', session('employee_step_7.ld', [[]])); @endphp
                @foreach($lds as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <input type="text" name="ld[{{ $i }}][title]"
                        value="{{ $row['title'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="ld[{{ $i }}][from]"
                        value="{{ $row['from'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="ld[{{ $i }}][to]"
                        value="{{ $row['to'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="ld[{{ $i }}][hours]"
                        value="{{ $row['hours'] ?? '' }}"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="ld[{{ $i }}][type]"
                        value="{{ $row['type'] ?? '' }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="ld[{{ $i }}][conducted_by]"
                        value="{{ $row['conducted_by'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                </div>
                @endforeach
            </div>

            <!-- Add Row Button -->
            <div class="px-2 py-1.5 border-t border-gray-300">
                <button type="button" onclick="addLD()"
                    class="text-xs text-green-700 hover:underline">+ Add Row</button>
            </div>
        </div>

        <script>
            let ldIndex = {{ count(old('ld', session('employee_step_7.ld', [[]]))) }};
            function addLD() {
                const list = document.getElementById('ld-list');
                const row = document.createElement('div');
                row.className = 'flex items-stretch border-b border-gray-300';
                row.innerHTML = `
                    <input type="text" name="ld[${ldIndex}][title]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="ld[${ldIndex}][from]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="ld[${ldIndex}][to]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="ld[${ldIndex}][hours]"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="ld[${ldIndex}][type]"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="ld[${ldIndex}][conducted_by]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                `;
                list.appendChild(row);
                ldIndex++;
            }
        </script>

        <!-- Navigation -->
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