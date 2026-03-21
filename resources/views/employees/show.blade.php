<x-app-layout>
    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300 overflow-x-auto">
        <div class="bg-white rounded-lg shadow p-4">

            @vite('resources/css/pds.css')

            @php
                $na = fn($v) => (!$v || strtoupper(trim((string)$v)) === 'N/A') ? 'N/A' : $v;

                /* ── Children ── */
                $childNames = [];
                $childDobs  = [];
                if ($family) {
                    // Get raw values directly from DB attributes, bypassing accessors
                    $rawNames = $family->getAttributes()['name_of_children'] ?? '';
                    $rawDobs  = $family->getAttributes()['date_of_birth'] ?? '';

                    // Detect separator — semicolon or comma
                    $nameSep = str_contains($rawNames, ';') ? ';' : ',';
                    $dobSep  = str_contains($rawDobs, ';') ? ';' : ',';

                    $childNames = array_values(array_filter(array_map('trim', explode($nameSep, $rawNames))));
                    $childDobs  = array_values(array_filter(array_map('trim', explode($dobSep, $rawDobs))));
                }

                /* ── Education by level ── */
                $levelOrder = ['ELEMENTARY', 'SECONDARY', 'VOCATIONAL/TRADE COURSE', 'COLLEGE', 'GRADUATE STUDIES'];
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
                $resAddr= $parseAddress($personal->residential_address ?? '');
                $permAddr = $parseAddress($personal->permanent_address ?? '');
            @endphp

            <div class="action-bar">
                <a href="{{ route('employees.index') }}" class="btn">&#8592; Back to Employees</a>
                <button class="btn btn-green" onclick="window.print()">&#128438; Print / Save as PDF</button>
            </div>

            {{-- Page 1: Personal Info + Family Background + Education --}}
            @include('employees.partials.pds-page1')

            {{-- Page 2: Civil Service Eligibility + Work Experience --}}
            @include('employees.partials.pds-page2')

            {{-- Page 3: Voluntary Work + L&D + Other Info --}}
            @include('employees.partials.pds-page3')

        </div>
    </main>
</x-app-layout>