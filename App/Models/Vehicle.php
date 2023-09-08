<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}