<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\Team;
use App\Models\Panel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function homepage()
    {
        $services = Panel::all();

        $teams = Team::all();
        // return $services;
        return view('pages.home', compact('services', 'teams'));
    }

    function servicepage()
    {
        $services = Panel::all();
        $faqs = Faqs::all();
        return view('pages.services', compact('services', 'faqs'));
    }

    function aboutpage()
    {
        return view('pages.about');
    }


    function contactpage()
    {
        return view('pages.contact');
    }
}
