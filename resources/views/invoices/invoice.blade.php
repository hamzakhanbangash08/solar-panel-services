<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans;
        }

        .header {
            margin-bottom: 20px;
        }

        .details th,
        .details td {
            padding: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <h2>Invoice - Order #{{ $order->id }}</h2>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <table width="100%" class="details">
        <thead>
            <tr>
                <th>Panel</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->panel->name ?? 'N/A' }}</td>
                <td>{{ $item->quantity ?? 'N/A' }}</td>
                <td>${{ number_format($item->price, 2) ?? 'N/A' }}</td>
                <td>${{ number_format($item->price * $item->quantity, 2) ?? 'N/A' }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <h3>Total: ${{ number_format($order->total, 2) }}</h3>
</body>

</html>