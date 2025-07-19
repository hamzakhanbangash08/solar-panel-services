@extends('layouts.users')
@section('title', 'Payment Successful')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Payment Successful</h1>

        <p class="lead mt-3">
            Thank you <strong>{{ $name }}</strong> for your payment of
            <strong class="text-success">${{ number_format($amount, 2) }}</strong>.
        </p>

        <p class="text-muted">Your order has been placed successfully. A confirmation has been sent to your email.</p>

        <a href="{{ route('products') }}" class="btn btn-success mt-4">Back to Products</a>
    </div>
</div>
@endsection