<x-app-layout>
    
     <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300">
        <!-- All Employees Section -->

        <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Extracted PDS Information') }}
            </h2>
            <a href="{{ route('pds.index') }}"
               class="inline-flex items-center gap-1.5 text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Scan Another
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @php
            $sections = [
                'Personal Information' => [
                    'surname'            => 'Surname',
                    'first_name'         => 'First Name',
                    'middle_name'        => 'Middle Name',
                    'name_extension'     => 'Name Extension',
                    'date_of_birth'      => 'Date of Birth',
                    'place_of_birth'     => 'Place of Birth',
                    'sex'                => 'Sex at Birth',
                    'civil_status'       => 'Civil Status',
                    'height'             => 'Height (m)',
                    'weight'             => 'Weight (kg)',
                    'blood_type'         => 'Blood Type',
                    'citizenship'        => 'Citizenship',
                ],
                'Contact & IDs' => [
                    'email'              => 'Email Address',
                    'mobile'             => 'Mobile No.',
                    'telephone'          => 'Telephone No.',
                    'gsis_id'            => 'GSIS ID No.',
                    'pagibig_id'         => 'Pag-IBIG ID No.',
                    'philhealth'         => 'PhilHealth No.',
                    'sss'                => 'SSS No.',
                    'tin'                => 'TIN No.',
                    'umid'               => 'UMID ID No.',
                    'philsys'            => 'PhilSys No. (PSN)',
                    'agency_employee_no' => 'Agency Employee No.',
                ],
                'Address' => [
                    'residential_address' => 'Residential Address',
                    'permanent_address'   => 'Permanent Address',
                    'zip_code'            => 'ZIP Code',
                ],
                'Family Background' => [
                    'spouse_surname'   => "Spouse's Surname",
                    'spouse_firstname' => "Spouse's First Name",
                    'father_surname'   => "Father's Surname",
                    'father_firstname' => "Father's First Name",
                    'mother_maiden'    => "Mother's Maiden Name",
                ],
            ];
            @endphp

            @foreach ($sections as $sectionTitle => $fields)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ $sectionTitle }}</h3>
                </div>
                <div class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @foreach ($fields as $key => $label)
                    @php $value = $extracted[$key] ?? null; @endphp
                    <div class="flex items-start gap-4 px-6 py-3.5 hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors">
                        <span class="w-48 shrink-0 text-sm text-gray-500 dark:text-gray-400">{{ $label }}</span>
                        <span class="text-sm font-medium {{ $value ? 'text-gray-900 dark:text-gray-100' : 'text-gray-300 dark:text-gray-600 italic' }}">
                            {{ $value ?? 'Not detected' }}
                        </span>
                        @if($value)
                        <span class="ml-auto shrink-0">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            {{-- Raw OCR Output (collapsible) --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden"
                 x-data="{ open: false }">
                <button
                    type="button"
                    class="w-full flex items-center justify-between px-6 py-4 text-left hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors"
                    @click="open = !open"
                >
                    <span class="text-sm font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Raw OCR Output</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6">
                        <pre class="bg-gray-900 dark:bg-gray-950 text-green-400 text-xs rounded-xl p-4 overflow-auto max-h-80 leading-relaxed font-mono whitespace-pre-wrap">{{ $fullText }}</pre>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 justify-end pb-6">
                <a href="{{ route('pds.index') }}"
                   class="px-5 py-2.5 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Scan Another
                </a>
                <button
                    onclick="window.print()"
                    class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors">
                    Print / Export
                </button>
            </div>

        </div>
    </div>

</main>
</x-app-layout>