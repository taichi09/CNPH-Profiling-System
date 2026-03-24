<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->id, 'step' => 3]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Educational Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update educational background details.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">Level</div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">Name of School</div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">Basic Education / Degree / Course</div>
                <div class="w-28 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">Period of Attendance</div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>
                <div class="w-24 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">Highest Level / Units Earned</div>
                <div class="w-20 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">Year Graduated</div>
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex items-center justify-center text-center">Scholarship / Academic Honors</div>
            </div>

            <!-- Input Rows -->
            <div id="education-list" class="flex flex-col">
                @php
                    $educations = $employee->educations->count()
                        ? $employee->educations
                        : collect([null]);
                @endphp
                @foreach($educations as $i => $edu)
                <div class="flex items-stretch border-b border-gray-300">
                    <input type="text" name="education[{{ $i }}][level]"
                        value="{{ old("education.$i.level", $edu->level ?? '') }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="education[{{ $i }}][name_of_school]"
                        value="{{ old("education.$i.name_of_school", $edu->name_of_school ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="education[{{ $i }}][basic_education]"
                        value="{{ old("education.$i.basic_education", $edu->basic_education ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="education[{{ $i }}][period_of_attendance_from]"
                        value="{{ old("education.$i.period_of_attendance_from", $edu->period_of_attendance_from ?? '') }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="education[{{ $i }}][period_of_attendance_to]"
                        value="{{ old("education.$i.period_of_attendance_to", $edu->period_of_attendance_to ?? '') }}"
                        class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                    <input type="text" name="education[{{ $i }}][highest_level]"
                        value="{{ old("education.$i.highest_level", $edu->highest_level ?? '') }}"
                        class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="education[{{ $i }}][year_graduated]"
                        value="{{ old("education.$i.year_graduated", $edu->year_graduated ?? '') }}"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="education[{{ $i }}][scholarship_academic_honors_recieved]"
                        value="{{ old("education.$i.scholarship_academic_honors_recieved", $edu->scholarship_academic_honors_recieved ?? '') }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
                </div>
                @endforeach
            </div>

            <!-- Add Row Button -->
            <div class="px-2 py-1.5 border-t border-gray-300">
                <button type="button" onclick="addEducation()"
                    class="text-xs text-green-700 hover:underline">+ Add Row</button>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.edit.step', ['id' => $employee->id, 'step' => 2]) }}"
                class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit"
                class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>

    <script>
        let educationIndex = {{ $employee->educations->count() ?: 1 }};
        function addEducation() {
            const list = document.getElementById('education-list');
            const row = document.createElement('div');
            row.className = 'flex items-stretch border-b border-gray-300';
            row.innerHTML = `
                <input type="text" name="education[${educationIndex}][level]"
                    class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="education[${educationIndex}][name_of_school]"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="education[${educationIndex}][basic_education]"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="education[${educationIndex}][period_of_attendance_from]"
                    class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                <input type="text" name="education[${educationIndex}][period_of_attendance_to]"
                    class="shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center" style="width: 4.5rem;">
                <input type="text" name="education[${educationIndex}][highest_level]"
                    class="w-24 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="education[${educationIndex}][year_graduated]"
                    class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="education[${educationIndex}][scholarship_academic_honors_recieved]"
                    class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
            `;
            list.appendChild(row);
            educationIndex++;
        }
    </script>
</form>