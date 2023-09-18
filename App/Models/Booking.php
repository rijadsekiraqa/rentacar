<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Booking extends Eloquent
{

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}