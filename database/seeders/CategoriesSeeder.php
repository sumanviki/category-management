<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Category 1',
            'description' => 'Main Category 1',
            'order' => 1,
        ]);

        $category2 = Category::create([
            'name' => 'Category 2',
            'description' => 'Main Category 2',
            'order' => 2,
        ]);

        // Subcategories for Category 1
        Category::create([
            'name' => 'Category 1-1',
            'description' => 'Subcategory of Category 1',
            'parent_id' => $category1->id,
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Category 1-2',
            'description' => 'Subcategory of Category 1',
            'parent_id' => $category1->id,
            'order' => 2,
        ]);

        // Subcategories for Category 2
        Category::create([
            'name' => 'Category 2-1',
            'description' => 'Subcategory of Category 2',
            'parent_id' => $category2->id,
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Category 2-2',
            'description' => 'Subcategory of Category 2',
            'parent_id' => $category2->id,
            'order' => 2,
        ]);

        // Add some nested subcategories
        $category11 = Category::where('name', 'Category 1-1')->first();
        Category::create([
            'name' => 'Category 1-1-1',
            'description' => 'Nested subcategory',
            'parent_id' => $category11->id,
            'order' => 1,
        ]);
    }
}