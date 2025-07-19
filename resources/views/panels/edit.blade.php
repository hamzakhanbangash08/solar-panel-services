@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Solar Panel</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('panels.update', $panel->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $panel->name) }}" required>

        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control" value="{{ old('name', $panel->serial_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company Name</label>
            <input type="text" name="company" class="form-control" value="{{ old('company', $panel->company) }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $panel->location) }}">
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity (kW)</label>
            <input type="number" step="0.01" name="capacity_kw" class="form-control" value="{{ old('capacity', $panel->capacity_kw) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($panel->image)
            <img src="{{ asset('storage/' . $panel->image) }}" alt="Panel Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif

            <button type="submit" class="btn btn-primary">Update Panel</button>
            <a href="{{ route('panels.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection