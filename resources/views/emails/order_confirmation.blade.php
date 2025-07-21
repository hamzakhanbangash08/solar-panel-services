<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- Email Card -->
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 5px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #ffa500; padding: 20px;">
                            <img src="{{ asset('asset/images/solarlogo.png') }}" alt="Company Logo" width="120" style="display: block; margin-bottom: 10px;">
                            <h1 style="color: #ffffff; font-size: 22px; margin: 0;">{{ config('app.name') }}</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333333;">

                            <p style="font-size: 16px;">Hi <strong>{{ $order->user->name }}</strong>,</p>

                            <p style="font-size: 15px; color: #555555;">
                                Thanks for your purchase! Your order <strong>#{{ $order->id }}</strong> has been received.
                            </p>

                            <h3 style="border-bottom: 1px solid #eee; padding-bottom: 5px; font-size: 18px; margin-top: 30px;">Order Summary</h3>

                            <ul style="list-style: none; padding: 0; font-size: 15px;">
                                @foreach($order->items as $item)
                                <li style="padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                    {{ $item->panel->name }} x {{ $item->quantity }}
                                    <span style="float: right;">${{ $item->price }}</span>
                                </li>
                                @endforeach
                            </ul>

                            <p style="font-size: 16px; font-weight: bold; margin-top: 20px;">
                                Total: ${{ $order->total }}
                            </p>

                            <!-- Optional: Billing / Shipping -->
                            <h3 style="font-size: 16px; margin-top: 30px;">Shipping Address</h3>
                            <p style="font-size: 14px; color: #555;">
                                {{ $order->user->name }}<br>
                                {{ $order->user->address ?? '123 Main Street, YourCity, YourCountry' }}<br>
                                {{ $order->user->email }}
                            </p>

                            <!-- CTA Button -->
                            <p style="margin: 30px 0;">
                                <a href="{{ route('order.invoice', $order->id) }}"
                                    style="background-color: #ffa500; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-size: 16px;">
                                    Track Your Order
                                </a>
                            </p>

                            <p style="font-size: 14px; color: #777;">
                                If you have any questions, just reply to this email. We're always happy to help.
                            </p>

                            <p style="font-size: 14px; color: #555;">
                                – The {{ config('app.name') }} Team
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f8f8f8; padding: 20px; font-size: 12px; color: #888;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>