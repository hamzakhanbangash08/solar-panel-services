<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Panel;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->id();

        // Mark all unseen items as viewed
        Cart::where('user_id', $userId)
            ->where('viewed', false)
            ->update(['viewed' => true]);

        $cartItems = Cart::with('panel')
            ->where('user_id', $userId)
            ->get();

        return view('cart.index', compact('cartItems'));
    }


    public function add(Request $request, $id)
    {
        $panel = Panel::findOrFail($id);

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('panel_id', $panel->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'panel_id' => $panel->id,
                'quantity' => 1,
                'viewed' => false,
            ]);
        }

        return redirect()->route('products')->with('success', 'Product added to cart.');
    }

    public function remove($id)
    {
        Cart::where('user_id', auth()->id())->where('id', $id)->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed.');
    }


    // quantity upadte dynamically
    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->quantity = $request->quantity;
        $cart->save();

        // Recalculate totals
        $itemTotal = $cart->quantity * $cart->panel->price;
        $grandTotal = Cart::where('user_id', auth()->id())->get()->sum(function ($item) {
            return $item->quantity * $item->panel->price;
        });

        return response()->json([
            'item_total' => $itemTotal,
            'grand_total' => $grandTotal,
        ]);
    }






    // 
    public function checkoutPage()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('panel')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(fn($item) => $item->quantity * $item->panel->price);

        return view('cart.checkout', compact('cartItems', 'total'));
    }


    // placeorder
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cod,online',
        ]);

        $cartItems = Cart::where('user_id', auth()->id())->with('panel')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(fn($item) => $item->quantity * $item->panel->price);

        if ($request->payment_method === 'online') {
            session([
                'checkout_total' => $total,
                'checkout_user_id' => auth()->id(),
            ]);

            return redirect()->route('stripe.checkout');
        }

        // COD processing
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'panel_id' => $item->panel_id,
                'quantity' => $item->quantity,
                'price' => $item->panel->price,
            ]);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('checkout.place')->with('success', 'Order placed using COD');
    }



    // stripe
    public function stripeCheckout()
    {
        if (!session('checkout_total')) {
            return redirect()->route('cart.index')->with('error', 'Session expired.');
        }

        $total = session('checkout_total');
        return view('cart.stripe_checkout', compact('total'));
    }



    // 
    public function createIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $total = session('checkout_total') ?? 0;

        try {
            $intent = PaymentIntent::create([
                'amount' => $total * 100,
                'currency' => 'usd',
                'automatic_payment_methods' => ['enabled' => true],
            ]);

            return response()->json(['clientSecret' => $intent->client_secret]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    //


    public function stripeCharge(Request $request)
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('panel')->get();
        $total = session('checkout_total');

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'paid',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'panel_id' => $item->panel_id,
                'quantity' => $item->quantity,
                'price' => $item->panel->price,
            ]);
        }

        // After order is created
        Mail::to(auth()->user()->email)->send(new OrderConfirmationMail($order));

        Cart::where('user_id', auth()->id())->delete();

        return response()->json([
            'success' => true,
            'redirect_url' => route('payment.success', ['order' => $order->id])
        ]);
    }
}
