@extends('layouts.users')
@section('title', 'Buy Solar')

@section('styles')
<style>
    body {
        background-color: #f4f6f9;
    }

    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: contain;
        /* Make image fully visible */
        height: 250px;
        width: 100%;
        background-color: #fff;
        /* Optional for white padding */
    }

    .card-body {
        background-color: #fff;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .addtocart {
        background-color: var(--primary-color);
        border: none;
        transition: background-color 0.2s;
    }

    .addtocart:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

    h5 {
        font-weight: 600;
    }

    .card-text {
        color: #666;
    }
</style>
@endsection

@section('pageTitle')
<div class="text-center my-5">
    <h1 class="fw-bold textcolor display-5 mb-0">Buy Solar Products</h1>
    <p class="text-muted fs-5 ">Power your home or business with our trusted solar solutions</p>
    <div class="mx-auto mt-3 addtocart" style="width: 80px; height: 4px;  border-radius: 10px;"></div>
</div>
@endsection


@section('content')

<div class="container">
    <div class="row">
        @forelse($product as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title mb-0">{{ $item->name }}</h5>
                    <span class="mb-0">{{ $item->company}}</span>
                    <p class="card-text">{{ Str::limit($item->description, 80) }}</p>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold textcolor mb-3">${{ number_format($item->price, 2) }}</p>
                        <p class="fw-bold textcolor mb-3">capacity:{{ $item->capacity_kw}}</p>
                    </div>

                    <div class="mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                    </div>
                    <form method="POST" action="{{ route('cart.add', $item->id) }}">
                        @csrf
                        <button class="btn addtocart w-100">
                            <i class="bi bi-cart-plus me-2"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <h4>No products found.</h4>
        </div>
        @endforelse
    </div>
</div>
@endsection