<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->id, 'step' => 8]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Other Information</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update other information details.</p>
        </div>

        @php
            $other = $employee->otherInformations->first();
            $skills = array_filter(explode(',', $other->special_skills_and_hobbies ?? '')) ?: [''];
            $distinctions = array_filter(explode(',', $other->non_academic_distinction ?? '')) ?: [''];
            $memberships = array_filter(explode(',', $other->membership_in_association ?? '')) ?: [''];
        @endphp

        <!-- Body -->
        <div class="border border-gray-300 text-xs w-full">

            <!-- Header Row -->
            <div class="flex items-stretch border-b border-gray-300">
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex items-center justify-center text-center">
                    31. Special Skills and Hobbies
                </div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 flex flex-col items-center justify-center text-center">
                    <span>32. Non-Academic Distinctions / Recognition</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>
                <div class="flex-1 px-2 py-2 text-[10px] text-gray-600 uppercase font-semibold tracking-wide flex flex-col items-center justify-center text-center">
                    <span>33. Membership in Association/Organization</span>
                    <span class="normal-case font-normal">(Write in full)</span>
                </div>
            </div>

            <!-- Input Rows -->
            <div class="flex items-stretch border-b border-gray-300">
                <div id="skills-list" class="flex-1 border-r border-gray-300 flex flex-col">
                    @foreach($skills as $i => $skill)
                    <input type="text" name="skills[{{ $i }}]"
                        value="{{ old("skills.$i", trim($skill)) }}"
                        class="w-full px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-b border-gray-300 text-center">
                    @endforeach
                </div>
                <div id="distinctions-list" class="flex-1 border-r border-gray-300 flex flex-col">
                    @foreach($distinctions as $i => $distinction)
                    <input type="text" name="distinctions[{{ $i }}]"
                        value="{{ old("distinctions.$i", trim($distinction)) }}"
                        class="w-full px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-b border-gray-300 text-center">
                    @endforeach
                </div>
                <div id="memberships-list" class="flex-1 flex flex-col">
                    @foreach($memberships as $i => $membership)
                    <input type="text" name="memberships[{{ $i }}]"
                        value="{{ old("memberships.$i", trim($membership)) }}"
                        class="w-full px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-b border-gray-300 text-center">
                    @endforeach
                </div>
            </div>

            <!-- Add Row Buttons -->
            <div class="flex border-t border-gray-300">
                <div class="flex-1 px-2 py-1.5 border-r border-gray-300">
                    <button type="button" onclick="addSkill()"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
                <div class="flex-1 px-2 py-1.5 border-r border-gray-300">
                    <button type="button" onclick="addDistinction()"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
                <div class="flex-1 px-2 py-1.5">
                    <button type="button" onclick="addMembership()"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>
        </div>

        <!-- Second Section -->
        <div class="border border-gray-300 text-xs w-full mt-5">
            <div class="flex items-stretch border-b border-gray-300">
                <div class="flex items-stretch flex-1 border-r border-gray-300">
                    <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                        Landbank No.
                    </span>
                    <input type="text" name="landbank_no"
                        value="{{ old('landbank_no', $other->landbank_no ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                <div class="flex items-stretch flex-1 border-r border-gray-300">
                    <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                        DBP No.
                    </span>
                    <input type="text" name="dbp_no"
                        value="{{ old('dbp_no', $other->dbp_no ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
            </div>

            <div class="flex items-stretch border-b border-gray-300">
                <div class="flex items-stretch flex-1 border-r border-gray-300">
                    <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                        SSS ID
                    </span>
                    <input type="text" name="sss_id"
                        value="{{ old('sss_id', $other->sss_id ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
                <div class="flex items-stretch flex-1 border-r border-gray-300">
                    <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                        Department Name
                    </span>
                    <input type="text" name="department_name"
                        value="{{ old('department_name', $other->department_name ?? '') }}"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300 text-center">
                </div>
            </div>

            <div class="flex items-stretch">
                <div class="flex items-stretch flex-1">
                    <span class="w-36 shrink-0 px-2 py-2 bg-white text-gray-600 uppercase font-semibold tracking-wide border-r border-gray-300 text-[10px] leading-tight flex items-center">
                        Employment Status
                    </span>
                    @php $empStatus = old('employment_status', $other->employment_status ?? ''); @endphp
                    <select name="employment_status"
                        class="flex-1 px-2 py-2 outline-none focus:bg-gray-50 bg-transparent text-sm border-r border-gray-300">
                        <option value="">-- Select --</option>
                        <option {{ $empStatus == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                        <option {{ $empStatus == 'Contract Of Service' ? 'selected' : '' }}>Contract of Service</option>
                        <option {{ $empStatus == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option {{ $empStatus == 'Casual' ? 'selected' : '' }}>Casual</option>
                        <option {{ $empStatus == 'Contractual' ? 'selected' : '' }}>Contractual</option>
                        <option {{ $empStatus == 'Job Order' ? 'selected' : '' }}>Job Order</option>
                        <option {{ $empStatus == 'Resigned' ? 'selected' : '' }}>Resigned</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.edit.step', ['id' => $employee->id, 'step' => 7]) }}"
                class="px-8 py-2 rounded-full border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                &lsaquo; Back
            </a>
            <button type="submit"
                class="px-10 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-widest hover:bg-green-800">
                Submit
            </button>
        </div>
    </div>

    <script>
        let skillIndex      = {{ count($skills) }};
        let distinctionIndex = {{ count($distinctions) }};
        let membershipIndex  = {{ count($memberships) }};

        function addSkill() {
            const list = document.getElementById('skills-list');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `skills[${skillIndex}]`;
            input.className = 'w-full px-2 py-2 outline-none focus:bg-gray-50 bg-white text-sm border-t border-gray-300 text-center';
            list.appendChild(input);
            skillIndex++;
        }

        function addDistinction() {
            const list = document.getElementById('distinctions-list');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `distinctions[${distinctionIndex}]`;
            input.className = 'w-full px-2 py-2 outline-none focus:bg-gray-50 bg-white text-sm border-t border-gray-300 text-center';
            list.appendChild(input);
            distinctionIndex++;
        }

        function addMembership() {
            const list = document.getElementById('memberships-list');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `memberships[${membershipIndex}]`;
            input.className = 'w-full px-2 py-2 outline-none focus:bg-gray-50 bg-white text-sm border-t border-gray-300 text-center';
            list.appendChild(input);
            membershipIndex++;
        }
    </script>
</form>