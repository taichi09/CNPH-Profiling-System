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

            <!-- Elementary Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                    Elementary
                </div>
                <input type="text" name="elem_school" value="{{ old('elem_school', session('employee_step_3.elem_school')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="elem_course" value="{{ old('elem_course', session('employee_step_3.elem_course')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="elem_from" value="{{ old('elem_from', session('employee_step_3.elem_from')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="elem_to" value="{{ old('elem_to', session('employee_step_3.elem_to')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="elem_units" value="{{ old('elem_units', session('employee_step_3.elem_units')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="elem_year_grad" value="{{ old('elem_year_grad', session('employee_step_3.elem_year_grad')) }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="elem_honors" value="{{ old('elem_honors', session('employee_step_3.elem_honors')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <!-- Secondary Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                    Secondary
                </div>
                <input type="text" name="sec_school" value="{{ old('sec_school', session('employee_step_3.sec_school')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="sec_course" value="{{ old('sec_course', session('employee_step_3.sec_course')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="sec_from" value="{{ old('sec_from', session('employee_step_3.sec_from')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="sec_to" value="{{ old('sec_to', session('employee_step_3.sec_to')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="sec_units" value="{{ old('sec_units', session('employee_step_3.sec_units')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="sec_year_grad" value="{{ old('sec_year_grad', session('employee_step_3.sec_year_grad')) }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="sec_honors" value="{{ old('sec_honors', session('employee_step_3.sec_honors')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <!-- Vocational/Trade Course Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center leading-tight">
                    Vocational/<br>Trade Course
                </div>
                <input type="text" name="voc_school" value="{{ old('voc_school', session('employee_step_3.voc_school')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="voc_course" value="{{ old('voc_course', session('employee_step_3.voc_course')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="voc_from" value="{{ old('voc_from', session('employee_step_3.voc_from')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="voc_to" value="{{ old('voc_to', session('employee_step_3.voc_to')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="voc_units" value="{{ old('voc_units', session('employee_step_3.voc_units')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="voc_year_grad" value="{{ old('voc_year_grad', session('employee_step_3.voc_year_grad')) }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="voc_honors" value="{{ old('voc_honors', session('employee_step_3.voc_honors')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <!-- College Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                    College
                </div>
                <input type="text" name="col_school" value="{{ old('col_school', session('employee_step_3.col_school')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="col_course" value="{{ old('col_course', session('employee_step_3.col_course')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="col_from" value="{{ old('col_from', session('employee_step_3.col_from')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="col_to" value="{{ old('col_to', session('employee_step_3.col_to')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="col_units" value="{{ old('col_units', session('employee_step_3.col_units')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="col_year_grad" value="{{ old('col_year_grad', session('employee_step_3.col_year_grad')) }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="col_honors" value="{{ old('col_honors', session('employee_step_3.col_honors')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <!-- Graduate Studies Row -->
            <div class="flex items-stretch">
                <div class="w-32 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center">
                    Graduate Studies
                </div>
                <input type="text" name="grad_school" value="{{ old('grad_school', session('employee_step_3.grad_school')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="grad_course" value="{{ old('grad_course', session('employee_step_3.grad_course')) }}" class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="grad_from" value="{{ old('grad_from', session('employee_step_3.grad_from')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="grad_to" value="{{ old('grad_to', session('employee_step_3.grad_to')) }}" class="w-14 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="grad_units" value="{{ old('grad_units', session('employee_step_3.grad_units')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="grad_year_grad" value="{{ old('grad_year_grad', session('employee_step_3.grad_year_grad')) }}" class="w-20 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                <input type="text" name="grad_honors" value="{{ old('grad_honors', session('employee_step_3.grad_honors')) }}" class="w-28 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
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
</form>