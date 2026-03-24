<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->id, 'step' => 1]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Personal Information</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update personal information details.</p>
        </div>

        {{-- Row 1 --}}
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Surname</label>
                <input type="text" name="surname" value="{{ old('surname', $employee->surname) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Extension</label>
                <input type="text" name="extension" value="{{ old('extension', $employee->extension) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 2 --}}
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Date of Birth</label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Place of Birth</label>
                <input type="text" name="place_of_birth" value="{{ old('place_of_birth', $employee->place_of_birth) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Sex at Birth</label>
                <select name="sex_at_birth" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                    <option value="">-- Select --</option>
                    <option {{ old('sex_at_birth', $employee->sex_at_birth) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option {{ old('sex_at_birth', $employee->sex_at_birth) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Civil Status</label>
                <select name="civil_status" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                    <option value="">-- Select --</option>
                    <option {{ old('civil_status', $employee->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                    <option {{ old('civil_status', $employee->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                    <option {{ old('civil_status', $employee->civil_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    <option {{ old('civil_status', $employee->civil_status) == 'Separated' ? 'selected' : '' }}>Separated</option>
                    <option {{ old('civil_status', $employee->civil_status) == 'Annulled' ? 'selected' : '' }}>Annulled</option>
                </select>
            </div>
        </div>

        {{-- Row 3 --}}
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Height (m)</label>
                <input type="text" name="height" value="{{ old('height', $employee->height) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Weight (kg)</label>
                <input type="text" name="weight" value="{{ old('weight', $employee->weight) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Blood Type</label>
                <select name="blood_type" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                    <option value="">-- Select --</option>
                    @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bt)
                        <option {{ old('blood_type', $employee->blood_type) == $bt ? 'selected' : '' }}>{{ $bt }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Citizenship</label>
                <input type="text" name="citizenship" value="{{ old('citizenship', $employee->citizenship) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 4 - IDs --}}
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">UMID ID No.</label>
                <input type="text" name="umid_id_no" value="{{ old('umid_id_no', $employee->umid_id_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Pag-IBIG ID No.</label>
                <input type="text" name="pagibig_id_no" value="{{ old('pagibig_id_no', $employee->pagibig_id_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">PhilHealth ID No.</label>
                <input type="text" name="philhealth_id_no" value="{{ old('philhealth_id_no', $employee->philhealth_id_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">PhilSys No.</label>
                <input type="text" name="philsys_no" value="{{ old('philsys_no', $employee->philsys_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 5 --}}
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">TIN No.</label>
                <input type="text" name="tin_no" value="{{ old('tin_no', $employee->tin_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Agency Employee No.</label>
                <input type="text" name="agency_employee_no" value="{{ old('agency_employee_no', $employee->agency_employee_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Telephone No.</label>
                <input type="text" name="telephone_no" value="{{ old('telephone_no', $employee->telephone_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Mobile No.</label>
                <input type="text" name="mobile_no" value="{{ old('mobile_no', $employee->mobile_no) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 6 --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Residential Address</label>
                <input type="text" name="residential_address" value="{{ old('residential_address', $employee->residential_address) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Residential Zip Code</label>
                <input type="text" name="residential_zip_code" value="{{ old('residential_zip_code', $employee->residential_zip_code) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 7 --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Permanent Address</label>
                <input type="text" name="permanent_address" value="{{ old('permanent_address', $employee->permanent_address) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Permanent Zip Code</label>
                <input type="text" name="permanent_zip_code" value="{{ old('permanent_zip_code', $employee->permanent_zip_code) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        {{-- Row 8 --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Email Address</label>
                <input type="email" name="email_address" value="{{ old('email_address', $employee->email_address) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.show', $employee->id) }}"
                class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit"
                class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>