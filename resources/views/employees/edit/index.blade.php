<x-app-layout>
    <main class="sm:ml-72 p-8">
        <div class="max-w-7xl mx-auto">

            {{-- Stepper --}}
            <div class="flex items-stretch mb-8 rounded-xl border border-gray-200 shadow-sm overflow-x-auto">

                @php
                    $steps = [
                        1 => 'Personal Information',
                        2 => 'Family Background',
                        3 => 'Educational Background',
                        4 => 'Civil Service Eligibility',
                        5 => 'Work Experience',
                        6 => 'Voluntary Work',
                        7 => 'Learning & Development',
                        8 => 'Other Information',
                    ];
                @endphp

                @foreach($steps as $stepNumber => $stepLabel)
                    @php
                        $isCompleted = $currentStep > $stepNumber;
                        $isActive = $currentStep === $stepNumber;
                    @endphp

                    <div class="relative flex-1 flex items-center gap-2 px-2 py-3
                        {{ $isCompleted ? 'bg-green-700' : ($isActive ? 'bg-white border-t-4 border-t-green-700' : 'bg-white') }}">

                        {{-- Circle / Checkmark --}}
                        <div class="shrink-0 w-6 h-6 rounded-full border-2 flex items-center justify-center font-bold text-xs
                            {{ $isCompleted ? 'bg-white border-white text-green-700' : ($isActive ? 'border-green-700 text-green-700' : 'border-gray-300 text-gray-400') }}">
                            @if($isCompleted)
                                <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            @else
                                {{ str_pad($stepNumber, 2, '0', STR_PAD_LEFT) }}
                            @endif
                        </div>

                        {{-- Label --}}
                        <span class="text-[10px] font-semibold uppercase tracking-wide leading-tight
                            {{ $isCompleted ? 'text-white' : ($isActive ? 'text-green-700' : 'text-gray-400') }}">
                            {{ $stepLabel }}
                        </span>
                    </div>
                @endforeach
            </div>

            {{-- Toast Notification --}}
            @if(session('success'))
                <div id="toast"
                    class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-green-700 text-white text-sm font-medium px-5 py-3 rounded-lg shadow-lg transition-opacity duration-500">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function () {
                        const toast = document.getElementById('toast');
                        if (toast) {
                            toast.style.opacity = '0';
                            setTimeout(() => toast.remove(), 500);
                        }
                    }, 3000);
                </script>
            @endif

            {{-- Step Content --}}
            @include('employees.edit.steps.step-' . $currentStep, ['employee' => $employee])

        </div>
    </main>
</x-app-layout>