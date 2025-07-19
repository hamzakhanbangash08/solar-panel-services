@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #f38734;
        --background-color: #f9f9f9;
        --card-bg: #fff;
        --input-border: #ddd;
        --text-color: #333;
        --input-padding: 12px;
        --border-radius: 8px;
        --box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        --font-family: 'Segoe UI', sans-serif;
    }

    body {
        background-color: var(--background-color);
        font-family: var(--font-family);
    }

    .auth-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 40vh;
        padding: 20px;
    }

    .auth-card {
        background-color: var(--card-bg);
        padding: 30px;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        width: 100%;
        max-width: 600px;
    }

    .auth-card h2 {
        text-align: center;
        margin-bottom: 20px;
        color: var(--text-color);
    }

    .auth-card label {
        font-weight: 600;
        color: var(--text-color);
    }

    .auth-card input {
        border: 1px solid var(--input-border);
        border-radius: var(--border-radius);
        padding: var(--input-padding);
        width: 100%;
        margin-bottom: 15px;
    }

    .auth-card .btn-primary {
        background-color: var(--primary-color);
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: var(--border-radius);
        font-weight: bold;
    }

    .auth-card .btn-primary:hover {
        background-color: var(--primary-color);
    }
</style>


<div class="auth-wrapper">
    <div class="auth-card">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <label for="name">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- DOB --}}
            <label for="dob">Date of Birth</label>
            <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required>
            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Profile Image --}}
            <label for="profile_image">Profile Image</label>
            <input id="profile_image" type="file" name="profile_image" required>
            @error('profile_image') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Phone --}}
            <label for="phone">Phone</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required>
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Address --}}
            <label for="address">Address</label>
            <input id="address" type="text" name="address" value="{{ old('address') }}" required>
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- City --}}
            <label for="city">City</label>
            <input id="city" type="text" name="city" value="{{ old('city') }}" required>
            @error('city') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Email --}}
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Password --}}
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror

            {{-- Confirm Password --}}
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
    </div>
</div>
@endsection