<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'university' => 'الجامعة الاسلامية',
            'national_id' => '408724937',
            'university_id' => '',
            'phone_number' => '591234567',
            'address' => 'غزة',
            'department' => 'هندسة البرمجيات',
            'role' => 'خريج',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);
          User::create([
            'name' => 'أروى',
            'email' => 'arwa@example.com',
            'password' => Hash::make('123456'),
            'university' => 'الجامعة الاسلامية',
            'national_id' => '',
            'university_id' => '12345',
            'phone_number' => '591234560',
            'address' => 'غزة',
            'department' => 'هندسة البرمجيات',
            'role' => 'طالب',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);
    }
}
