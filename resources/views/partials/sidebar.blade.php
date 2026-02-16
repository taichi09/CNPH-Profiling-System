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
<div id="hs-sidebar-layout-splitter" class="hs-overlay [--auto-close:sm] sm:block sm:translate-x-0 sm:end-auto sm:bottom-0 w-64
hs-overlay-open:translate-x-0
-translate-x-full transition-all duration-300 transform
h-full
hidden
fixed top-0 start-0 bottom-0 z-60" role="dialog" tabindex="-1" aria-label="Sidebar" data-hs-layout-splitter='{
"horizontalSplitterTemplate": "<div><span class=\"absolute top-1/2 start-1/2 -translate-x-1/2 -translate-y-1/2 block w-4 h-6 flex justify-center items-center bg-layer border border-layer-line text-muted-foreground rounded-md cursor-grab hover:bg-muted-hover\"><svg class=\"shrink-0 size-3.5\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"9\" cy=\"12\" r=\"1\"/><circle cx=\"9\" cy=\"5\" r=\"1\"/><circle cx=\"9\" cy=\"19\" r=\"1\"/><circle cx=\"15\" cy=\"12\" r=\"1\"/><circle cx=\"15\" cy=\"5\" r=\"1\"/><circle cx=\"15\" cy=\"19\" r=\"1\"/></svg></span></div>",
"horizontalSplitterClasses": "pointer-events-auto relative flex"
}'>
    <div class="relative flex h-full max-h-full pointer-events-none" data-hs-layout-splitter-horizontal-group>
        <div class="pointer-events-auto bg-sidebar border-e border-sidebar-line" data-hs-layout-splitter-item='{
            "dynamicSize": 37.0,
            "minSize": 13.0,
            "preLimitSize": 25.0
        }' style="flex: 37 1 0px;">
            <!-- Header -->
            <header class="p-4 flex justify-between items-center gap-x-2">
                <a class="flex-none font-semibold text-xl text-layer-foreground focus:outline-hidden focus:opacity-80" href="#" aria-label="Brand">Brand</a>

                <div class="sm:hidden -me-2">
                    <!-- Close Button -->
                    <button type="button" class="flex justify-center items-center gap-x-3 size-6 bg-layer border border-layer-line text-sm text-muted-foreground-2 hover:bg-layer-hover rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus" data-hs-overlay="#hs-sidebar-layout-splitter">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <!-- End Close Button -->
                </div>
            </header>
            <!-- End Header -->

            <!-- Body -->
            <nav class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
                <div class="hs-accordion-group pb-0 px-2 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                    <ul class="space-y-1">
                        <li>
                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-sidebar-nav-active text-sm text-sidebar-nav-foreground rounded-lg hover:bg-sidebar-nav-hover focus:outline-hidden focus:bg-sidebar-nav-focus" href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-sidebar-nav-foreground rounded-lg hover:bg-sidebar-nav-hover focus:outline-hidden focus:bg-sidebar-nav-focus" href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                Employee
                            </a>
                        </li>

                        <li>
                            <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-sidebar-nav-foreground rounded-lg hover:bg-sidebar-nav-hover focus:outline-hidden focus:bg-sidebar-nav-focus" href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                Departments
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Body -->
        </div>
        <div class="overflow-hidden self-start" data-hs-layout-splitter-item="63.0" style="flex: 63 1 0px;"></div>
    </div>
</div>
<!-- End Sidebar -->