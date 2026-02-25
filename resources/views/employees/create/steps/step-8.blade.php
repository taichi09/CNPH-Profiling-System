<form method="POST" action="{{ route('employees.create.step.post', 8) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Department &amp; Job Status</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Assign employee to Department and select job status.</p>
        </div>

        <!-- Body -->
        <div class="flex flex-col items-center gap-8">
            <!-- Departments -->
            <div class="w-48 text-center">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Departments</label>
                <p class="text-xs text-gray-400 mb-2">Please select Department</p>
                <select class="w-full border border-gray-300 focus:border-green-700 outline-none py-2 px-3 text-sm rounded-sm bg-white">
                    <option value="" disabled selected></option>
                    <option>Human Resources</option>
                    <option>Finance</option>
                    <option>Operations</option>
                    <option>Information Technology</option>
                    <option>Legal</option>
                </select>
            </div>

            <!-- Job Status -->
            <div class="w-48 text-center">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Job Status</label>
                <p class="text-xs text-gray-400 mb-2">Please select Job Status</p>
                <select class="w-full border border-green-700 focus:border-green-700 outline-none py-2 px-3 text-sm rounded-sm bg-white">
                <option value="" disabled selected></option>
                <option>Regular</option>
                <option>Probationary</option>
                <option>Contractual</option>
                <option>Part-time</option>
                </select>
            </div>

            <!-- Dashed divider with asterisk -->
            <div class="flex items-center w-48 gap-2 my-2">   </div>
        </div>

        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 7) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Submit
            </button>
        </div>
    </div>
</form>