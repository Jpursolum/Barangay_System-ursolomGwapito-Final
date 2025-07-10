<x-filament::page>
    <div class="space-y-6">
        <!-- Page Title -->
        <h2 class="text-3xl font-bold text-gray-800 text-center">Demographic Statistics</h2>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Gender Distribution Pie Chart -->
            <div class="p-6 bg-white shadow-lg rounded-lg flex flex-col items-center">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Gender Distribution</h3>
                <canvas id="genderPieChart" class="w-full max-w-sm h-auto"></canvas>
            </div>

            <!-- Age Groups Distribution Pie Chart -->
            <div class="p-6 bg-white shadow-lg rounded-lg flex flex-col items-center">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Population by Age Groups</h3>
                <canvas id="ageGroupsPieChart" class="w-full max-w-sm h-auto"></canvas>
            </div>
        </div>

        <!-- Statistics Boxes -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Total Population -->
            <div class="p-6 bg-gray-100 shadow rounded-lg text-center hover:bg-gray-200 transition duration-300">
                <h4 class="text-lg font-medium text-gray-700">Total Population</h4>
                <p class="mt-2 text-2xl font-bold text-gray-900">{{ number_format($this->getDemographicData()['total_population']) }}</p>
            </div>

            <!-- Male Count -->
            <div class="p-6 bg-gray-100 shadow rounded-lg text-center hover:bg-gray-200 transition duration-300">
                <h4 class="text-lg font-medium text-gray-700">Male Count</h4>
                <p class="mt-2 text-2xl font-bold text-blue-600">{{ number_format($this->getDemographicData()['male_count']) }}</p>
            </div>

            <!-- Female Count -->
            <div class="p-6 bg-gray-100 shadow rounded-lg text-center hover:bg-gray-200 transition duration-300">
                <h4 class="text-lg font-medium text-gray-700">Female Count</h4>
                <p class="mt-2 text-2xl font-bold text-pink-600">{{ number_format($this->getDemographicData()['female_count']) }}</p>
            </div>

            <!-- Additional Demographics (Optional) -->
            <div class="p-6 bg-gray-100 shadow rounded-lg text-center hover:bg-gray-200 transition duration-300">
                <h4 class="text-lg font-medium text-gray-700">Other Demographics</h4>
                <p class="mt-2 text-2xl font-bold text-green-600">--</p>
            </div>
        </div>
    </div>

    <!-- Include Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch demographic data from PHP
        const demographicData = @json($this->getDemographicData());

        // Gender Pie Chart Configuration
        const genderCtx = document.getElementById('genderPieChart').getContext('2d');
        const genderPieChart = new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [demographicData.male_count, demographicData.female_count],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#4A5568'
                        }
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                let percentage = ((value / demographicData.total_population) * 100).toFixed(2) + '%';
                                return `${label}: ${value} (${percentage})`;
                            }
                        }
                    }
                }
            }
        });

        // Age Groups Pie Chart Configuration
        const ageGroupsCtx = document.getElementById('ageGroupsPieChart').getContext('2d');

        // Generate dynamic colors for age groups
        const ageGroups = demographicData.age_groups;
        const ageLabels = Object.keys(ageGroups);
        const ageValues = Object.values(ageGroups);
        const ageColors = ageLabels.map(() => '#' + Math.floor(Math.random()*16777215).toString(16));

        const ageGroupsPieChart = new Chart(ageGroupsCtx, {
            type: 'pie',
            data: {
                labels: ageLabels,
                datasets: [{
                    data: ageValues,
                    backgroundColor: ageColors,
                    borderColor: '#ffffff',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#4A5568'
                        }
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                let percentage = ((value / demographicData.total_population) * 100).toFixed(2) + '%';
                                return `${label}: ${value} (${percentage})`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-filament::page>
