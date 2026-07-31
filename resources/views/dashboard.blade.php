<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Total Assets</h3>
                    <p class="text-3xl font-bold">{{ $totalAssets }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Assignments</h3>
                    <p class="text-3xl font-bold">{{ $totalAssignments }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Tickets</h3>
                    <p class="text-3xl font-bold">{{ $totalTickets }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Maintenances</h3>
                    <p class="text-3xl font-bold">{{ $totalMaintenances }}</p>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-4">
                        Asset Status
                    </h3>

                    <canvas id="assetStatusChart"></canvas>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-4">
                        Assets by Category
                    </h3>

                    <canvas id="categoryChart"></canvas>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        new Chart(document.getElementById('assetStatusChart'), {
            type: 'pie',
            data: {
                labels: ['Available', 'Assigned', 'Maintenance', 'Retired'],
                datasets: [{
                    data: @json($assetStatus),
                    backgroundColor: [
                        '#22c55e',
                        '#3b82f6',
                        '#facc15',
                        '#ef4444'
                    ]
                }]
            }
        });

        new Chart(document.getElementById('categoryChart'), {
            type: 'bar',
            data: {
                labels: @json($categoryLabels),
                datasets: [{
                    label: 'Assets',
                    data: @json($categoryCounts),
                    backgroundColor: '#2563eb'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</x-app-layout>
