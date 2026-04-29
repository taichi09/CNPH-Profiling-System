<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->employee_id, 'step' => 3]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Educational Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update educational background details.</p>
        </div>

        @php
            $educations = $employee->educations->groupBy(fn($e) => ucwords(strtolower($e->level)));
            $levelMap = [
                'elem' => 'Elementary',
                'sec' => 'Secondary',
                'voc' => 'Vocational/Trade Course',
                'col' => 'College',
                'grad' => 'Graduate Studies',
            ];
        @endphp

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">
                    26. Level
                </div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Name of School</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Basic Education/Degree/Course</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>
                <div class="w-28 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        Period of Attendance
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Highest Level/</span>
                    <span>Units Earned</span>
                    <span class="normal-case font-normal">(if not graduated)</span>
                </div>
                <div class="w-20 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Year</span>
                    <span>Graduated</span>
                </div>
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>Scholarship/</span>
                    <span>Academic</span>
                    <span>Honors Received</span>
                </div>
            </div>

            @foreach($levelMap as $prefix => $levelLabel)
            @php
                $rows = $educations->get($levelLabel, collect([null]));
            @endphp

            <div id="{{ $prefix }}-list">
                @foreach($rows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center leading-tight">
                        {{ $i === 0 ? $levelLabel : '' }}
                    </div>
                    <input type="text" name="{{ $prefix }}[{{ $i }}][school]"
                        value="{{ old("$prefix.$i.school", $row->name_of_school ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][course]"
                        value="{{ old("$prefix.$i.course", $row->basic_education ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][from]"
                        value="{{ old("$prefix.$i.from", $row->period_of_attendance_from ?? '') }}"
                        class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][to]"
                        value="{{ old("$prefix.$i.to", $row->period_of_attendance_to ?? '') }}"
                        class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][units]"
                        value="{{ old("$prefix.$i.units", $row->highest_level ?? '') }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][year_grad]"
                        value="{{ old("$prefix.$i.year_grad", $row->year_graduated ?? '') }}"
                        class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="{{ $prefix }}[{{ $i }}][honors]"
                        value="{{ old("$prefix.$i.honors", $row->scholarship_academic_honors_recieved ?? '') }}"
                        class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex border-b border-gray-300">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('{{ $prefix }}', '{{ $levelLabel }}')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.edit.step', ['id' => $employee->employee_id, 'step' => 2]) }}"
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
        const eduIndexes = {
            elem: {{ $educations->get('Elementary', collect())->count() ?: 1 }},
            sec: {{ $educations->get('Secondary', collect())->count() ?: 1 }},
            voc: {{ $educations->get('Vocational/Trade Course', collect())->count() ?: 1 }},
            col: {{ $educations->get('College', collect())->count() ?: 1 }},
            grad: {{ $educations->get('Graduate Studies', collect())->count() ?: 1 }},
        };

        function addEduRow(prefix, label) {
            const list = document.getElementById(`${prefix}-list`);
            const i = eduIndexes[prefix];
            const row = document.createElement('div');
            row.className = 'flex items-stretch border-b border-gray-300';
            row.innerHTML = `
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center"></div>
                <input type="text" name="${prefix}[${i}][school]" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][course]" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][from]" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][to]" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][units]" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][year_grad]" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="${prefix}[${i}][honors]" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm text-center">
            `;
            list.appendChild(row);
            eduIndexes[prefix]++;
        }
    </script>
</form>