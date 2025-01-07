<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::makeDirectory(storage_path('app/public/Images/Categories'), 0755, true, true);
        File::copy(public_path('assets/dashboard/Categories/gold-ingots-gold-svgrepo-com.svg'), storage_path('app/public/Images/Categories/gold-ingots-gold-svgrepo-com.svg'));
        File::copy(public_path('assets/dashboard/Categories/silver-ingots-silver-svgrepo-com.svg'), storage_path('app/public/Images/Categories/silver-ingots-silver-svgrepo-com.svg'));
        File::copy(public_path('assets/dashboard/Categories/diamond-ingots-diamond-svgrepo-com.svg'), storage_path('app/public/Images/Categories/diamond-ingots-diamond-svgrepo-com.svg'));
        File::copy(public_path('assets/dashboard/Categories/watches.svg'), storage_path('app/public/Images/Categories/watches.svg'));
        File::copy(public_path('assets/dashboard/Categories/alloy.svg'), storage_path('app/public/Images/Categories/alloy.svg'));

        Category::create([
            'image' => 'gold-ingots-gold-svgrepo-com.svg',
            'name_en' => 'Gold',
            'name_ar' => 'الدهب',
            'description_ar' => 'قسم الدهب',
            'description_en' => 'Gold category',
        ]);

        Category::create([
            'image' => 'silver-ingots-silver-svgrepo-com.svg',
            'name_en' => 'Silver',
            'name_ar' => 'الفضة',
            'description_ar' => 'قسم الفضة',
            'description_en' => 'Silver category',
        ]);

        Category::create([
            'image' => 'diamond-ingots-diamond-svgrepo-com.svg',
            'name_en' => 'Diamond',
            'name_ar' => 'الماس',
            'description_ar' => 'قسم الماس',
            'description_en' => 'Diamond category',
        ]);

        Category::create([
            'image' => 'watches.svg',
            'name_en' => 'Watches',
            'name_ar' => 'الساعات',
            'description_ar' => 'قسم الساعات',
            'description_en' => 'Watches category',
        ]);

        Category::create([
            'image' => 'alloy.svg',
            'name_en' => 'Alloys',
            'name_ar' => 'السبائك',
            'description_ar' => 'قسم السبائك',
            'description_en' => 'Alloys category',
        ]);
    }
}
