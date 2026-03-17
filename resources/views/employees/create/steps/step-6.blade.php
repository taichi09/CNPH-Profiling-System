<form method="POST" action="{{ route('employees.create.step.post', 6) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Voluntary Work or Involvement in Civic/Non-Government/People/Voluntary Organizations</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding voluntary works.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">

                <!-- Name & Address of Organization -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>29. Name & Address of Organization</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>

                <!-- Inclusive Dates -->
                <div class="w-36 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        Inclusive Dates
                        <span class="normal-case font-normal">(dd/mm/yyyy)</span>
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>

                <!-- Number of Hours -->
                <div class="w-24 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Number of Hours</span>
                </div>

                <!-- Position/Nature of Work -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>Position / Nature of Work</span>
                </div>

            </div>

            <!-- Input Rows -->
            <div id="voluntary-list" class="flex flex-col">
                @php $voluntaries = old('voluntary', session('employee_step_6.voluntary', [[]])); @endphp
                @foreach($voluntaries as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <input type="text" name="voluntary[{{ $i }}][organization]"
                        value="{{ $row['organization'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voluntary[{{ $i }}][from]"
                        value="{{ $row['from'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="voluntary[{{ $i }}][to]"
                        value="{{ $row['to'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="voluntary[{{ $i }}][hours]"
                        value="{{ $row['hours'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voluntary[{{ $i }}][position]"
                        value="{{ $row['position'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>

            <!-- Add Row Button -->
            <div class="px-2 py-1.5 border-t border-gray-300">
                <button type="button" onclick="addVoluntary()"
                    class="text-xs text-green-700 hover:underline">+ Add Row</button>
            </div>
        </div>      
        
        <script>
            let voluntaryIndex = {{ count(old('voluntary', session('employee_step_6.voluntary', [[]]))) }};
            function addVoluntary() {
                const list = document.getElementById('voluntary-list');
                const row = document.createElement('div');
                row.className = 'flex items-stretch border-b border-gray-300';
                row.innerHTML = `
                    <input type="text" name="voluntary[${voluntaryIndex}][organization]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="voluntary[${voluntaryIndex}][from]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="voluntary[${voluntaryIndex}][to]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="voluntary[${voluntaryIndex}][hours]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voluntary[${voluntaryIndex}][position]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                `;
                list.appendChild(row);
                voluntaryIndex++;
            }
        </script>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 5) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>