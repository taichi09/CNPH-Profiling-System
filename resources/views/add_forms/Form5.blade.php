<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
      *, *::before, *::after {
    font-family: 'Montserrat', sans-serif;
}
input, select, textarea, button, label, option {
    font-family: 'Montserrat', sans-serif !important;
}
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    


 <main class="sm:ml-72 p-8">
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow p-8">

      <!-- Header -->
      <div class="mb-6 pb-3">
        <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Work Experience</h2>
         <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide details regarding past work experience.</p>
      </div>

      <form>
        <div class="w-full overflow-x-auto">
          <table class="w-full table-fixed text-sm">
            <colgroup>
              <col style="width: 9%">   <!-- From -->
              <col style="width: 2%">   <!-- Dash -->
              <col style="width: 9%">   <!-- To -->
              <col style="width: 18%">  <!-- Position Title -->
              <col style="width: 24%">  <!-- Department -->
              <col style="width: 18%">  <!-- Status of Appointment -->
              <col style="width: 12%">  <!-- Govt Service -->
              <col style="width: 8%">   <!-- Remove -->
            </colgroup>
            <thead>
              <tr class="text-xs font-bold text-gray-700 uppercase tracking-wide align-top">
                <td colspan="3" class="pb-1 pr-6">
                  Inclusive Dates
                  <div class="font-normal normal-case text-gray-500">(DD/MM/YYYY)</div>
                </td>
                <td class="pb-1 pr-6">
                  Position Title
                  <div class="font-normal normal-case text-gray-500">(Write in full/Do not abbreviate)</div>
                </td>
                <td class="pb-1 pr-6">
                  Department/Agency/Office/
                  Company
                  <div class="font-normal normal-case text-gray-500">(Write in full/Do not abbreviate)</div>
                </td>
                <td class="pb-1 pr-6">
                  Status of Appointment
                </td>
                <td class="pb-1 pr-6">
                  Govt Service (Y/N)
                </td>
                <td></td>
              </tr>
              <tr class="text-xs text-gray-500">
                <td class="pb-2">From</td>
                <td></td>
                <td class="pb-2">To</td>
                <td colspan="5"></td>
              </tr>
            </thead>
            <tbody id="work-list">
              <tr class="work-row">
                <td class="pb-3 pr-1">
                  <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pb-3 text-center text-gray-400 font-bold">—</td>
                <td class="pb-3 pr-6 pl-1">
                  <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                  <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                  <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                  <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
                </td>
                <td class="pr-6 pb-3">
                  <select class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm bg-transparent">
                    <option value=""></option>
                    <option value="y">Y</option>
                    <option value="n">N</option>
                  </select>
                </td>
                <td class="pb-3 text-center">
                  <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
                </td>
              </tr>
            </tbody>
          </table>

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

  <script>
    function getRowHTML() {
      return `
        <td class="pb-3 pr-1">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pb-3 text-center text-gray-400 font-bold">—</td>
        <td class="pb-3 pr-6 pl-1">
          <input type="date" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <input type="text" class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm" />
        </td>
        <td class="pr-6 pb-3">
          <select class="w-full border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm rounded-sm bg-transparent">
            <option value=""></option>
            <option value="y">Y</option>
            <option value="n">N</option>
          </select>
        </td>
        <td class="pb-3 text-center">
          <button type="button" onclick="removeRow(this)" class="text-red-400 hover:text-red-600 text-lg font-bold leading-none">&times;</button>
        </td>
      `;
    }

    function addRow() {
      const tbody = document.getElementById('work-list');
      const row = document.createElement('tr');
      row.className = 'work-row';
      row.innerHTML = getRowHTML();
      tbody.appendChild(row);
    }

    function removeRow(btn) {
      const rows = document.querySelectorAll('.work-row');
      if (rows.length > 1) {
        btn.closest('.work-row').remove();
      }
    }
  </script>
 
</body>

</html>