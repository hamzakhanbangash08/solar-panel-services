@extends('layouts.users')

@section('title', 'Home - Solar Panel Services')

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
            <!-- Team Member 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    @foreach ($teams as $team )
                    <div class="team-img">
                        <img src="{{ asset('storage/' . $team->image) }}" class="card-img-top" alt="{{ $team->name }}">
                    </div>
                    <div class="team-info">
                        <h4 class="mb-0">{{ $team->name}}</h4>
                        <p>{{ $team->designation}}</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Team Member 2 -->
            <!-- <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Taylah Toimle">
                    </div>
                    <div class="team-info">
                        <h4>Taylah Toimle</h4>
                        <p>Turbine Engineer</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Team Member 3 -->
            <!-- <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img">
                        <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Jasmine Parrott">
                    </div>
                    <div class="team-info">
                        <h4>Jasmine Parrott</h4>
                        <p>Design Expert</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Team Member 4 -->
            <!-- <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Toby Sampson">
                    </div>
                    <div class="team-info">
                        <h4>Toby Sampson</h4>
                        <p>Solar Engineer</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->
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