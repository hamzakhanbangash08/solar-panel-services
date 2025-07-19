@extends('layouts.master')

@section('title', 'Solar Panels')

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Solar Panel</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->
    <div class="ms-auto">

        <a href="{{ route('panels.create') }}" class="text-decoration-none addtocart rounded p-1 text-white">Create Panel</a>
    </div>
</nav>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered table-striped">
                <thead class="table-secondary">
                    <tr>
                        <th>Name</th>
                        <th>Serial Number</th>
                        <th>Contact</th>
                        <th>Price</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Capacity (kW)</th>
                        <th>Image</th>
                        <!-- <th>Add Reading</th>
            <th>View Readings</th> -->
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panels as $panel)
                    <tr>
                        <td>{{ $panel->name }}</td>
                        <td>{{ $panel->serial_number }}</td>
                        <td>{{ $panel->contact}}</td>
                        <td>{{ $panel->price }}</td>
                        <td>{{ $panel->company }}</td>
                        <td>{{ $panel->location }}</td>
                        <td>{{ $panel->capacity_kw }} kW</td>
                        <td>
                            @if($panel->image)
                            <img src="{{ asset('storage/' . $panel->image) }}" alt="Panel Image" class="img-thumbnail" style="max-width: 50px;">
                            @else
                            No Image
                            @endif
                            <!-- <td>
                <a href="{{ route('readings.create', $panel->id) }}" class="btn btn-primary btn-sm">
                    Add Reading
                </a>
            </td>
            <td>
                <a href="{{ route('readings.index', $panel->id) }}" class="btn btn-info btn-sm">
                    View Readings
                </a>
            </td> -->
                        <td>
                            <a href="{{ route('panels.edit', $panel->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('panels.destroy', $panel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this panel?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection