<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    


<main class="sm:ml-72 p-8">
    <div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-8">

      <!-- Header (no underline) -->
      <div class="mb-6 pb-3">
        <h2 class="text-xl font-bold text-green-800 uppercase tracking-wide">Civil Service Eligibility</h2>
        <p class="text-sm text-gray-500 mt-1">Provide details regarding civil service eligibility.</p>
      </div>

      <form>
        <div class="w-full">
          <!-- Table Header -->
          <div class="grid grid-cols-12 gap-x-6 mb-2 text-xs font-bold text-gray-700 uppercase tracking-wide">
            <div class="col-span-4">Career Service/RA 1080 (Board/Bar) Under Special Laws/Category II/IV Eligibility and Eligibilities for Uniformed Personnel</div>
            <div class="col-span-1 text-center">Rating</div>
            <div class="col-span-2 text-center">Date of Examination</div>
            <div class="col-span-2 text-center">Place of Examination</div>
            <div class="col-span-2 text-center">License</div>
            <div class="col-span-1"></div>
          </div>

          <!-- Sub-header for License columns -->
          <div class="grid grid-cols-12 gap-x-6 mb-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">
            <div class="col-span-4"></div>
            <div class="col-span-1"></div>
            <div class="col-span-2"></div>
            <div class="col-span-2"></div>
            <div class="col-span-1 text-center">License No.</div>
            <div class="col-span-1 text-center">Valid Until</div>
            <div class="col-span-1"></div>
          </div>

          <!-- Rows -->
          <div id="eligibility-list" class="space-y-3">
            <div class="grid grid-cols-12 gap-x-6 items-center eligibility-row">
              <div class="col-span-4">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
              </div>
              <div class="col-span-1">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm text-center" />
              </div>
              <div class="col-span-2">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
              </div>
              <div class="col-span-2">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
              </div>
              <div class="col-span-1">
                <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
              </div>
              <div class="col-span-1">
                <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
              </div>
              <div class="col-span-1 flex justify-center">
                <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
              </div>
            </div>
          </div>

          <!-- Add Another Button -->
          <div class="flex justify-center mt-6">
            <button
              type="button"
              onclick="addRow()"
              class="border border-gray-400 text-gray-600 hover:border-green-700 hover:text-green-700 px-6 py-2 rounded-full text-sm font-semibold tracking-wide transition-colors duration-200">
              + Add another
            </button>
          </div>
        </div>

        <!-- Next Button -->
        <div class="flex justify-center mt-8">
          <button
            type="submit"
            class="text-white font-semibold px-10 py-2 rounded-full text-sm tracking-widest uppercase transition-colors duration-200"
            style="background-color: #166534;">
            Next &rsaquo;
          </button>
        </div>
      </form>
    </div>
  </main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
    
 <script>
    function addRow() {
      const list = document.getElementById('eligibility-list');
      const row = document.createElement('div');
      row.className = 'grid grid-cols-12 gap-x-6 items-center eligibility-row';
      row.innerHTML = `
        <div class="col-span-4">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </div>
        <div class="col-span-1">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm text-center" />
        </div>
        <div class="col-span-2">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </div>
        <div class="col-span-2">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </div>
        <div class="col-span-1">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </div>
        <div class="col-span-1">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </div>
        <div class="col-span-1 flex justify-center">
          <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
        </div>
      `;
      list.appendChild(row);
    }

    function removeRow(btn) {
      const rows = document.querySelectorAll('.eligibility-row');
      if (rows.length > 1) {
        btn.closest('.eligibility-row').remove();
      }
    }
  </script>
    
    <!-- Chart.js Initialization -->
 
</body>

</html>