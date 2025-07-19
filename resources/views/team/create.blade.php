@extends('layouts.master')

@section('title', 'Create Team Member')

@section('pageTitle')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Add New Member</h4>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    :root {
        --primary-color: #ff6b3d;
        --secondary-color: #f8f9fa;
        --text-dark: #343a40;
        --border-radius: 12px;
    }

    body {
        background-color: var(--secondary-color);
        font-family: 'Roboto', sans-serif;
    }

    .team-form {
        background: white;
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .team-form h2 {
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 61, 0.25);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
    }

    .btn-primary:hover {
        background-color: #e65a2e;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data" class="team-form">
                @csrf

                <div class="d-flex">

                    <a href="{{ route('panels.index') }}" class="text-decoration-none addtocart rounded px-2 pt-2 text-white">Go To Panel</a>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" required>
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" id="designation" name="designation" class="form-control" placeholder="Ex: Developer, Designer" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>

                <button type="submit" class="addtocart border-0 rounded p-2 text-white w-100">Create Team Member</button>
            </form>
        </div>
    </div>
</div>
@endsection