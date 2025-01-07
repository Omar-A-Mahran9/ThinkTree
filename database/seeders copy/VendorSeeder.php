<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'name' => 'vendor',
            'description_ar' => 'وصف',
            'description_en' => 'description',
            'commercial_register' => 'vendor.png',
            // 'commercial_register_number' => 12345678,
            'address' => '23 saed st giza',
            'logo' => 'logo.png',
            'cover' => 'cover.png',
            'national_id' => 27005052102051,
            // 'national_single_sign_on' => 5465475466,
            'commercial_register_number' => 567484,
            'licensure' => 'vendor.png',
            'email' => 'vendor@gmail.com',
            'password' => 123123123,
            'phone' => '01000000001',
            'approved'=> true
        ]);
    }
}
