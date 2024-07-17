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
                'type' => 'personnel_transport',
                'license_plate' => 'B 1234 ABC',
                'is_company_owned' => true,
                'service_schedule' => '2024-07-16 14:12:36',
                'location' => 'Jakarta',
            ];

        \App\Models\Vehicle::create($data);
    }
}
