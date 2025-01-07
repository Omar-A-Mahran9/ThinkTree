<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            ['name_ar' => 'خاتم', 'name_en' => 'Ring'],
            ['name_ar' => 'حلق', 'name_en' => 'Earring'],
            ['name_ar' => 'سوارة', 'name_en' => 'Bracelet'],
            ['name_ar' => 'عقد', 'name_en' => 'Necklace'],
            ['name_ar' => 'غوايش', 'name_en' => 'Bangles'],
            ['name_ar' => 'طقم', 'name_en' => 'Set'],
            ['name_ar' => 'نصف طقم', 'name_en' => 'Half Set'],
            ['name_ar' => 'شوكر', 'name_en' => 'Choker'],
            ['name_ar' => 'خلخال', 'name_en' => 'Anklet'],
            ['name_ar' => 'زمام', 'name_en' => 'Nose Ring'],
            ['name_ar' => 'كف', 'name_en' => 'Hand Piece'],
            ['name_ar' => 'دبلة', 'name_en' => 'Wedding Ring'],
            ['name_ar' => 'تونز', 'name_en' => 'Toonz'],
            ['name_ar' => 'بروش', 'name_en' => 'Brooch'],
            ['name_ar' => 'تاج', 'name_en' => 'Crown'],
            ['name_ar' => 'حزام', 'name_en' => 'Belt'],
        ];

        foreach ($subcategories as $subcategory) {
            $categoriesWithParent = Category::select(
                'image',
                'name_ar',
                'name_en',
                'description_ar',
                'description_en',
                'meta_tag_key_words',
                'meta_tag_key_description'
            )
                ->whereNotNull('parent_id')
                ->where('name_ar', $subcategory['name_ar'])
                ->first();
            SubCategory::firstOrCreate(
                ['name_ar' => $subcategory['name_ar']], // Ensure uniqueness
                [
                    'image' => $categoriesWithParent['image'] ?? null,
                    'name_ar' => $subcategory['name_ar'],
                    'name_en' => $categoriesWithParent['name_en'] ?? $subcategory['name_en'],
                    'description_ar' => $categoriesWithParent['description_ar'] ?? $subcategory['name_ar'],
                    'description_en' => $categoriesWithParent['description_en'] ?? $subcategory['name_en'],
                    'meta_tag_key_words' => $categoriesWithParent['meta_tag_key_words'] ?? null,
                    "meta_tag_key_description" => $categoriesWithParent['meta_tag_key_description'] ?? null
                ]
            );
        }
    }
}
