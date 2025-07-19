@extends('layouts.users')
@section('title', 'My Profile')

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .profile-card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        background: #fff;
        padding: 30px;
    }

    .profile-info p {
        margin-bottom: 0.6rem;
        font-size: 15px;
    }

    .profile-img {
        width: 120px;
        border-radius: 50%;
        border: 3px solid #e2e6ea;
        margin-top: 10px;
    }

    .form-section {
        margin-top: 40px;
    }

    .form-section h5 {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 8px;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #f38734;
        border-color: #f38734;
    }

    .btn-primary:hover {
        background-color: #dd6e1b;
        border-color: #dd6e1b;
    }

    .navbar .dropdown-toggle img {
        transition: 0.3s ease-in-out;
    }

    .navbar .dropdown-toggle:hover img {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="profile-card">
                <h3 class="text-center mb-4">Welcome, {{ Auth::user()->name }}</h3>

                <div class="profile-info">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>DOB:</strong> {{ Auth::user()->dob }}</p>
                    <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                    <p><strong>City:</strong> {{ Auth::user()->city }}</p>
                    <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                    @if (Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" class="profile-img">
                    @endif
                </div>

                <div class="form-section">
                    <h5>Change Password</h5>

                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('user.updatePassword') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                            @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection