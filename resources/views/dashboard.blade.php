@extends('layouts.app')

@section('header', 'Dashboard')

@section('body')
    <div class="mt-5">
        <div class="row">
            <div class="col-md-4 bg-white">
                <h3>Area Chart</h3>
                <canvas id="area-chart"></canvas>
            </div>
            <div class="col-md-4 bg-white">
                <h3>Donut Chart</h3>
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
                                <h3 class="h5">Total Peminjaman</h3>
                                <p class="h6">25</p>
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




    <!-- Custom JS for Charts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const areaChart = document.getElementById("area-chart");
            const donutChart = document.getElementById("donut-chart");

            // Area Chart Configuration
            const areaChartConfig = {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    datasets: [{
                        label: "User Growth",
                        data: [10, 20, 30, 40, 50, 60],
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
                    labels: ["Angkutan Barang", "Angkutan Orang"],
                    datasets: [{
                        data: [300, 50, ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)'
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
                            case "Angkutan Barang":
                                return 300;
                            case "Angkutan Orang":
                                return 50;
                            default:
                                return 0;
                        }
                    });

                    // Re-render the chart with the new data
                    new Chart(donutChart, donutChartConfig);
                });
            });
        });
    </script>
@endsection
