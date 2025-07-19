<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    //

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->with('items.panel')->latest()->get();
        return view('checkout.place', compact('orders'));
    }


    public function downloadInvoice(Order $order)
    {
        $pdf = Pdf::loadView('invoices.show', compact('order'));
        return $pdf->download("invoice_{$order->id}.pdf");
    }
}
