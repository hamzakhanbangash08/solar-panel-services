<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
