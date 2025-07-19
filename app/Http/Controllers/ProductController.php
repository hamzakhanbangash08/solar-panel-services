<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Logic to retrieve and display products

        $product = Panel::all(); // Assuming you have a Panel model for products}
        return view('pages.product', compact('product'));
    }
}
