<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Require authentication.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard view.
     */
    public function index()
    {
        return view('pages.home');
    }
}
