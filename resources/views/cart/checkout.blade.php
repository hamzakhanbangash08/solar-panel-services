@extends('layouts.users')
@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4 text-primary">🧾 Confirm Your Order</h3>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->panel->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->panel->price, 2) }}</td>
                                <td>${{ number_format($item->quantity * $item->panel->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="text-end text-success">Grand Total: ${{ number_format($total, 2) }}</h4>

                <form action="{{ route('checkout.place') }}" method="POST" class="mt-4">
                    @csrf

                    <div class="mb-3">
                        <label for="payment" class="form-label fw-bold">💳 Select Payment Method:</label>
                        <select class="form-select" name="payment_method" id="payment" required>
                            <option value="">-- Choose --</option>
                            <option value="online">Visa Card</option>
                            <option value="online">Master Card</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4 py-2">
                            <i class="bi bi-check-circle me-1"></i> Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection