<form method="POST" action="{{ route('employees.edit.step.post', ['id' => $employee->id, 'step' => 2]) }}">
    @csrf

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-4">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Family Background</h2>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Update family background details.</p>
        </div>

        @php $family = $employee->familyBackground; @endphp

        {{-- Spouse --}}
        <div class="mb-4 border-b pb-4">
            <h3 class="text-sm font-bold text-green-700 uppercase mb-3">Spouse Information</h3>
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Surname</label>
                    <input type="text" name="spouse_surname" value="{{ old('spouse_surname', $family->spouse_surname ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">First Name</label>
                    <input type="text" name="spouse_first_name" value="{{ old('spouse_first_name', $family->spouse_first_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Middle Name</label>
                    <input type="text" name="spouse_middle_name" value="{{ old('spouse_middle_name', $family->spouse_middle_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Extension</label>
                    <input type="text" name="spouse_name_extension" value="{{ old('spouse_name_extension', $family->spouse_name_extension ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation', $family->occupation ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Employer/Business Name</label>
                    <input type="text" name="employer_business_name" value="{{ old('employer_business_name', $family->employer_business_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Business Address</label>
                    <input type="text" name="business_address" value="{{ old('business_address', $family->business_address ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Telephone No.</label>
                    <input type="text" name="telephone_no" value="{{ old('telephone_no', $family->telephone_no ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
            </div>
        </div>

        {{-- Father --}}
        <div class="mb-4 border-b pb-4">
            <h3 class="text-sm font-bold text-green-700 uppercase mb-3">Father's Information</h3>
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Surname</label>
                    <input type="text" name="father_surname" value="{{ old('father_surname', $family->father_surname ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">First Name</label>
                    <input type="text" name="father_first_name" value="{{ old('father_first_name', $family->father_first_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Middle Name</label>
                    <input type="text" name="father_middle_name" value="{{ old('father_middle_name', $family->father_middle_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Extension</label>
                    <input type="text" name="father_name_extension" value="{{ old('father_name_extension', $family->father_name_extension ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
            </div>
        </div>

        {{-- Mother --}}
        <div class="mb-4 border-b pb-4">
            <h3 class="text-sm font-bold text-green-700 uppercase mb-3">Mother's Information</h3>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Surname</label>
                    <input type="text" name="mother_surname" value="{{ old('mother_surname', $family->mother_surname ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">First Name</label>
                    <input type="text" name="mother_first_name" value="{{ old('mother_first_name', $family->mother_first_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Middle Name</label>
                    <input type="text" name="mother_middle_name" value="{{ old('mother_middle_name', $family->mother_middle_name ?? '') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
                </div>
            </div>
        </div>

        {{-- Children --}}
        <div class="mb-4">
            <h3 class="text-sm font-bold text-green-700 uppercase mb-3">Children</h3>
            <div class="border border-gray-300">
                <div class="flex border-b border-gray-300 bg-gray-50">
                    <div class="flex-1 px-3 py-2 text-[10px] font-semibold text-gray-600 uppercase border-r border-gray-300">Name</div>
                    <div class="w-40 px-3 py-2 text-[10px] font-semibold text-gray-600 uppercase">Date of Birth</div>
                </div>
                @php
                    $childNames = is_array($family->name_of_children ?? null)
                        ? $family->name_of_children
                        : [];
                    $childDobs = is_array($family->date_of_birth ?? null)
                        ? $family->date_of_birth
                        : [];
                    $childCount = max(count($childNames), 1);
                @endphp
                <div id="children-list">
                    @for($i = 0; $i < $childCount; $i++)
                    <div class="flex border-b border-gray-300">
                        <input type="text" name="name_of_children[{{ $i }}]"
                            value="{{ old("name_of_children.$i", $childNames[$i] ?? '') }}"
                            class="flex-1 px-3 py-2 text-sm outline-none focus:bg-gray-50 border-r border-gray-300">
                        <input type="text" name="date_of_birth[{{ $i }}]"
                            value="{{ old("date_of_birth.$i", $childDobs[$i] ?? '') }}"
                            class="w-40 px-3 py-2 text-sm outline-none focus:bg-gray-50">
                    </div>
                    @endfor
                </div>
                <div class="px-3 py-2">
                    <button type="button" onclick="addChild()"
                        class="text-xs text-green-700 hover:underline">+ Add Row</button>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('employees.edit.step', ['id' => $employee->id, 'step' => 1]) }}"
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
            row.className = 'flex border-b border-gray-300';
            row.innerHTML = `
                <input type="text" name="name_of_children[${childIndex}]"
                    class="flex-1 px-3 py-2 text-sm outline-none focus:bg-gray-50 border-r border-gray-300">
                <input type="text" name="date_of_birth[${childIndex}]"
                    class="w-40 px-3 py-2 text-sm outline-none focus:bg-gray-50">
            `;
            list.appendChild(row);
            childIndex++;
        }
    </script>
</form>