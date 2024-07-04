<?php

namespace Database\Seeders;

use App\Facades\User;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::firstOrCreate([
            'email' => 'testuser@inisev.com'
        ],
        [
            'name' => fake()->name(),
            'email' => 'testuser@inisev.com',
            'phone' => fake()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'model' => Customer::class,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
