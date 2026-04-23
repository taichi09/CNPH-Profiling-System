<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->employee_id, 'step' => 1]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Personal Information</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update personal information details.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Surname -->
            <div class="flex items-stretch border-b border-gray-300">
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    1. Surname
                </span>
                <input type="text" name="surname"
                    value="{{ old('surname', $employee->surname) }}"
                    class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <!-- First Name -->
            <div class="flex items-stretch border-b border-gray-300">
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    2. First Name
                </span>
                <input type="text" name="first_name"
                    value="{{ old('first_name', $employee->first_name) }}"
                    class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                <span class="w-44 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                    Name Extension <br>(Jr., Sr., II, III)
                </span>
                @php $nameExt = old('name_extension', $employee->extension); @endphp
                <input type="text" name="name_extension"
                    list="ext_options"
                    value="{{ $nameExt }}"
                    placeholder="Select or type"
                    class="w-60 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                <datalist id="ext_options">
                    <option value="Jr.">
                    <option value="Sr.">
                    <option value="II">
                    <option value="III">
                    <option value="IV">
                </datalist>
            </div>

            <!-- Middle Name -->
            <div class="flex items-stretch border-b border-gray-300">
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    Middle Name
                </span>
                <input type="text" name="middle_name"
                    value="{{ old('middle_name', $employee->middle_name) }}"
                    class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
            </div>

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Date of Birth -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 leading-tight">
                            3. Date of Birth <br><span class="normal-case font-normal text-[10px]">(dd/mm/yyyy)</span>
                        </span>
                        <input type="date" name="date_of_birth"
                            value="{{ old('date_of_birth', $employee->date_of_birth) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Place of Birth -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            4. Place of Birth
                        </span>
                        <input type="text" name="place_of_birth"
                            value="{{ old('place_of_birth', $employee->place_of_birth) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Sex at Birth -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            5. Sex at Birth
                        </span>
                        <div class="flex items-center gap-6 px-3 py-2 text-sm text-gray-700">
                            @php $sex = old('sex_at_birth', $employee->sex_at_birth); @endphp
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="sex_at_birth" value="MALE" class="accent-green-700" {{ strtoupper($sex) == 'MALE' ? 'checked' : '' }}> Male
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="sex_at_birth" value="FEMALE" class="accent-green-700" {{ strtoupper($sex) == 'FEMALE' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Right Side: Citizenship -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <span class="text-gray-600 uppercase font-semibold tracking-wide">16. Citizenship</span>
                    @php
                        $citizenshipRaw     = old('citizenship', $employee->citizenship ?? '');
                        $citizenshipParts   = explode('//', $citizenshipRaw);
                        $citizenshipVal     = strtoupper(trim($citizenshipParts[0] ?? ''));
                        $citizenshipType    = strtoupper(trim($citizenshipParts[1] ?? ''));
                        $citizenshipCountry = trim($citizenshipParts[2] ?? '');
                    @endphp
                    <div class="flex flex-row gap-1 text-sm text-gray-700">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="citizenship" value="FILIPINO" class="accent-green-700" {{ $citizenshipVal == 'FILIPINO' ? 'checked' : '' }}> Filipino
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="citizenship" value="DUAL CITIZENSHIP" class="accent-green-700" {{ $citizenshipVal == 'DUAL CITIZENSHIP' ? 'checked' : '' }}> Dual Citizenship
                        </label>
                    </div>
                    <div class="flex gap-4 ml-28 text-[11px] text-gray-600">
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="radio" name="citizenship_type" value="BY BIRTH" class="accent-green-700" {{ $citizenshipType == 'BY BIRTH' ? 'checked' : '' }}> by birth
                        </label>
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="radio" name="citizenship_type" value="BY NATURALIZATION" class="accent-green-700" {{ $citizenshipType == 'BY NATURALIZATION' ? 'checked' : '' }}> by naturalization
                        </label>
                    </div>
                    <div class="mt-1">
                        <p class="text-[10px] text-gray-400 mb-0.5">If holder of dual citizenship, please indicate country:</p>
                        <input type="text" name="citizenship_country"
                            value="{{ old('citizenship_country', $citizenshipCountry) }}"
                            class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                    </div>
                </div>

            </div>

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Civil Status -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            6. Civil Status
                        </span>
                        @php
                            $civilStatus = old('civil_status', $employee->civil_status);
                            $isOther = !in_array($civilStatus, ['Single', 'Married', 'Widowed', 'Separated', '']);
                        @endphp
                        <div class="px-3 py-2 text-sm text-gray-700">
                            <div class="grid grid-cols-2 gap-x-6 gap-y-1">
                                <div class="flex flex-col gap-1">
                                    <label class="flex items-center gap-1.5 cursor-pointer">
                                        <input type="radio" name="civil_status" value="Single" class="accent-green-700" {{ $civilStatus == 'Single' ? 'checked' : '' }}> Single
                                    </label>
                                    <label class="flex items-center gap-1.5 cursor-pointer">
                                        <input type="radio" name="civil_status" value="Widowed" class="accent-green-700" {{ $civilStatus == 'Widowed' ? 'checked' : '' }}> Widowed
                                    </label>
                                    <label class="flex items-center gap-1.5 cursor-pointer">
                                        <input type="radio" name="civil_status" value="Others" class="accent-green-700" {{ $isOther ? 'checked' : '' }}> Other/s:
                                    </label>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label class="flex items-center gap-1.5 cursor-pointer">
                                        <input type="radio" name="civil_status" value="Married" class="accent-green-700" {{ $civilStatus == 'Married' ? 'checked' : '' }}> Married
                                    </label>
                                    <label class="flex items-center gap-1.5 cursor-pointer">
                                        <input type="radio" name="civil_status" value="Separated" class="accent-green-700" {{ $civilStatus == 'Separated' ? 'checked' : '' }}> Separated
                                    </label>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <input type="text" name="civil_status_other"
                                            value="{{ $isOther ? $civilStatus : '' }}"
                                            placeholder="If others, specify"
                                            class="w-full border-b border-gray-400 outline-none bg-transparent text-xs py-0.5 text-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Height -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            7. Height <span class="lowercase">(m)</span>
                        </span>
                        <input type="text" name="height"
                            value="{{ old('height', $employee->height) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Weight -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            8. Weight <span class="lowercase">(kg)</span>
                        </span>
                        <input type="text" name="weight"
                            value="{{ old('weight', $employee->weight) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Residential Address -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <span class="text-gray-600 uppercase font-semibold tracking-wide">17. Residential Address</span>
                    @php
                        $resParts = explode('//', $employee->residential_address ?? '');
                    @endphp
                    <div class="grid grid-cols-2 gap-x-3 gap-y-2">
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">House/Block/Lot No.</label>
                            <input type="text" name="res_house"
                                value="{{ old('res_house', trim($resParts[0] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Street</label>
                            <input type="text" name="res_street"
                                value="{{ old('res_street', trim($resParts[1] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Subdivision/Village</label>
                            <input type="text" name="res_subdivision"
                                value="{{ old('res_subdivision', trim($resParts[2] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Barangay</label>
                            <input type="text" name="res_barangay"
                                value="{{ old('res_barangay', trim($resParts[3] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">City/Municipality</label>
                            <input type="text" name="res_city"
                                value="{{ old('res_city', trim($resParts[4] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Province</label>
                            <input type="text" name="res_province"
                                value="{{ old('res_province', trim($resParts[5] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] text-gray-600 uppercase font-semibold tracking-wide shrink-0">Zip Code</span>
                        <input type="text" name="res_zip"
                            value="{{ old('res_zip', $employee->residential_zip_code) }}"
                            class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                    </div>
                </div>

            </div>

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Blood Type -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            9. Blood Type
                        </span>
                        <input type="text" name="blood_type"
                            list="blood_type_options"
                            value="{{ old('blood_type', $employee->blood_type) }}"
                            placeholder="Select or type"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                        <datalist id="blood_type_options">
                            <option value="A+">
                            <option value="A-">
                            <option value="B+">
                            <option value="B-">
                            <option value="AB+">
                            <option value="AB-">
                            <option value="O+">
                            <option value="O-">
                        </datalist>
                    </div>

                    <!-- UMID -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            10. UMID ID No.
                        </span>
                        <input type="text" name="umid"
                            value="{{ old('umid', $employee->umid_id_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Pag-IBIG -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            11. Pag-IBIG ID No.
                        </span>
                        <input type="text" name="pagibig"
                            value="{{ old('pagibig', $employee->pagibig_id_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- PhilHealth -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            12. PhilHealth No.
                        </span>
                        <input type="text" name="philhealth"
                            value="{{ old('philhealth', $employee->philhealth_id_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Permanent Address -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <div class="flex items-center gap-3">
                        <span class="text-gray-600 uppercase font-semibold tracking-wide">18. Permanent Address</span>
                        <label class="flex items-center gap-1.5 cursor-pointer text-[10px] text-gray-500 normal-case font-normal">
                            <input type="checkbox" id="same_as_residential" class="accent-green-700"
                                onchange="copyResidentialToPermanent(this)">
                            Same as Residential Address
                        </label>
                    </div>
                    @php
                        $permParts = explode('//', $employee->permanent_address ?? '');
                    @endphp
                    <div class="grid grid-cols-2 gap-x-3 gap-y-2">
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">House/Block/Lot No.</label>
                            <input type="text" name="perm_house"
                                value="{{ old('perm_house', trim($permParts[0] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Street</label>
                            <input type="text" name="perm_street"
                                value="{{ old('perm_street', trim($permParts[1] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Subdivision/Village</label>
                            <input type="text" name="perm_subdivision"
                                value="{{ old('perm_subdivision', trim($permParts[2] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Barangay</label>
                            <input type="text" name="perm_barangay"
                                value="{{ old('perm_barangay', trim($permParts[3] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">City/Municipality</label>
                            <input type="text" name="perm_city"
                                value="{{ old('perm_city', trim($permParts[4] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Province</label>
                            <input type="text" name="perm_province"
                                value="{{ old('perm_province', trim($permParts[5] ?? '')) }}"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] text-gray-600 uppercase font-semibold tracking-wide shrink-0">Zip Code</span>
                        <input type="text" name="perm_zip"
                            value="{{ old('perm_zip', $employee->permanent_zip_code) }}"
                            class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                    </div>
                </div>

            </div>

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- PhilSys -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            13. PhilSys No.
                        </span>
                        <input type="text" name="philsys"
                            value="{{ old('philsys', $employee->philsys_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- TIN -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            14. TIN No.
                        </span>
                        <input type="text" name="tin"
                            value="{{ old('tin', $employee->tin_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Agency Employee No -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            15. Agency Employee No.
                        </span>
                        <input type="text" name="agency_employee_no"
                            value="{{ old('agency_employee_no', $employee->agency_employee_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Telephone, Mobile, Email -->
                <div class="w-[50%] shrink-0">

                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            19. Telephone No.
                        </span>
                        <input type="text" name="telephone"
                            value="{{ old('telephone', $employee->telephone_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            20. Mobile No.
                        </span>
                        <input type="text" name="mobile"
                            value="{{ old('mobile', $employee->mobile_no) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <div class="flex items-stretch">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            21. Email Address
                        </span>
                        <input type="text" name="email"
                            value="{{ old('email', $employee->email_address) }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>
            </div>

        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.index') }}"
                class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit"
                class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>

    <script>
        function copyResidentialToPermanent(checkbox) {
            const fields = ['house', 'street', 'subdivision', 'barangay', 'city', 'province', 'zip'];
            fields.forEach(function(field) {
                const res  = document.querySelector(`input[name="res_${field}"]`);
                const perm = document.querySelector(`input[name="perm_${field}"]`);
                if (checkbox.checked) {
                    perm.value    = res.value;
                    perm.readOnly = true;
                } else {
                    perm.value    = '';
                    perm.readOnly = false;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const fields = ['house', 'street', 'subdivision', 'barangay', 'city', 'province', 'zip'];
            const allMatch = fields.every(function(field) {
                const res  = document.querySelector(`input[name="res_${field}"]`);
                const perm = document.querySelector(`input[name="perm_${field}"]`);
                return res && perm && res.value !== '' && res.value === perm.value;
            });
            if (allMatch) {
                const checkbox = document.getElementById('same_as_residential');
                checkbox.checked = true;
                fields.forEach(function(field) {
                    const perm = document.querySelector(`input[name="perm_${field}"]`);
                    if (perm) perm.readOnly = true;
                });
            }
        });
    </script>
</form>