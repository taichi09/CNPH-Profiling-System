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
        
        const departmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['IT', 'HR', 'Finance', 'Sales', 'Marketing', 'Operations'],
                datasets: [{
                    label: 'Employees',
                    data: [45, 28, 85, 92, 62, 78],
                    backgroundColor: '#0d9488', // teal-600
                    borderRadius: 4,
                    barThickness: 50
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Employees: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 25
                        },
                        grid: {
                            display: true,
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>