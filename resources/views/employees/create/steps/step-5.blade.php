<form method="POST" action="{{ route('employees.create.step.post', 5) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Work Experience</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding past work experience.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">

                <!-- Inclusive Dates -->
                <div class="w-36 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        28. Inclusive Dates
                        <span class="normal-case font-normal">(dd/mm/yyyy)</span>
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>

                <!-- Position Title -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Position Title</span>
                    <span class="normal-case font-normal">(Write in full/Do not abbreviate)</span>
                </div>

                <!-- Department/Agency/Office/Company -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Department / Agency / Office / Company</span>
                    <span class="normal-case font-normal">(Write in full/Do not abbreviate)</span>
                </div>

                <!-- Monthly Salary -->
                <div class="w-24 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Monthly</span>
                    <span>Salary</span>
                </div>

                <!-- Salary Grade -->
                <div class="w-20 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Salary</span>
                    <span>Grade</span>
                </div>

                <!-- Status of Appointment -->
                <div class="w-24 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Status of</span>
                    <span>Appointment</span>
                </div>

                <!-- Gov't Service -->
                <div class="w-16 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>Gov't</span>
                    <span>Service</span>
                    <span>(Y/N)</span>
                </div>

            </div>

            <!-- Input Rows -->
            <div id="work-list" class="flex flex-col">
                @php $works = old('work', session('employee_step_5.work', [[]])); @endphp
                @foreach($works as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <input type="text" name="work[{{ $i }}][from]"
                        value="{{ $row['from'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="work[{{ $i }}][to]"
                        value="{{ $row['to'] ?? '' }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="work[{{ $i }}][position]"
                        value="{{ $row['position'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[{{ $i }}][department]"
                        value="{{ $row['department'] ?? '' }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[{{ $i }}][monthly_salary]"
                        value="{{ $row['monthly_salary'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[{{ $i }}][salary_grade]"
                        value="{{ $row['salary_grade'] ?? '' }}"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[{{ $i }}][status]"
                        value="{{ $row['status'] ?? '' }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[{{ $i }}][govt_service]"
                        value="{{ $row['govt_service'] ?? '' }}"
                        class="w-16 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>

            <!-- Add Row Button -->
            <div class="px-2 py-1.5 border-t border-gray-300">
                <button type="button" onclick="addWork()"
                    class="text-xs text-green-700 hover:underline">+ Add Row</button>
            </div>

        </div>

        <script>
            let workIndex = {{ count(old('work', session('employee_step_5.work', [[]]))) }};
            function addWork() {
                const list = document.getElementById('work-list');
                const row = document.createElement('div');
                row.className = 'flex items-stretch border-b border-gray-300';
                row.innerHTML = `
                    <input type="text" name="work[${workIndex}][from]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="work[${workIndex}][to]"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="work[${workIndex}][position]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="work[${workIndex}][department]"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                    <input type="text" name="work[${workIndex}][monthly_salary]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[${workIndex}][salary_grade]"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[${workIndex}][status]"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="work[${workIndex}][govt_service]"
                        class="w-16 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
                `;
                list.appendChild(row);
                workIndex++;
            }
        </script>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 4) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>