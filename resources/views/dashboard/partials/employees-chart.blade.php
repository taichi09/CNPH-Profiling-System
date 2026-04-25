<div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-1">Employees by Department</h2>

    <div id="dept-chart-wrap" style="position: relative; width: 100%; height: 380px;">
        <canvas id="departmentChart" role="img" aria-label="Vertical bar chart of employees by department">Employee counts by department.</canvas>
    </div>

    <button id="dept-toggle-btn" type="button"
        class="mt-3 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 bg-gray-100 hover:bg-gray-200 border border-gray-200 rounded-lg px-3 py-1.5 transition-colors">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        View all departments
    </button>
</div>

{{-- Modal --}}
<div id="dept-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 px-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] flex flex-col">

        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <div>
                <h3 class="text-base font-semibold text-gray-800">All Departments</h3>
                <p class="text-xs text-gray-500 mt-0.5">Sorted by headcount</p>
            </div>
            <button id="dept-modal-close" type="button"
                class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="overflow-y-auto px-6 py-4 flex-1">
            <div id="dept-modal-chart-wrap" style="position: relative; width: 100%;">
                <canvas id="departmentModalChart" role="img" aria-label="All departments employee count">All department counts.</canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
(function () {
    const ALL_LABELS = {!! json_encode($departmentLabels) !!};
    const ALL_COUNTS = {!! json_encode($departmentCounts) !!};

    const combined = ALL_LABELS.map((l, i) => ({ label: l, count: ALL_COUNTS[i] }));
    combined.sort((a, b) => b.count - a.count);

    const PALETTE = [
        '#0d9488','#0891b2','#7c3aed','#db2777','#d97706','#16a34a',
        '#e11d48','#2563eb','#9333ea','#0f766e','#b45309','#15803d',
        '#6d28d9','#0369a1','#b91c1c','#065f46','#92400e','#1d4ed8',
        '#7e22ce','#0e7490','#166534','#9a3412','#be185d','#1e3a5f',
        '#3b0764','#064e3b','#78350f'
    ];

    const DEFAULT_SHOW = 8;
    let mainChart = null;
    let modalChart = null;

    function shortLabel(label) {
        // Strip common prefixes
        const cleaned = label
            .replace(/^MEDICAL - /i, '')
            .replace(/^INTEGRATED HOSPITAL OPERATIONS & MANAGEMENT PROGRAM$/i, 'IHOMP')
            .replace(/^HUMAN RESOURCE MANAGEMENT OFFICE$/i, 'HRMO')
            .replace(/^QUALITY ASSURANCE UNIT$/i, 'QA')
            .trim();

        // Take first word only, then cap at 5 chars + ellipsis
        const firstWord = cleaned.split(/[\s\/\-]/)[0];
        return firstWord.length > 5
            ? firstWord.slice(0, 5) + '…'
            : firstWord;
    }

    /* ── Main chart (top 8, vertical, straight short labels) ── */
    function buildMainChart() {
        const slice = combined.slice(0, DEFAULT_SHOW);
        const labels = slice.map(d => shortLabel(d.label));
        const counts = slice.map(d => d.count);
        const colors = slice.map((_, i) => PALETTE[i % PALETTE.length]);

        if (mainChart) mainChart.destroy();

        mainChart = new Chart(document.getElementById('departmentChart'), {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    data: counts,
                    backgroundColor: colors,
                    borderRadius: 5,
                    barThickness: 48,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: { padding: { top: 20, bottom: 4, left: 4, right: 4 } },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: (items) => slice[items[0].dataIndex].label,
                            label: ctx => ' ' + ctx.parsed.y + ' employee' + (ctx.parsed.y !== 1 ? 's' : '')
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: {
                            font: { size: 12 },
                            color: '#374151',
                            maxRotation: 0,
                            minRotation: 0,
                            autoSkip: false,
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.06)' },
                        border: { display: false },
                        ticks: { font: { size: 12 }, color: '#6b7280' }
                    }
                }
            }
        });
    }

    /* ── Modal chart (all depts, horizontal, full names) ── */
    function buildModalChart() {
        if (modalChart) return;

        const labels = combined.map(d => d.label);
        const counts = combined.map(d => d.count);
        const colors = combined.map((_, i) => PALETTE[i % PALETTE.length]);

        const h = combined.length * 38 + 60;
        document.getElementById('dept-modal-chart-wrap').style.height = h + 'px';

        modalChart = new Chart(document.getElementById('departmentModalChart'), {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    data: counts,
                    backgroundColor: colors,
                    borderRadius: 4,
                    barThickness: 22,
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                layout: { padding: { right: 24, top: 8, bottom: 8 } },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ' ' + ctx.parsed.x + ' employee' + (ctx.parsed.x !== 1 ? 's' : '')
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.06)' },
                        border: { display: false },
                        ticks: { font: { size: 11 }, color: '#6b7280' }
                    },
                    y: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: {
                            font: { size: 12 },
                            color: '#374151',
                            crossAlign: 'far',
                        },
                        afterFit(axis) { axis.width = 230; }
                    }
                }
            }
        });
    }

    /* ── Modal open/close ── */
    document.getElementById('dept-toggle-btn').addEventListener('click', function () {
        document.getElementById('dept-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(buildModalChart, 50);
    });

    function closeModal() {
        document.getElementById('dept-modal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    document.getElementById('dept-modal-close').addEventListener('click', closeModal);
    document.getElementById('dept-modal').addEventListener('click', function (e) {
        if (e.target === this) closeModal();
    });

    buildMainChart();
})();
</script>