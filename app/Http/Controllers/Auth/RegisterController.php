<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validation rules
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'date', 'before:today'],
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Create user and assign role
    protected function create(array $data)
    {
        $imagePath = null;

        if (request()->hasFile('profile_image')) {
            $imagePath = request()->file('profile_image')->store('profile_images', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'profile_image' => $imagePath,
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign role
        $user->assignRole('customer'); // Make sure this role exists in DB

        return $user;
    }

    // Redirect after registration
    protected function registered(Request $request, $user)
    {
        auth()->logout(); // Logout the user after register
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
