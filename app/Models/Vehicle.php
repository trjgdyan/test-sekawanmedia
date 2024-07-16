<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vehicle_type',
        'license_plate',
        'is_company_owned',
        'fuel_consumption',
        'service_schedule',
        'location',
    ];
}
