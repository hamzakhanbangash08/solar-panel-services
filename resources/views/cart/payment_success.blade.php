@extends('layouts.users')
@section('title', __('Payment Successful'))

@section('styles')
<style>
    /* Animation */
    .fade-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.8s ease-out forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Dark mode */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #f1f1f1;
        }

        .bg-light {
            background-color: #1e1e1e !important;
            border-color: #333 !important;
        }

        .btn-outline-secondary {
            color: #f1f1f1;
            border-color: #555;
        }

        .btn-outline-secondary:hover {
            background-color: #444;
        }
    }
</style>
@endsection
@section('content')


<div class="container py-5 fade-up">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">

            <!-- Icon -->
            <div class="mb-4">
                <i class="bi bi-check-circle-fill" style="font-size: 4rem; color: #28a745;"></i>
            </div>

            <!-- Heading -->
            <h2 class="fw-bold text-success">@lang('Payment Successful')</h2>

            <!-- Subtext -->
            <p class="text-muted fs-5 mt-3">
                @lang('Thank you! Your order has been placed successfully. A confirmation email has been sent to your inbox.')
            </p>

            <!-- Order Summary -->
            <div class="bg-light border rounded p-4 my-4 text-start shadow-sm">
                <p class="mb-1"><strong>@lang('Order ID'):</strong> #{{ $order->id }}</p>
                <p class="mb-1"><strong>@lang('Total'):</strong> ${{ $order->total }}</p>
                <p class="mb-0"><strong>@lang('Customer'):</strong> {{ $order->user->name }}</p>
            </div>

            <!-- Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-4">
                <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-success px-4">
                    <i class="bi bi-download me-2"></i> @lang('Download Invoice')
                </a>
                <a href="{{ route('products') }}" class="btn btn-outline-secondary px-4">
                    <i class="bi bi-box-seam me-2"></i> @lang('Back to Products')
                </a>
            </div>

        </div>
    </div>
</div>
@endsection