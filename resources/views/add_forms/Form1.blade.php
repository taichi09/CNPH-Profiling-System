<x-app-layout>
    <main class="sm:ml-72 p-8">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-8">
            <!-- Header -->
            <div class="mb-6 border-b pb-4">
                <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Personal Information</h2>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide the needed personal information.</p>
            </div>

            <form>
                <div class="flex gap-8">
                    <!-- Left Column -->
                    <div class="flex-1 space-y-3">
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Surname</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">First Name</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Middle Name</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Place of Birth</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
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
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Height</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Weight</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Blood Type</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">UMID ID No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Pag-IBIG ID No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">PhilHealth No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">PhilSys No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">TIN No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>
                        <div class="flex items-center">
                            <label class="w-48 text-sm font-semibold text-gray-700 uppercase tracking-wide shrink-0">Agency Employee No.</label>
                            <input type="text" class="w-72 border border-gray-400 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                        </div>

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
                        class="text-white font-semibold px-10 py-2 rounded-full text-sm tracking-widest uppercase transition-colors duration-200"
                        style="background-color: #166534; color: #ffffff;">
                        Next &rsaquo;
                    </button>
                </div>
            </form>
        </div>
    </main>
        
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
</x-app-layout>
