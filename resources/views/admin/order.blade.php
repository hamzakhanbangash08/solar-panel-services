@extends('layouts.master') {{-- your admin layout --}}
@section('content')


@section('title')
Orders
@endsection

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->

</nav>
@endsection

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total Items</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($order->items as $item)
                            <li>{{ $item->panel->name ?? 'Product' }} (x{{ $item->quantity ?? 1 }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->items->count() }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection