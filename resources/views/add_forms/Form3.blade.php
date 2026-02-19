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
      <h2 class="text-xl font-bold text-green-800 uppercase tracking-wide">Educational Background</h2>
      <p class="text-sm text-gray-500 mt-1">Provide details regarding educational background.</p>
    </div>

    <form>
      <!-- Reusable section template via JS -->
      <div id="edu-sections" class="space-y-6"></div>

      <!-- Next Button -->
      <div class="flex justify-center mt-8">
        <button type="submit"
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
  const sections = [
    "Elementary",
    "Secondary",
    "Vocational / Trade Course",
    "College",
    "Graduate Studies"
  ];

  const container = document.getElementById('edu-sections');

  sections.forEach(title => {
    const section = document.createElement('div');
    section.innerHTML = `
      <div class="mb-1">
        <p class="text-sm font-bold text-gray-800 uppercase tracking-wide">${title}:</p>
      </div>
      <div class="grid grid-cols-3 gap-x-4 gap-y-3">
        <!-- Row 1 -->
        <div>
          <label>Name of School</label>
          <input type="text">
        </div>
        <div>
          <label>Basic Education Degree/Course</label>
          <input type="text">
        </div>
        <div>
          <label>Period of Attendance</label>
          <div class="flex gap-2 items-center mt-1">
            <span class="text-xs text-gray-500">From</span>
            <input type="text" class="w-16" placeholder="yyyy">
            <span class="text-xs text-gray-500">To</span>
            <input type="text" class="w-16" placeholder="yyyy">
          </div>
        </div>

        <!-- Row 2 -->
        <div>
          <label>Highest Level/Units Earned</label>
          <input type="text">
        </div>
        <div>
          <label>Year Graduated</label>
          <input type="text">
        </div>
        <div>
          <label>Scholarship / Academic Honors Received</label>
          <input type="text">
        </div>
      </div>
      <div class="border-b border-gray-200 mt-4"></div>
    `;
    container.appendChild(section);
  });
</script>
    
 <style>
input[type="text"], input[type="date"] {
  border: 1px solid #d1d5db;       /* all 4 sides */
  border-radius: 3px;               /* slight rounding */
  outline: none;
  background: transparent;
  width: 100%;
  font-size: 0.75rem;
  padding: 4px 6px;                 /* inner spacing */
}
input[type="text"]:focus, input[type="date"]:focus {
  border-color: #166534;            /* green on focus */
}
label {
  font-size: 0.65rem;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  display: block;
  margin-bottom: 2px;
}
  </style>
    
    <!-- Chart.js Initialization -->
 
</body>

</html>