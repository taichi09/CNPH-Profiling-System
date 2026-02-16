<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">

<!-- Preline CSS -->
<link href="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.css" rel="stylesheet">

<!-- Sidebar CSS -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<body>
    
</body>
</html>


<!-- Navigation Toggle -->
<div class="sm:hidden py-16 text-center">
    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-secondary border border-secondary-line text-secondary-foreground text-sm font-medium rounded-lg shadow-2xs hover:bg-secondary-hover focus:outline-hidden focus:bg-secondary-focus" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-sidebar-layout-splitter" aria-label="Toggle navigation" data-hs-overlay="#hs-sidebar-layout-splitter">
        Open
    </button>
</div>
<!-- End Navigation Toggle -->

<!-- Sidebar -->
<!-- Sidebar -->
<div id="hs-sidebar-layout-splitter"
  class="hs-overlay [--auto-close:sm] sm:block sm:translate-x-0
  w-64
  hs-overlay-open:translate-x-0
  -translate-x-full transition-all duration-300 transform
  h-full
  hidden
  fixed top-0 start-0 bottom-0 z-60
  bg-sidebar border-e border-sidebar-line"
  role="dialog"
  tabindex="-1"
  aria-label="Sidebar">

  <!-- Header -->
  <header class="p-4 flex justify-between items-center gap-x-2">
    <a class="font-semibold text-xl text-layer-foreground" href="#">Brand</a>

    <div class="sm:hidden -me-2">
      <button type="button"
        class="flex justify-center items-center size-6 bg-layer border border-layer-line rounded-full"
        data-hs-overlay="#hs-sidebar-layout-splitter">
        ✕
      </button>
    </div>
  </header>

  <!-- Body -->
  <nav class="h-full overflow-y-auto px-2">
    <ul class="space-y-1">
      <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-sidebar-nav-active text-sm text-sidebar-nav-foreground rounded-lg">
          Dashboard
        </a>
      </li>

      <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-sidebar-nav-foreground rounded-lg hover:bg-sidebar-nav-hover">
          Employee
        </a>
      </li>

      <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-sidebar-nav-foreground rounded-lg hover:bg-sidebar-nav-hover">
          Departments
        </a>
      </li>
    </ul>
  </nav>
</div>
<!-- End Sidebar -->

</div>
<!-- End Sidebar -->