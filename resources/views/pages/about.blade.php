<!-- Hero Banner -->

@extends('layouts.users')
@section('title')
About Page
@endsection

@section('styles')
<style>
    #about {
        background: url("asset/images/slide-5.jpg") no-repeat center center/cover;
        min-height: 40vh;
    }

    #about h1 {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-size: 3rem;
        /* Larger font size */
        letter-spacing: -1px;
        /* Slightly tighter letter spacing */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        /* Subtle text shadow */
        margin-top: 25vh;
    }

    .highlight-card {
        background: #fff;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transform: translate(-30%, -50%);
        text-align: center;
        border-radius: 10px;
    }

    .icon {
        width: 40px;
        height: 40px;
        background: #fceeea;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 20px;
        margin-right: 10px;
    }
</style>
@endsection

@section('pageTitle')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row" id="about">
        <div class="col ">
            <h1 class="text-white fw-bold ms-md-5 ms-2 ">About Us</h1>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center">
        <!-- Left Side -->
        <div class="col-md-6">
            <p class="text-uppercase text-warning fw-bold small">About Us</p>
            <h2 class="fw-bold mb-4">Best wind solutions and <br> renewable energy storage solutions</h2>

            <div class="d-flex align-items-start mb-4">
                <div class="icon text-warning">👤</div>
                <div>
                    <h6 class="fw-bold">Our Mission</h6>
                    <p class="text-muted small">An ideal mix of involvement and skill to further our focus on technology. advancement.</p>
                </div>
            </div>

            <div class="d-flex align-items-start mb-4">
                <div class="icon text-warning">🌿</div>
                <div>
                    <h6 class="fw-bold">Our Vision</h6>
                    <p class="text-muted small">An ideal mix of involvement and skill to further our focus on technology. advancement.</p>
                </div>
            </div>

            <a href="#" class="btn btn-success px-4">Read More</a>
        </div>

        <!-- Right Side -->
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="solar" class="img-fluid rounded">
        </div>
    </div>
</div>
@endsection

<!-- banner section -->