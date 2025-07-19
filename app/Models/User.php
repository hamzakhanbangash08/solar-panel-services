<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Correct parent class
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guarded = [];

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'profile_image',
        'phone',
        'address',
        'city',
    ];

    /**
     * Hidden attributes for arrays
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function panels()
    {
        return $this->hasMany(Panel::class);
    }


    function carts()
    {
        return $this->hasMany(Cart::class);
    }


    function order()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }
}
