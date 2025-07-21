@extends('layouts.users')

@section('title', 'Home - Solar Panel Services')


@section('styles')
<style>
    .team-card {
        transition: 0.3s;
        background-color: #fff;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .social-links a {
        color: #555;
        font-size: 18px;
    }

    .social-links a:hover {
        color: #0d6efd;
    }
</style>
@endsection
@section('content') {{-- ✅ Use 'content' not 'userContent' --}}


<!--  -->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

        <div class="carousel-item active" style="background-image: url('{{ asset('asset/images/slide-01.jpg') }}');" data-bs-interval="5000">
            <div class="carousel-caption text-center">
                <p>We lead the innovation in renewable power for a greener tomorrow.</p>
                <h1>Biggest Producer of Wind and Solar Energy</h1>
                <a href="#" class="btn">Get Started</a>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('{{ asset('asset/images/slide-04.jpg') }}');" data-bs-interval="5000">
            <div class="carousel-caption text-center">
                <p>Powering cities and communities with sustainable solutions.</p>
                <h1>Manageable, Reliable and Affordable Energy!</h1>
                <a href="#" class="btn">Get Start</a>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('{{ asset('asset/images/slide-5.jpg') }}');">
            <div class="carousel-caption text-center">
                <p>Join the movement towards a cleaner, energy-efficient world.</p>
                <h1>Evergreen Producer of Wind Energy</h1>
                <a href="#" class="btn">Get Started</a>
            </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>Meet Our Team Members</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card shadow-sm rounded p-3 text-center">
                    <div class="team-img mb-0">
                        <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid rounded-circle" alt="{{ $team->name }}" style="width: 250px; object-fit: cover;">
                    </div>
                    <div class="team-info">
                        <h4 class="mb-1">{{ $team->name }}</h4>
                        <p class="text-muted mb-2">{{ $team->designation }}</p>
                        <div class="social-links d-flex justify-content-center gap-3">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-6">
                <div class="section-header">
                    <span class="subtitle">Who we are</span>
                    <h2>We're the <span class="highlight-text">Largest Sun Powered</span> Energy Give Company</h2>
                </div>

                <div class="about-content">
                    <p>How might we satisfy the developing need for power while ensuring our environment and make planet a superior spot?</p>
                    <a href="#" class="btn btn-primary-custom mb-0 mb-md-3">READ MORE <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-img">
                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Solar Panels" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>



@endsection