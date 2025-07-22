<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Team;
use App\Models\User;
use App\Models\Panel;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $panels = Panel::count();
            $users = User::count();
            $readings = Reading::count();
            $totalEnergy = Reading::sum('energy_kwh');
            $recentReadings = Reading::latest()->take(5)->get();
            $createpanel = Panel::first(); // just one panel


            $energyData = Reading::select(
                DB::raw('DATE(reading_date) as date'),
                DB::raw('SUM(energy_kwh) as total_energy')
            )
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $dates = $energyData->pluck('date');
            $energyValues = $energyData->pluck('total_energy');


            return view('admin.dashboard', compact('panels', 'users', 'readings', 'recentReadings', 'dates', 'energyValues', 'createpanel'));
        }
    }


    function complainBox()
    {
        $complain = Contact::all();
        return view('admin.complain', compact('complain'));
    }


    function Orders()
    {
        $orders = Order::with(['user', 'items'])->get();

        return view('admin.order', compact('orders'));
    }

    function totalUser()
    {
        // Skip users with ID 1, 2, and 3
        $totaluser = User::where('id', '>', 4)->get();

        return view('admin.user', compact('totaluser'));
    }
}
