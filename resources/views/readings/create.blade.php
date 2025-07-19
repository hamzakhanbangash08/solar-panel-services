@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Add Reading for Panel: {{ $panel->serial_number }}</h2>

    <form action="{{ route('readings.store', $panel->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="reading_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Energy (kWh)</label>
            <input type="number" step="0.01" name="energy_kwh" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Reading</button>
    </form>
</div>
@endsection