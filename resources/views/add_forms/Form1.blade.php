<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    
<main class="sm:ml-72 p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-8">
        <!-- Header -->
        <div class="mb-6 border-b pb-3">
            <h2 class="text-xl font-bold text-green-800 uppercase tracking-wide">Personal Information</h2>
            <p class="text-sm text-gray-500 mt-1">Provide the needed personal information.</p>
        </div>

        <form>
            <div class="flex gap-8">
                <!-- Left Column -->
                <div class="flex-1 space-y-3">
                    <!-- Surname -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Surname</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- First Name -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">First Name</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Last Name -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Last Name</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Place of Birth -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Place of Birth</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Civil Status -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Civil Status</label>
                        <select class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                            <option value=""></option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Separated</option>
                        </select>
                    </div>
                    <!-- Height -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Height</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Weight -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Weight</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Blood Type -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Blood Type</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- UMID ID No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">UMID ID No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Pag-IBIG ID No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Pag-IBIG ID No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- PhilHealth No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">PhilHealth No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- PhilSys No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">PhilSys No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- TIN No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">TIN No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>
                    <!-- Agency Employee No. -->
                    <div class="flex items-center">
                        <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Agency Employee No.</label>
                        <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                    </div>

                    <!-- Contact Info (moved here) -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Telephone No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Mobile No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Email</label>
                            <input type="email" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="flex-1 space-y-5">
                    <!-- Citizenship -->
                    <div>
                        <select class="w-full border border-gray-400 rounded focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent">
                            <option value="">CITIZENSHIP</option>
                            <option>Filipino</option>
                            <option>Dual Citizen</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <!-- Residential Address -->
                    <div>
                        <p class="text-sm font-bold text-gray-800 uppercase mb-2">Residential Address:</p>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">House/Block/Lot No.</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Street</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Subdivision/Village</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Barangay</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">City/Municipality</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Province</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Zip Code</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Permanent Address -->
                    <div>
                        <p class="text-sm font-bold text-gray-800 uppercase mb-2">Permanent Address:</p>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">House/Block/Lot No.</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Street</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Subdivision/Village</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Barangay</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">City/Municipality</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Province</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-0.5">Zip Code</label>
                                <input type="text" class="w-full border-b border-gray-400 focus:border-green-700 outline-none py-1 text-sm bg-transparent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Button -->
            <div class="flex justify-center mt-8">
                <button 
                    type="submit"
                    class="bg-green-800 text-white hover:bg-green-700 font-semibold px-10 py-2 rounded-full text-sm tracking-widest uppercase transition-colors duration-200"
                    style="background-color: #166534; color: #ffffff;">
                    Next &rsaquo;
                </button>
            </div>
        </form>
    </div>
</main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
    
    <!-- Chart.js Initialization -->
 
</body>

</html>