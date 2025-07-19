@extends('layouts.users')

@section('title', 'Contact Us - Solar Panel Services')

@section('styles')
<style>
    #contact {
        background: url("asset/images/slide-5.jpg") no-repeat center center/cover;
        min-height: 40vh;
    }

    #contact h1 {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-size: 3rem;
        /* Larger font size */
        letter-spacing: -1px;
        /* Slightly tighter letter spacing */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        /* Subtle text shadow */
        margin-left: 2rem;
        /* Better left margin */
    }

    .contact-card {
        background-color: #fafafa;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
    }

    .contact-icon {
        font-size: 2rem;
        color: var(--bs-orange);
        margin-bottom: 15px;
    }

    .contact-title {
        font-weight: 600;
        color: #343a40;
        margin-bottom: 15px;
    }

    .contact-detail {
        color: #6c757d;
        margin-bottom: 5px;
    }

    .contact-detail a {
        color: #6c757d;
        text-decoration: none;
        transition: color 0.3s;
    }

    .contact-detail a:hover {
        color: #6e48aa;
    }

    .contact-title {
        color: #ff7f2a;
        font-weight: 600;
        font-size: 14px;
    }

    .contact-heading {
        font-weight: bold;
        font-size: 32px;
        color: #0d2235;
    }

    .form-control,
    .form-control:focus {
        border-radius: 0;
        box-shadow: none;
    }

    .btn-orange {
        background-color: #ff7f2a !important;
        color: white !important;
        border: none;
        padding: 10px 25px;
        border-radius: 0px;
    }

    .btn-orange:hover {
        background-color: var(--bs-orange) !important;

    }
</style>
@endsection
@section('pageTitle')
<div class="container-fluid">
    <div class="row" id="contact">
        <div class="col d-flex align-items-end">
            <h1 class="text-white fw-bold ms-md-4 ms-2 ">Contact Us</h1>
        </div>
    </div>
</div>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <!-- Phone Card -->
        <div class="col-md-4">
            <div class="contact-card h-100 text-center">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h5 class="">Phone</h5>
                <p class="contact-detail">(+92) 3369199190</p>
                <p class="contact-detail">(+92) 3379919919</p>
            </div>
        </div>

        <!-- Location Card -->
        <div class="col-md-4">
            <div class="contact-card h-100 text-center">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h5 class="">Location</h5>
                <p class="contact-detail">66 Guild Street 512B</p>
                <p class="contact-detail">Great North Town</p>
            </div>
        </div>

        <!-- Email Card -->
        <div class="col-md-4">
            <div class="contact-card h-100 text-center">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h5 class="">Email</h5>
                <p class="contact-detail">
                    <a href="mailto:example@youremail.com">hamzakhanbangash08@gmail.com</a>
                </p>
                <p class="contact-detail">
                    <a href="mailto:info@youremail.com">hamzaicp.com</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <!-- Left Image -->
        <div class="col-lg-6 mb-4 mb-md-0">
            <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Wind Turbine" class="img-fluid rounded">
        </div>

        <!-- Right Form -->
        <div class="col-lg-6 my-4">
            <p class="contact-title">SEND US MESSAGE</p>
            <h2 class="contact-heading">Contact With Us</h2>
            <span>Have a question or need support? Reach out to us below.</span>

            <form action="{{ route('contacted.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your name " required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your email " required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" name="subject" placeholder="Your subject " required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="tel" class="form-control" name="phone" placeholder="Your phone ">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control" rows="4" name="message" placeholder="Tell us a few words" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-orange rounded">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection