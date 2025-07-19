@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->

</nav>
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container">

    {{-- Export buttons --}}
    <div class="row mt-2 mb-4">
        <div class="col-md-12">
            <a href="{{ route('readings.export.csv') }}" class="btn btn-outline-primary btn-sm">Export CSV</a>
            <a href="{{ route('readings.export.pdf') }}" class="btn btn-outline-danger btn-sm">Export PDF</a>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success shadow rounded-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-hammer display-6 me-3"></i>
                    <div>
                        <h5>Panels</h5>
                        <h3>{{ $panels }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow rounded-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people display-6 me-3"></i>
                    <div>
                        <h5>Users</h5>
                        <h3>{{ $users }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow rounded-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-graph-up display-6 me-3"></i>
                    <div>
                        <h5>Readings</h5>
                        <h3>{{ $readings }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Energy Chart --}}
    <!-- <div class="card mt-5 shadow">
        <div class="card-header bg-dark text-white">
            Energy Generation Chart
        </div>
        <div class="card-body">
            <canvas id="energyChart" height="100"></canvas>
        </div>
    </div> -->

    {{-- Recent Readings --}}
    <!-- <div class="card mt-5">
        <div class="card-header">Recent Readings</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Panel</th>
                        <th>Energy (kWh)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentReadings as $reading)
                    <tr>
                        <td>{{ $reading->panel->serial_number ?? 'N/A' }}</td>
                        <td>{{ $reading->energy_kwh }}</td>
                        <td>{{ $reading->reading_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('energyChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {
                !!json_encode($dates) !!
            },
            datasets: [{
                label: 'Energy (kWh)',
                data: {
                    !!json_encode($energyValues) !!
                },
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'kWh'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                }
            }
        }
    });
</script>
@endsection