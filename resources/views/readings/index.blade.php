@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Readings for Panel: {{ $panel->serial_number }}</h2>

    <a href="{{ route('readings.create', $panel->id) }}" class="btn btn-primary mb-3">Add New Reading</a>

    @if($readings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Energy Generated (kWh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($readings as $reading)
            <tr>
                <td>{{ $reading->reading_date }}</td>
                <td>{{ $reading->energy_kwh }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No readings recorded for this panel yet.</p>
    @endif
</div>
@endsection