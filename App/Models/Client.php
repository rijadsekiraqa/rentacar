<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Eloquent
{

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


}