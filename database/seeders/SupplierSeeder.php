<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Malak',
            'last_name' => 'Raed',
            'username' => 'Supplier1',
            'email' => 'supplier@example.com',
            'password' => Hash::make('password123'), 
            'dob' => '1999-01-10',
            'phone' => '12345678',
            'role' => 'supplier',
        ]);
        
    }
}

