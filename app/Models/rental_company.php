<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental_company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }
}
