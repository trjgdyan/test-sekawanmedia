<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yani',
            'email' => 'trjgdyan@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'Yani',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        //admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'Admin',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        //approver
        User::create([
            'name' => 'Approver',
            'email' => 'headoffice@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'Approver',
            'role' => 'approver',
            'email_verified_at' => now(),
        ]);

    }
}
