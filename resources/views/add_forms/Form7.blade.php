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

      <!-- Header -->
      <div class="mb-6 pb-3">
        <h2 class="text-xl font-bold text-green-800 uppercase tracking-wide">Learning and Development (L&amp;D) Interventions/<br>Training Programs Attended</h2>
        <p class="text-sm text-gray-500 mt-1">Provide details regarding educational background.</p>
      </div>

      <form>
        <div class="w-full overflow-x-auto">
          <table class="w-full table-fixed text-sm">
            <colgroup>
              <col style="width: 28%">  <!-- Title -->
              <col style="width: 10%">  <!-- From -->
              <col style="width: 2%">   <!-- Dash -->
              <col style="width: 10%">  <!-- To -->
              <col style="width: 14%">  <!-- Number of Hours -->
              <col style="width: 18%">  <!-- Type of L&D -->
              <col style="width: 14%">  <!-- Conducted/Sponsored By -->
              <col style="width: 4%">   <!-- Remove -->
            </colgroup>
            <thead>
              <tr class="text-xs font-bold text-gray-700 uppercase tracking-wide align-top">
                <td class="pb-1 pr-6">
                  Title of Learning and Development Interventions/<br>Training Programs
                  <div class="font-normal normal-case text-gray-500">(Write in full)</div>
                </td>
                <td colspan="3" class="pb-1 pr-6">
                  Inclusive Dates of Attendance
                  <div class="font-normal normal-case text-gray-500">(dd/mm/yyyy)</div>
                </td>
                <td class="pb-1 pr-6">
                  Number of Hours
                </td>
                <td class="pb-1 pr-6">
                  Type of L&amp;D<br>
                  <span class="font-normal normal-case">(Managerial/<br>Supervisory/<br>Technical/etc)</span>
                </td>
                <td class="pb-1 pr-6">
                  Conducted/<br>Sponsored By
                  <div class="font-normal normal-case text-gray-500">(Write in full)</div>
                </td>
                <td></td>
              </tr>
              <tr class="text-xs text-gray-500">
                <td class="pb-2"></td>
                <td class="pb-2">From</td>
                <td></td>
                <td class="pb-2">To</td>
                <td colspan="4"></td>
              </tr>
            </thead>
            <tbody id="ld-list">
              <tr class="ld-row">
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