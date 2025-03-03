@extends('layouts.app')

@section('header', 'Dashboard')

@section('body')
    <div class="mt-5">
        <div class="container">
        <div class="row">
            <div class="col-md-4 bg-white">
                <h3>Reservation Chart</h3>
                <canvas id="area-chart"></canvas>
            </div>
            <div class="col-md-4 bg-white">
                <h3>Vehicle Chart</h3>
                <canvas id="donut-chart"></canvas>
                <div id="filters" class="mt-4">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-white shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light p-3 rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </div>
                            <div class="ml-3 text-dark">
                                <h3 class="h5">Total Reservations</h3>
                                <p class="h6">{{ $countReservation }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light p-3 rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </div>
                            <div class="ml-3 text-dark">
                                <h3 class="h5">Total Konsumsi BBM</h3>
                                <p class="h6">25</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Custom JS for Charts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const countVehicleReservation = @json($countVehicleReservation);

            // Debugging: Log the data to ensure it is being passed correctly
            console.log(countVehicleReservation);

            // Ensure data integrity
            if (Array.isArray(countVehicleReservation)) {
                const labels = countVehicleReservation.map(item => item.name);
                const data = countVehicleReservation.map(item => item.count);

                const areaChart = document.getElementById("area-chart");
                const donutChart = document.getElementById("donut-chart");

                // Area Chart Configuration
                const areaChartConfig = {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "Vehicle Reservations",
                            data: data,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
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
                };

                new Chart(areaChart, areaChartConfig);

                // Donut Chart Configuration
                const donutChartConfig = {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                };

                new Chart(donutChart, donutChartConfig);

                // Filter Checkboxes Logic
                const filters = document.querySelectorAll('#filters input[type="checkbox"]');
                filters.forEach(filter => {
                    filter.addEventListener('change', function() {
                        const checkedFilters = Array.from(filters)
                            .filter(checkbox => checkbox.checked)
                            .map(checkbox => checkbox.value);

                        // Update the donut chart data based on checked filters
                        donutChartConfig.data.labels = checkedFilters;
                        donutChartConfig.data.datasets[0].data = checkedFilters.map(filter => {
                            switch (filter) {
                                case "Goods Transportation":
                                    return 300;
                                case "Personal Transportation":
                                    return 50;
                                default:
                                    return 0;
                            }
                        });

                        // Re-render the chart with the new data
                        new Chart(donutChart, donutChartConfig);
                    });
                });
            } else {
                console.error("Invalid data structure for countVehicleReservation");
            }
        });
    </script>
@endsection
