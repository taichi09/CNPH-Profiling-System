<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->employee_id, 'step' => 2]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Family Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update family background details.</p>
        </div>

        @php
            $family = $employee->familyBackground;
            $rawNames = (string)($family->getAttributes()['name_of_children'] ?? '');
            $rawDobs = (string)($family->getAttributes()['date_of_birth'] ?? '');
            $nameSep = str_contains($rawNames, ';') ? ';' : ',';
            $dobSep = str_contains($rawDobs, ';') ? ';' : ',';
            $childNames = array_values(array_filter(array_map('trim', explode($nameSep, $rawNames))));
            $childDobs = array_values(array_filter(array_map('trim', explode($dobSep, $rawDobs))));
            $childCount = max(count($childNames), 1);
        @endphp

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <div class="flex border-b border-gray-300">

                <!-- Left Side -->
                <div class="flex-1 border-r border-gray-300">

                    <!-- Spouse Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            22. Spouse's Surname
                        </span>
                        <input type="text" name="spouse_surname"
                            value="{{ old('spouse_surname', $family->spouse_surname ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Spouse First Name + Extension -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="spouse_first_name"
                            value="{{ old('spouse_first_name', $family->spouse_first_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                        <span class="w-40 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            Name Extension <br>(Jr., Sr., II, III)
                        </span>
                        @php $spouseExt = old('spouse_extension', $family->spouse_name_extension ?? ''); @endphp
                        <input type="text" name="spouse_extension"
                            list="spouse_ext_options"
                            value="{{ $spouseExt }}"
                            placeholder="Select or type"
                            class="w-20 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                        <datalist id="spouse_ext_options">
                            <option value="Jr.">
                            <option value="Sr.">
                            <option value="II">
                            <option value="III">
                            <option value="IV">
                        </datalist>
                    </div>

                    <!-- Spouse Middle Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="spouse_middle_name"
                            value="{{ old('spouse_middle_name', $family->spouse_middle_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Occupation -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Occupation
                        </span>
                        <input type="text" name="spouse_occupation"
                            value="{{ old('spouse_occupation', $family->occupation ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Employer/Business Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Employer/Business Name
                        </span>
                        <input type="text" name="spouse_employer"
                            value="{{ old('spouse_employer', $family->employer_business_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Business Address -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Business Address
                        </span>
                        <input type="text" name="spouse_business_address"
                            value="{{ old('spouse_business_address', $family->business_address ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Telephone No -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Telephone No.
                        </span>
                        <input type="text" name="spouse_telephone"
                            value="{{ old('spouse_telephone', $family->telephone_no ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Father Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            24. Father's Surname
                        </span>
                        <input type="text" name="father_surname"
                            value="{{ old('father_surname', $family->father_surname ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Father First Name + Extension -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="father_first_name"
                            value="{{ old('father_first_name', $family->father_first_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm border-r">
                        <span class="w-40 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                            Name Extension <br>(Jr., Sr., II, III)
                        </span>
                        @php $fatherExt = old('father_extension', $family->father_name_extension ?? ''); @endphp
                        <input type="text" name="father_extension"
                            list="father_ext_options"
                            value="{{ $fatherExt }}"
                            placeholder="Select or type"
                            class="w-20 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                        <datalist id="father_ext_options">
                            <option value="Jr.">
                            <option value="Sr.">
                            <option value="II">
                            <option value="III">
                            <option value="IV">
                        </datalist>
                    </div>

                    <!-- Father Middle Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="father_middle_name"
                            value="{{ old('father_middle_name', $family->father_middle_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Mother Maiden Name label -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-gray-300">
                            25. Mother's Maiden Name
                        </span>
                    </div>

                    <!-- Mother Surname -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Surname
                        </span>
                        <input type="text" name="mother_surname"
                            value="{{ old('mother_surname', $family->mother_surname ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Mother First Name -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            First Name
                        </span>
                        <input type="text" name="mother_first_name"
                            value="{{ old('mother_first_name', $family->mother_first_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                    <!-- Mother Middle Name -->
                    <div class="flex items-stretch">
                        <span class="w-48 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300">
                            Middle Name
                        </span>
                        <input type="text" name="mother_middle_name"
                            value="{{ old('mother_middle_name', $family->mother_middle_name ?? '') }}"
                            class="flex-1 px-2 py-2 outline-none border-gray-300 focus:bg-gray-50 bg-transparent text-sm">
                    </div>

                </div>

                <!-- Right Side: Children -->
                <div class="flex-1 flex flex-col px-3 py-2">

                    <!-- Header Row -->
                    <div class="flex items-stretch border-b border-gray-300">
                        <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 leading-tight flex flex-col justify-center">
                            <span>23. Name of Children</span>
                            <span class="normal-case font-normal">(Write full name and list all)</span>
                        </div>
                        <div class="w-40 shrink-0 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide leading-tight flex flex-col justify-center">
                            <span>Date of Birth</span>
                            <span class="normal-case font-normal">(dd/mm/yyyy)</span>
                        </div>
                    </div>

                    <!-- Child Rows -->
                    <div id="children-list" class="flex flex-col">
                        @for($i = 0; $i < $childCount; $i++)
                        <div class="flex items-stretch border-b border-gray-300">
                            <input type="text" name="children[{{ $i }}][name]"
                                value="{{ old("children.$i.name", $childNames[$i] ?? '') }}"
                                class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                            <input type="text" name="children[{{ $i }}][dob]"
                                value="{{ old("children.$i.dob", $childDobs[$i] ?? '') }}"
                                placeholder="dd/mm/yyyy"
                                class="w-40 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-gray-300">
                        </div>
                        @endfor
                    </div>

                    <!-- Add Child Button -->
                    <div class="px-2 py-1.5">
                        <button type="button" onclick="addChild()"
                            class="text-xs text-green-700 hover:underline">+ Add Child</button>
                    </div>

                </div>

            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.edit.step', ['id' => $employee->employee_id, 'step' => 1]) }}"
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
        let childIndex = {{ $childCount }};
        function addChild() {
            const list = document.getElementById('children-list');
            const row = document.createElement('div');
            row.className = 'flex items-stretch border-b border-gray-300';
            row.innerHTML = `
                <input type="text" name="children[${childIndex}][name]"
                    class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                <input type="text" name="children[${childIndex}][dob]" placeholder="dd/mm/yyyy"
                    class="w-40 shrink-0 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-gray-300">
            `;
            list.appendChild(row);
            childIndex++;
        }
    </script>
</form>