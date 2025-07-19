@extends('layouts.users')
@section('title', 'My Cart')


@section('pageTitle')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-3">
                <h4>Cart Item</h4>
                <a href="{{ route('products') }}" class="text-decoration-none addtocart  rounded px-3 ">Back to Product</a>
            </div>

        </div>
    </div>
</div>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($cartItems->count())
            <table class="table table-bordered" id="cart-table">
                <thead>
                    <tr>
                        <th>Panel</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cartItems as $item)
                    @php $itemTotal = $item->quantity * $item->panel->price; $grandTotal += $itemTotal; @endphp
                    <tr data-id="{{ $item->id }}">
                        <td>{{ $item->panel->name }}</td>
                        <td>
                            <input type="number" class="form-control form-control-sm quantity-input"
                                value="{{ $item->quantity }}" min="1" style="width: 70px;">
                        </td>
                        <td>${{ number_format($item->panel->price, 2) }}</td>
                        <td class="item-total">${{ number_format($itemTotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <form action="{{ route('checkout.page') }}" method="POST">
                                @csrf
                                <button class="btn addtocart">Proceed to Checkout</button>
                            </form>
                        </th>
                        <th colspan="3" class="text-end">Grand Total:</th>
                        <th colspan="2" id="grand-total">${{ number_format($grandTotal, 2) }}</th>
                    </tr>
                </tfoot>
            </table>
            @else
            <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartTable = document.getElementById('cart-table');

        cartTable.addEventListener('input', function(e) {
            if (e.target.classList.contains('quantity-input')) {
                const row = e.target.closest('tr');
                const cartId = row.dataset.id;
                const quantity = parseInt(e.target.value);
                if (quantity < 1) return;

                // Send update to server
                fetch(`/cart/update/${cartId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Update totals
                        row.querySelector('.item-total').textContent = `$${data.item_total.toFixed(2)}`;
                        document.getElementById('grand-total').textContent = `$${data.grand_total.toFixed(2)}`;
                    });
            }
        });
    });
</script>
@endsection