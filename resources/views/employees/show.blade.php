<x-app-layout>
    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300 overflow-x-auto">
        <div class="bg-white rounded-lg shadow p-4">

            @vite('resources/css/pds.css')

            @php
                $na = fn($v) => (!$v || strtoupper(trim((string)$v)) === 'N/A') ? 'N/A' : $v;

                /* ── Children ── */
                $childNames = [];
                $childDobs = [];
                if ($family) {
                    // Get raw values directly from DB attributes, bypassing accessors
                    $rawNames = $family->getAttributes()['name_of_children'] ?? '';
                    $rawDobs = $family->getAttributes()['date_of_birth'] ?? '';

                    // Detect separator — semicolon or comma
                    $nameSep = str_contains($rawNames, ';') ? ';' : ',';
                    $dobSep = str_contains($rawDobs, ';') ? ';' : ',';

                    $childNames = array_values(array_filter(array_map('trim', explode($nameSep, $rawNames))));
                    $childDobs = array_values(array_filter(array_map('trim', explode($dobSep, $rawDobs))));
                }

                /* ── Education by level ── */
                $levelOrder = ['Elementary', 'Secondary', 'Vocational/Trade Course', 'College', 'Graduate Studies'];
                $eduByLevel = [];
                foreach ($education as $e) {
                    $eduByLevel[$e->level][] = $e;
                }

                /* ── Other Information ── */
                $skills = $other ? array_values(array_filter(array_map('trim', explode(',', $other->special_skills_and_hobbies ?? '')))) : [];
                $distinctions = $other ? array_values(array_filter(array_map('trim', explode(',', $other->non_academic_distinction ?? '')))) : [];
                $memberships = $other ? array_values(array_filter(array_map('trim', explode(',', $other->membership_in_association ?? '')))) : [];
                $maxOther = max(count($skills), count($distinctions), count($memberships), 7);

                /* ── Citizenship display ── */
                $citizenshipRaw = $personal->citizenship ?? 'N/A';
                $citizenParts = array_map('trim', explode('//', $citizenshipRaw));
                $citizenship = $citizenParts[0] ?? 'N/A';
                $citizenType = $citizenParts[1] ?? '';
                $citizenCountry = $citizenParts[2] ?? '';

                /* ── Address parser ── */
                $parseAddress = function(string $raw): array {
                    $parts = array_map('trim', explode('//', $raw));
                    return [
                        'house' => $parts[0] ?? 'N/A',
                        'street' => $parts[1] ?? 'N/A',
                        'subdivision' => $parts[2] ?? 'N/A',
                        'barangay' => $parts[3] ?? 'N/A',
                        'city' => $parts[4] ?? 'N/A',
                        'province' => $parts[5] ?? 'N/A',
                    ];
                };
                $resAddr = $parseAddress($personal->residential_address ?? '');
                $permAddr = $parseAddress($personal->permanent_address ?? '');
            @endphp

            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('employees.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full border-2 border-green-700 text-green-700 text-sm font-semibold uppercase tracking-wide hover:bg-green-700 hover:text-white transition-colors duration-200">
                    &#8592; Back to Employees
                </a>
                {{-- <button onclick="window.print()"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-green-700 text-white text-sm font-semibold uppercase tracking-wide hover:bg-green-800 transition-colors duration-200">
                    &#128438; Print / Save as PDF
                </button> --}}
            </div>

            {{-- Tabs --}}
            <div class="flex border-b border-gray-200 mb-4">
                <button onclick="switchTab('page1')"
                    id="tab-page1"
                    class="px-6 py-2 text-sm font-semibold uppercase tracking-wide border-b-4 border-green-700 text-green-700 focus:outline-none">
                    Page 1
                </button>
                <button onclick="switchTab('page2')"
                    id="tab-page2"
                    class="px-6 py-2 text-sm font-semibold uppercase tracking-wide border-b-4 border-transparent text-gray-400 hover:text-green-700 focus:outline-none">
                    Page 2
                </button>
                <button onclick="switchTab('page3')"
                    id="tab-page3"
                    class="px-6 py-2 text-sm font-semibold uppercase tracking-wide border-b-4 border-transparent text-gray-400 hover:text-green-700 focus:outline-none">
                    Page 3
                </button>
                <button onclick="switchTab('ids')"
                    id="tab-ids"
                    class="px-6 py-2 text-sm font-semibold uppercase tracking-wide border-b-4 border-transparent text-gray-400 hover:text-green-700 focus:outline-none">
                    IDs, Bank & Photo
                </button>
            </div>

            {{-- Tab Contents --}}
            <div id="content-page1">
                @include('employees.partials.pds-page1')
            </div>

            <div id="content-page2" style="display:none;">
                @include('employees.partials.pds-page2')
            </div>

            <div id="content-page3" style="display:none;">
                @include('employees.partials.pds-page3')
            </div>

            <div id="content-ids" style="display:none;">
                <div class="mt-6 flex gap-6 items-start">

                    {{-- Left: Passport Photo --}}
                    <div class="flex flex-col items-center">
                        <div style="width:132px; height:170px; border:2px dashed #cbd5e1; border-radius:8px; display:flex; flex-direction:column; align-items:center; justify-content:center; background:#f8fafc; color:#94a3b8; font-size:7.5pt; text-align:center; padding:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:32px; height:32px; margin-bottom:6px; color:#cbd5e1;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM3 20h18" />
                            </svg>
                            Passport-sized unfiltered digital picture taken within the last 6 months<br>4.5 cm × 3.5 cm
                        </div>
                    </div>

                    {{-- Right: ID Cards --}}
                    <div class="flex-1">
                        <div class="grid grid-cols-3 gap-4 w-full">

                            {{-- Landbank --}}
                            <div class="bg-white border border-gray-200 rounded-lg p-5">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Landbank No.</p>
                                <p class="text-sm font-bold text-gray-800">{{ $other->landbank_no ?? 'N/A' }}</p>
                            </div>

                            {{-- DBP --}}
                            <div class="bg-white border border-gray-200 rounded-lg p-5">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">DBP No.</p>
                                <p class="text-sm font-bold text-gray-800">{{ $other->dbp_no ?? 'N/A' }}</p>
                            </div>

                            {{-- SSS --}}
                            <div class="bg-white border border-gray-200 rounded-lg p-5">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">SSS ID</p>
                                <p class="text-sm font-bold text-gray-800">{{ $other->sss_id ?? 'N/A' }}</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <script>
                function switchTab(page) {
                    const pages = ['page1', 'page2', 'page3', 'ids'];

                    pages.forEach(p => {
                        document.getElementById('content-' + p).style.display = 'none';
                        document.getElementById('tab-' + p).classList.remove('border-green-700', 'text-green-700');
                        document.getElementById('tab-' + p).classList.add('border-transparent', 'text-gray-400');
                    });

                    document.getElementById('content-' + page).style.display = 'block';
                    document.getElementById('tab-' + page).classList.remove('border-transparent', 'text-gray-400');
                    document.getElementById('tab-' + page).classList.add('border-green-700', 'text-green-700');
                }
            </script>

        </div>
    </main>
</x-app-layout>