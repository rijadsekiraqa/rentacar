<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Brand extends Eloquent
{

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    
}