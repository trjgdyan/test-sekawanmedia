<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Vehicle;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }
}
