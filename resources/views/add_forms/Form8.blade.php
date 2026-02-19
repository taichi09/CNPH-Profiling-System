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
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow p-8">
      <div class="mb-6 pb-3 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-900 uppercase tracking-wide">Department &amp; Job Status</h2>
        <p class="text-sm text-gray-500 mt-1">Assign employee to Department and select job status.</p>
      </div>
      <form>
        <div class="flex flex-col items-center gap-6 py-10">
          <!-- Departments -->
          <div class="w-48 text-center">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Departments</label>
            <p class="text-xs text-gray-400 mb-2">Please select Department</p>
            <select class="w-full border border-gray-300 focus:border-green-700 outline-none py-2 px-3 text-sm rounded-sm bg-white">
              <option value="" disabled selected></option>
              <option>Human Resources</option>
              <option>Finance</option>
              <option>Operations</option>
              <option>Information Technology</option>
              <option>Legal</option>
            </select>
          </div>
          <!-- Job Status -->
          <div class="w-48 text-center">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Job Status</label>
            <p class="text-xs text-gray-400 mb-2">Please select Job Status</p>
            <select class="w-full border border-green-700 focus:border-green-700 outline-none py-2 px-3 text-sm rounded-sm bg-white">
              <option value="" disabled selected></option>
              <option>Regular</option>
              <option>Probationary</option>
              <option>Contractual</option>
              <option>Part-time</option>
            </select>
          </div>
          <!-- Dashed divider with asterisk -->
          <div class="flex items-center w-48 gap-2 my-2">
            
          </div>
        </div>
        <div class="flex justify-center mt-4">
          <button type="submit" class="text-white font-semibold px-10 py-2 rounded-full text-sm tracking-widest uppercase" style="background-color: #166534;">
            Confirm
          </button>
        </div>
      </form>
    </div>
  </main>

  <script>
    function getRowHTML() {
      return `
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pb-3 pr-1">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pb-3 text-center text-gray-400 font-bold">—</td>
        <td class="pb-3 pr-6 pl-1">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="number" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pb-3 text-center">
          <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
        </td>
      `;
    }

    function addRow() {
      const tbody = document.getElementById('ld-list');
      const row = document.createElement('tr');
      row.className = 'ld-row';
      row.innerHTML = getRowHTML();
      tbody.appendChild(row);
    }

    function removeRow(btn) {
      const rows = document.querySelectorAll('.ld-row');
      if (rows.length > 1) {
        btn.closest('.ld-row').remove();
      }
    }
  </script>
 
</body>

</html>