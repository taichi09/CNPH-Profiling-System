<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
      <style>
        *, *::before, *::after {
            font-family: 'Poppins', sans-serif;
        }
        /* Browsers don't inherit font into form elements by default — force it */
        input, select, textarea, button, label, option {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    

<main class="sm:ml-72 p-8">
  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-8">
    <!-- Header -->
    <div class="mb-6 border-b pb-3">
      <h2 style="font-family: 'Poppins', sans-serif; font-weight: 800; font-size: 1.5rem; color: #14532d; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Family Background</h2>
      <p style="font-family: 'Poppins', sans-serif; font-size: 0.8rem; color: #6b7280;">Provide the needed information of the family.</p>
    </div>

    <form>
      <div class="flex gap-8">
        <!-- Left Column: SPOUSE & FATHER -->
        <div class="flex-1 space-y-6">

          <!-- SPOUSE -->
          <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-3">Spouse:</p>
            <div class="space-y-3">
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Surname</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">First Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Middle Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Name Ext.</label>
                <select class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                  <option value=""></option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>II</option>
                  <option>III</option>
                </select>
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Occupation</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Employer/<br>Business Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Business Address</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Telephone No.</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
            </div>
          </div>

          <!-- FATHER -->
          <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-3">Father:</p>
            <div class="space-y-3">
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Surname</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">First Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Middle Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Name Ext.</label>
                <select class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                  <option value=""></option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>II</option>
                  <option>III</option>
                </select>
              </div>
            </div>
          </div>

        </div>

        <!-- Right Column: MOTHER & NAME OF CHILDREN -->
        <div class="flex-1 space-y-6">

          <!-- MOTHER -->
          <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-3">Mother:</p>
            <div class="space-y-3">
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Mother's Surname</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">First Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Middle Name</label>
                <input type="text" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex items-center">
                <label class="w-48 text-xs font-semibold text-gray-600 uppercase tracking-wide shrink-0">Name Ext.</label>
                <select class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                  <option value=""></option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>II</option>
                  <option>III</option>
                </select>
              </div>
            </div>
          </div>

          <!-- NAME OF CHILDREN -->
          <div>
            <p class="text-sm font-bold text-gray-800 uppercase mb-3">Name of Children/s:</p>
            <!-- Column headers -->
            <div class="flex gap-2 mb-1">
              <span class="flex-1 text-xs font-semibold text-gray-500 uppercase tracking-wide">Full Name</span>
              <span class="w-36 text-xs font-semibold text-gray-500 uppercase tracking-wide">Date of Birth</span>
            </div>
            <div class="space-y-3" id="children-list">
              <div class="flex gap-2 items-center">
                <input type="text" placeholder="Full Name" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                <input type="date" class="w-36 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex gap-2 items-center">
                <input type="text" placeholder="Full Name" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                <input type="date" class="w-36 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
              <div class="flex gap-2 items-center">
                <input type="text" placeholder="Full Name" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
                <input type="date" class="w-36 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
              </div>
            </div>
            <button type="button" onclick="addChild()" class="mt-2 text-xs text-green-700 hover:underline">+ Add Child</button>
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

<script>
function addChild() {
  const list = document.getElementById('children-list');
  const row = document.createElement('div');
  row.className = 'flex gap-2 items-center';
  row.innerHTML = `
    <input type="text" placeholder="Full Name" class="flex-1 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
    <input type="date" class="w-36 border border-gray-300 focus:border-green-700 outline-none py-1.5 px-2 text-sm bg-transparent rounded-sm">
  `;
  list.appendChild(row);
}
</script>
    
    <!-- Chart.js Initialization -->
 
</body>

</html>