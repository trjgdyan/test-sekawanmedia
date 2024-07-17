<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rentalCompany()
    {
        return $this->hasMany(rental_company::class, 'id_vehicle');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'id_vehicle');
    }
}
