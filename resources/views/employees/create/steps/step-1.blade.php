<form method="POST" action="{{ route('employees.create.step.post', 1) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Personal Information</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide the needed personal information.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Surname  -->
            <div class="flex items-stretch border-b border-gray-300">
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    1. Surname
                </span>
                <input type="text" name="surname"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent uppercase text-sm">
            </div>

            <!-- First Name -->
            <div class="flex items-stretch border-b border-gray-300">
                <!-- Left: First Name label + input -->
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    2. First Name
                </span>
                <input type="text" name="first_name"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent uppercase text-sm">

                <!-- Name Extension -->
                <span class="w-44 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                    Name Extension <br>(Jr., Sr., II, III)
                </span>
                <select name="name_extension"
                    class="w-60 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    <option value=""></option>
                    <option>Jr.</option>
                    <option>Sr.</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                </select>
            </div>

            <!-- Middle Name -->
            <div class="flex items-stretch border-b border-gray-300">
                <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                    Middle Name
                </span>
                <input type="text" name="middle_name"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent uppercase text-sm">
            </div>

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Date of Birth -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 leading-tight">
                            3. Date of Birth <br><span class="normal-case font-normal text-[10px]">(mm/dd/yyyy)</span>
                        </span>
                        <input type="date" name="date_of_birth"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Place of Birth -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            4. Place of Birth
                        </span>
                        <input type="text" name="place_of_birth"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Sex at Birth -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            5. Sex at Birth
                        </span>
                        <div class="flex items-center gap-6 px-3 py-2 text-sm text-gray-700">
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="sex_at_birth" value="Male" class="accent-green-700"> Male
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="sex_at_birth" value="Female" class="accent-green-700"> Female
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Right Side -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <span class="text-gray-600 uppercase font-semibold tracking-wide">16. Citizenship</span>

                    <!-- Filipino / Dual Citizenship -->
                    <div class="flex flex-row gap-1 text-sm text-gray-700">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="citizenship" value="Filipino" class="accent-green-700"> Filipino
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="citizenship" value="Dual Citizenship" class="accent-green-700"> Dual Citizenship
                        </label>
                    </div>

                    <!-- By birth / By naturalization -->
                    <div class="flex gap-4 ml-28 text-[11px] text-gray-600">
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="radio" name="citizenship_type" value="by birth" class="accent-green-700"> by birth
                        </label>
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="radio" name="citizenship_type" value="by naturalization" class="accent-green-700"> by naturalization
                        </label>
                    </div>

                    <!-- Indicate country -->
                    <div class="mt-1">
                        <p class="text-[10px] text-gray-400 mb-0.5">If holder of dual citizenship, please indicate country:</p>
                        <input type="text" name="citizenship_country"
                            class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent uppercase text-sm">
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
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 px-3 py-2 text-sm text-gray-700">
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="civil_status" value="Single" class="accent-green-700"> Single
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="civil_status" value="Married" class="accent-green-700"> Married
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="civil_status" value="Widowed" class="accent-green-700"> Widowed
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="civil_status" value="Separated" class="accent-green-700"> Separated
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="civil_status" value="Others" class="accent-green-700"> Others
                            </label>
                        </div>
                    </div>

                    <!-- Height -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            7. Height <span class="lowercase">(m)</span>
                        </span>
                        <input type="text" name="height"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Weight -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            8. Weight <span class="lowercase">(kg)</span>
                        </span>
                        <input type="text" name="weight"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Residential Address spanning all 3 rows -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <span class="text-gray-600 uppercase font-semibold tracking-wide">17. Residential Address</span>

                    <div class="grid grid-cols-2 gap-x-3 gap-y-2">
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">House/Block/Lot No.</label>
                            <input type="text" name="res_house"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Street</label>
                            <input type="text" name="res_street"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Subdivision/Village</label>
                            <input type="text" name="res_subdivision"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Barangay</label>
                            <input type="text" name="res_barangay"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">City/Municipality</label>
                            <input type="text" name="res_city"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Province</label>
                            <input type="text" name="res_province"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                    </div>

                    <!-- Zip Code -->
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] text-gray-600 uppercase font-semibold tracking-wide shrink-0">Zip Code</span>
                        <input type="text" name="res_zip"
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
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- UMID -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            10. UMID ID No.
                        </span>
                        <input type="text" name="umid"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Pag-IBIG -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            11. Pag-IBIG ID No.
                        </span>
                        <input type="text" name="pagibig"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- PhilHealth -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            12. PhilHealth No.
                        </span>
                        <input type="text" name="philhealth"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Permanent Address spanning all 4 rows -->
                <div class="w-[50%] shrink-0 px-3 py-2 flex flex-col gap-2">
                    <span class="text-gray-600 uppercase font-semibold tracking-wide">18. Permanent Address</span>

                    <div class="grid grid-cols-2 gap-x-3 gap-y-2">
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">House/Block/Lot No.</label>
                            <input type="text" name="perm_house"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Street</label>
                            <input type="text" name="perm_street"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Subdivision/Village</label>
                            <input type="text" name="perm_subdivision"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Barangay</label>
                            <input type="text" name="perm_barangay"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">City/Municipality</label>
                            <input type="text" name="perm_city"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 mb-0.5">Province</label>
                            <input type="text" name="perm_province"
                                class="w-full border-b border-gray-300 focus:border-green-700 outline-none py-1 bg-transparent text-sm">
                        </div>
                    </div>

                    <!-- Zip Code -->
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] text-gray-600 uppercase font-semibold tracking-wide shrink-0">Zip Code</span>
                        <input type="text" name="perm_zip"
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
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- TIN -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            14. TIN No.
                        </span>
                        <input type="text" name="tin"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Agency Employee No -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            15. Agency Employee No.
                        </span>
                        <input type="text" name="agency_employee_no"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Telephone, Mobile, Email -->
                <div class="w-[50%] shrink-0">

                    <!-- Telephone -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            19. Telephone No.
                        </span>
                        <input type="text" name="telephone"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Mobile -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            20. Mobile No.
                        </span>
                        <input type="text" name="mobile"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Email -->
                    <div class="flex items-stretch">
                        <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            21. Email Address
                        </span>
                        <input type="email" name="email"
                            class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.index') }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Cancel
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>