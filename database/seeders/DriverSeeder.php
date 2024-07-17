<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'name' => 'Supir 1',
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Raya',
            'no_hp' => '08123456789',
        ]);
    }
}
