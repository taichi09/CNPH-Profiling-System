<div class="lg:col-span-2 bg-white rounded-lg shadow p-6 min-h-[450px]">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Employees by Department</h2>
    
    <!-- Chart.js Canvas -->
    <div class="relative" style="height: 350px;">
        <canvas id="departmentChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
    
<!-- Chart.js Initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('departmentChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($departmentLabels) !!},
            datasets: [{
                data: {!! json_encode($departmentCounts) !!},
                backgroundColor: ['#0d9488','#0891b2','#7c3aed','#db2777','#d97706','#16a34a'],
                borderRadius: 6,
                barThickness: 24
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.06)' } },
                y: { grid: { display: false } }
            }
        }
    });
});
</script>