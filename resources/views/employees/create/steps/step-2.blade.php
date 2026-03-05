<form method="POST" action="{{ route('employees.create.step.post', 2) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Family Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide the needed information of the family.</p>
        </div>

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">
            
            <div class="flex border-b border-gray-300">

                <!-- Left Side: Spouse name fields -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Spouse Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            22. Spouse's Surname
                        </span>
                        <input type="text" name="spouse_surname"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Spouse First Name + Extension -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="spouse_first_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm"">
                        
                        <!-- Name Extension -->    
                        <span class="w-44 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            Name Extension <br>(Jr., Sr., II, III)
                        </span>
                        <select name="spouse_extension"
                            class="w-24 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                            <option value="">N/A</option>
                            <option>Jr.</option>
                            <option>Sr.</option>
                            <option>II</option>
                            <option>III</option>
                        </select>
                    </div>

                    <!-- Spouse Middle Name -->
                   <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="spouse_middle_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Occupation -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Occupation
                        </span>
                        <input type="text" name="spouse_occupation"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Employer/Business Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Employer/Business Name
                        </span>
                        <input type="text" name="spouse_employer"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Business Address -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Business Address
                        </span>
                        <input type="text" name="spouse_business_address"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Telephone No -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Telephone No.
                        </span>
                        <input type="text" name="spouse_telephone"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Father Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            24. Father's Surname
                        </span>
                        <input type="text" name="father_surname"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Father First Name + Extension -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="father_first_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm border-r border-gray-300">
                        <span class="w-44 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            Name Extension <br>(Jr., Sr., II, III)
                        </span>
                        <select name="father_extension"
                            class="w-24 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                            <option value="">N/A</option>
                            <option>Jr.</option>
                            <option>Sr.</option>
                            <option>II</option>
                            <option>III</option>
                        </select>
                    </div>

                    <!-- Father Middle Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="father_middle_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Mother Maiden Name label -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            25. Mother's Maiden Name
                        </span>
                        <span class="flex-1 px-2 py-2 text-gray-400 text-[10px] italic flex items-center">
                            Surname, First Name, Middle Name
                        </span>
                    </div>

                    <!-- Mother Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Surname
                        </span>
                        <input type="text" name="mother_surname"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Mother First Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="mother_first_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>

                    <!-- Mother Middle Name -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="mother_middle_name"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent uppercase text-sm">
                    </div>
                </div>

            </div>
        </div>

        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.create.step', 1) }}" class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit" class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Next &rsaquo;
            </button>
        </div>
    </div>
</form>