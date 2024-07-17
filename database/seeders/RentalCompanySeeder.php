<?php

namespace Database\Seeders;

use App\Models\rental_company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        rental_company::create([
            'name' => 'PT Rental Jaya',
            'address' => 'Jl. Raya',
            'phone_number' => '08123456789',
            'email' => 'rentaljaya@gmail.com',
        ]);
    }
}
