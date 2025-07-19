@extends('layouts.master')

@section('title', 'Add Solar Panel')

@section('pageTitle')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Add New Solar</h4>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    :root {
        --primary-color: #28a745;
        --secondary-color: #f8f9fa;
        --text-color: #343a40;
        --border-radius: 12px;
    }

    body {
        background-color: var(--secondary-color);
        font-family: 'Roboto', sans-serif;
    }

    .solar-form {
        background: white;
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .solar-form h2 {
        color: var(--text-color);
        margin-bottom: 1.5rem;
        text-align: center;
        font-weight: 700;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .alert-danger {
        border-radius: var(--border-radius);
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('panels.store') }}" method="POST" enctype="multipart/form-data" class="solar-form">
                @csrf

                <div class="d-flex ">
                    <a href="{{ route('panels.index') }}" class="text-decoration-none addtocart rounded px-2 pt-2 text-white">Go To Panel</a>
                </div>


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Panel Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter panel name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" placeholder="Unique serial number" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" name="price" class="form-control" placeholder="Panel price" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact" class="form-control" placeholder="Phone number" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Installation location" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company" class="form-control" placeholder="Company that built the panel" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (kW)</label>
                    <input type="number" step="0.01" name="capacity_kw" class="form-control" placeholder="Ex: 5.25" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button type="submit" class="addtocart border-0 rounded p-2 text-white w-100">Add Panel</button>
            </form>
        </div>
    </div>
</div>
@endsection