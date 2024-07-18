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
            'name' => 'Head Office',
            'email' => 'headoffice@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'Approver',
            'role' => 'approver',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Head of Transport Responsibility',
            'email' => 'headtransport@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'Head of Transport Responsibility',
            'role' => 'approver',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'CEO',
            'email' => 'ceo@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'CEO',
            'role' => 'approver',
            'email_verified_at' => now(),
        ]);

    }
}
