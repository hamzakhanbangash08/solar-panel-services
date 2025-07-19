@extends('layouts.master')

@section('title', 'Edit Team Member')

@section('pageTitle')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Edit Member</h4>
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

    .team-form {
        background: white;
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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

    .img-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data" class="team-form">
                @csrf
                @method('PUT')

                <a href="{{ route('teams.index') }}" class="text-decoration-none addtocart rounded px-2 pt-2 text-white">← Back to Team</a>

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', $team->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" id="designation" name="designation" class="form-control"
                        value="{{ old('designation', $team->designation) }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label><br>
                    @if ($team->image)
                    <img src="{{ asset('storage/' . $team->image) }}" alt="Current Image" class="img-preview" width="250">
                    @endif
                    <input type="file" id="image" name="image" class="form-control">
                    <small class="text-muted">Leave blank if you don't want to change image.</small>
                </div>

                <button type="submit" class="addtocart border-0 rounded p-2 text-white w-100">Update Member</button>
            </form>
        </div>
    </div>
</div>
@endsection