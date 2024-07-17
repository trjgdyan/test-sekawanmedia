<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;


class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [

                'name' => 'Abudi',
                'address' => 'Jl. Melati',
                'phone_number' => '1234567890',
                'type_of_tenant' => 'personal',
                'vehicle' => 'V123',
                'driver' => 'D456',
                'start_date' => now()->addDays(1),
                'end_date' => now()->addDays(5),
                'status' => 'dipinjam'

            ];

        \App\Models\Reservation::create($data);
    }
}
