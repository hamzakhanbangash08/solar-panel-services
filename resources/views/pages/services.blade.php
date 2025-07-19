@extends('layouts.users')

@section('title', 'Service Page')

@section('styles')
<!-- AOS for animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    .service-img {
        height: 250px;
        object-fit: cover;
        border-radius: 0.5rem;
        transition: transform 0.3s ease-in-out;
    }

    .service-img:hover {
        transform: scale(1.03);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 0.5rem;
        font-size: 1.2rem;
        font-weight: 600;
        text-align: center;
        padding: 10px;
    }

    .card:hover .overlay {
        opacity: 1;
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }


    /* testimonial */
    .testimonial-box {
        background: #f8f9fa;
        border-left: 4px solid #0d6efd;
        min-height: 180px;
        transition: transform 0.3s ease-in-out;
        border-radius: 0.5rem;
    }

    .testimonial-box:hover {
        transform: scale(1.02);
    }


    /* accordian */
    .accordion-button {
        background-color: #f8f9fa;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .accordion-button:not(.collapsed) {
        background-color: #ffa500;
        color: #fff;
        transform: scale(1.01);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .accordion-body {
        background-color: #fff;
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('pageTitle')
<div class="text-center my-5">
    <h1 class="fw-bold textcolor display-5 mb-0">Our Solar Services</h1>

    <div class="mx-auto mt-3 addtocart" style="width: 80px; height: 4px;  border-radius: 10px;"></div>
</div>
@endsection
@section('content')
<div class="container py-5">

    {{-- Optional: Search bar --}}
    {{--
    <form method="GET" action="" class="mb-4 text-center">
        <input type="text" name="search" class="form-control w-50 mx-auto" placeholder="Search services...">
    </form>
    --}}

    <div class="row">
        @forelse($services as $service)
        <div class="col-md-4 col-sm-6 mb-4" data-aos="zoom-in">
            <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" class="card-img-top service-img">
                <div class="overlay">{{ $service->name }}</div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p>No services found.</p>
        </div>
        @endforelse
    </div>

    {{-- Optional CTA --}}
    <div class="text-center mt-5">
        <h5 class="fw-semibold">Want a custom solar solution?</h5>
        <a href="" class="btn btn-success mt-2">Contact Us</a>
    </div>
</div>

{{-- Back to Top Button --}}
<a href="#" class="btn btn-primary rounded-circle back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>


<div class="container mt-5">
    <h4 class="text-center mb-4">Frequently Asked Questions</h4>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="accordion mt-5 mx-auto" id="faqAccordion">
                @foreach($faqs as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                            aria-controls="collapse{{ $index }}">
                            <i class="bi bi-question-circle me-2 text-primary"></i> {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<!-- testimonial -->
<div class="container mt-5">
    <h4 class="text-center mb-4">What Our Clients Say</h4>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100 p-4 testimonial-box">
                <p class="fst-italic">"Excellent service, reduced my energy bills by 40%!"</p>
                <footer class="blockquote-footer mt-3">John Doe</footer>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100 p-4 testimonial-box">
                <p class="fst-italic">"Professional and timely installation. Highly recommend!"</p>
                <footer class="blockquote-footer mt-3">Jane Smith</footer>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<!-- AOS script -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection