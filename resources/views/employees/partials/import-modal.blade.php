<div id="import-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
        <h3 class="text-lg font-bold text-gray-800 mb-1">Import Employees</h3>
        <p class="text-sm text-gray-500 mb-4">Upload a PDS Excel file (.xlsx / .xlsm). All sheets will be imported at once.</p>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Excel File</label>
                <input type="file" name="file" accept=".xlsx,.xlsm,.xls"
                    class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg p-2 cursor-pointer focus:outline-none">
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" id="close-import-modal"
                    class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                    Import
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('import-btn').addEventListener('click', () => {
        document.getElementById('import-modal').classList.remove('hidden');
    });
    document.getElementById('close-import-modal').addEventListener('click', () => {
        document.getElementById('import-modal').classList.add('hidden');
    });
</script>