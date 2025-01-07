<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 123123123,
            'phone' => '01000000000',
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'support@gmail.com',
            'password' => 123123123,
            'phone' => '01000000001',
        ]);

    }
}
