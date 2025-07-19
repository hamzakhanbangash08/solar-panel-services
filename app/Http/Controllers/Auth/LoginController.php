<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Handle post-login redirection based on role.
     */
    protected function authenticated($request, $user)
    {
        // Check user roles
        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard');
        }

        if ($user->hasRole('customer')) {
            return redirect()->route('homepage'); // Optional
        }

        if ($user->hasRole('sales')) {
            return redirect()->route('sales.dashboard'); // Optional
        }

        // Default: redirect all other roles (customer, guest) to homepage
        return redirect()->route('homepage');
    }

    /**
     * Middleware settings.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
