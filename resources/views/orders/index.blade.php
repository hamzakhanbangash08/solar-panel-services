@extends('layouts.users')
@section('title', 'My Orders')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center fw-bold text-primary">📦 My Orders</h2>

    @forelse($orders as $order)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-0 rounded-top-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <strong>Order #{{ $order->id }}</strong>
                    </h5>
                    <small class="text-muted">Placed on {{ $order->created_at->format('M d, Y') }}</small>
                </div>
                <span class="badge px-3 py-2 fs-6 text-capitalize
                    @if($order->status === 'completed') bg-success 
                    @elseif($order->status === 'pending') bg-warning text-dark 
                    @else bg-secondary @endif">
                    {{ $order->status }}
                </span>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Panel</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->panel->name }}</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-end">${{ number_format($item->price, 2) }}</td>
                            <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-light rounded-bottom-4 text-end py-3">
                <h5 class="mb-0">Total: <strong class="text-primary">${{ number_format($order->total, 2) }}</strong></h5>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center p-4 rounded-3">
            <h5>No Orders Found</h5>
            <p class="mb-0">You haven't placed any orders yet. Start shopping now!</p>
        </div>
    @endforelse
</div>
@endsection
