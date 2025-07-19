@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #f38734;
        --secondary-color: #fdfdfd;
        --text-color: #333;
        --font-family: 'Segoe UI', sans-serif;
        --border-radius: 8px;
    }

    body {
        background-color: var(--secondary-color);
        color: var(--text-color);
        font-family: var(--font-family);
    }

    .login-box {
        max-width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 40px 30px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .login-box h2 {
        font-size: 32px;
        text-align: center;
        margin-bottom: 10px;
    }

    .login-box p {
        text-align: center;
        font-size: 14px;
        color: #666;
    }

    .login-box p a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-footer a {
        font-size: 13px;
        color: var(--primary-color);
        text-decoration: none;
    }

    .btn-login {
        background-color: var(--primary-color);
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 5px;
        width: 100%;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-login:hover {
        background-color: var(--primary-color);
    }
</style>

<div class="login-box py-3">
    <h2>Login</h2>
    <p>Don’t have an account? <a href="{{ route('register') }}">Create a free account</a></p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Enter username</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus placeholder="Enter Username">
        </div>

        <div class="form-group my-2">
            <div class="form-footer">
                <label class="form-label my-2" for="password">Enter Password</label>
                <a href="{{ route('password.request') }}">Forget password?</a>
            </div>
            <input id="password" type="password" name="password" class="form-control" required placeholder="Enter Password">
        </div>

        <button type="submit" class="btn-login my-5">Login</button>
    </form>
</div>
@endsection