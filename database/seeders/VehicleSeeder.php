<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [

                'name' => 'Avanza',
                'type' => 'car',
                'license_plate' => 'B 1234 ABC',
                'price' => 200000,
                'status' => 'available'

            ];

        \App\Models\Vehicle::create($data);
    }
}
