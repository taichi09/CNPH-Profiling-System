<form method="POST" action="{{ route('employees.create.step.post', 3) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Educational Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding educational background.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">

                <!-- Level -->
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">
                    26. Level
                </div>

                <!-- Name of School -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Name of School</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>

                <!-- Basic Education/Degree/Course -->
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Basic Education/Degree/Course</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>

                <!-- Period of Attendance -->
                <div class="w-28 shrink-0 border-r border-gray-300 flex flex-col">
                    <div class="px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-b border-gray-300 text-center">
                        Period of Attendance
                    </div>
                    <div class="flex flex-1">
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-center">From</div>
                        <div class="flex-1 px-2 py-1 text-[10px] text-gray-600 uppercase font-semibold tracking-wide text-center">To</div>
                    </div>
                </div>

                <!-- Highest Level/Units Earned -->
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Highest Level/</span>
                    <span>Units Earned</span>
                    <span class="normal-case font-normal">(if not graduated)</span>
                </div>

                <!-- Year Graduated -->
                <div class="w-20 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>Year</span>
                    <span>Graduated</span>
                </div>

                <!-- Scholarship/Academic Honors Received -->
                <div class="w-28 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>Scholarship/</span>
                    <span>Academic</span>
                    <span>Honors Received</span>
                </div>

            </div>

            <!-- Elementary Rows -->
            <div id="elem-list">
                @php $elemRows = old('elem', session('employee_step_3.elem', [[]])); @endphp
                @foreach($elemRows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                        {{ $i === 0 ? 'Elementary' : '' }}
                    </div>
                    <input type="text" name="elem[{{ $i }}][school]" value="{{ $row['school'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][course]" value="{{ $row['course'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][from]" value="{{ $row['from'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][to]" value="{{ $row['to'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][units]" value="{{ $row['units'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][year_grad]" value="{{ $row['year_grad'] ?? '' }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="elem[{{ $i }}][honors]" value="{{ $row['honors'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex border-b border-gray-300">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('elem', 'Elementary')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>

            <!-- Secondary Rows -->
            <div id="sec-list">
                @php $secRows = old('sec', session('employee_step_3.sec', [[]])); @endphp
                @foreach($secRows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                        {{ $i === 0 ? 'Secondary' : '' }}
                    </div>
                    <input type="text" name="sec[{{ $i }}][school]" value="{{ $row['school'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][course]" value="{{ $row['course'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][from]" value="{{ $row['from'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][to]" value="{{ $row['to'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][units]" value="{{ $row['units'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][year_grad]" value="{{ $row['year_grad'] ?? '' }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="sec[{{ $i }}][honors]" value="{{ $row['honors'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex border-b border-gray-300">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('sec', 'Secondary')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>

            <!-- Vocational Rows -->
            <div id="voc-list">
                @php $vocRows = old('voc', session('employee_step_3.voc', [[]])); @endphp
                @foreach($vocRows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center leading-tight">
                        {{ $i === 0 ? 'Vocational/ Trade Course' : '' }}
                    </div>
                    <input type="text" name="voc[{{ $i }}][school]" value="{{ $row['school'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][course]" value="{{ $row['course'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][from]" value="{{ $row['from'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][to]" value="{{ $row['to'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][units]" value="{{ $row['units'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][year_grad]" value="{{ $row['year_grad'] ?? '' }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="voc[{{ $i }}][honors]" value="{{ $row['honors'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex border-b border-gray-300">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('voc', 'Vocational/ Trade Course')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>

            <!-- College Rows -->
            <div id="col-list">
                @php $colRows = old('col', session('employee_step_3.col', [[]])); @endphp
                @foreach($colRows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                        {{ $i === 0 ? 'College' : '' }}
                    </div>
                    <input type="text" name="col[{{ $i }}][school]" value="{{ $row['school'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][course]" value="{{ $row['course'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][from]" value="{{ $row['from'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][to]" value="{{ $row['to'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][units]" value="{{ $row['units'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][year_grad]" value="{{ $row['year_grad'] ?? '' }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="col[{{ $i }}][honors]" value="{{ $row['honors'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex border-b border-gray-300">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('col', 'College')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>

            <!-- Graduate Studies Rows -->
            <div id="grad-list">
                @php $gradRows = old('grad', session('employee_step_3.grad', [[]])); @endphp
                @foreach($gradRows as $i => $row)
                <div class="flex items-stretch border-b border-gray-300">
                    <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                        {{ $i === 0 ? 'Graduate Studies' : '' }}
                    </div>
                    <input type="text" name="grad[{{ $i }}][school]" value="{{ $row['school'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][course]" value="{{ $row['course'] ?? '' }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][from]" value="{{ $row['from'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][to]" value="{{ $row['to'] ?? '' }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][units]" value="{{ $row['units'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][year_grad]" value="{{ $row['year_grad'] ?? '' }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                    <input type="text" name="grad[{{ $i }}][honors]" value="{{ $row['honors'] ?? '' }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                @endforeach
            </div>
            <div class="flex">
                <div class="w-32 shrink-0 border-r border-gray-300"></div>
                <div class="px-2 py-1">
                    <button type="button" onclick="addEduRow('grad', 'Graduate Studies')"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>
        
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 2) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>

    <script>
        const eduIndexes = {
            elem: {{ count(old('elem', session('employee_step_3.elem', [[]]))) }},
            sec: {{ count(old('sec', session('employee_step_3.sec', [[]]))) }},
            voc: {{ count(old('voc', session('employee_step_3.voc', [[]]))) }},
            col: {{ count(old('col', session('employee_step_3.col', [[]]))) }},
            grad: {{ count(old('grad', session('employee_step_3.grad', [[]]))) }},
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
                <input type="text" name="${prefix}[${i}][honors]" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
            `;
            list.appendChild(row);
            eduIndexes[prefix]++;
        }
    </script>
</form>