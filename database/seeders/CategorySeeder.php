<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Women Clothes', 'description' => 'Fashion for women', 'image_url' => '/storage/categories/women.jpg'],
            ['name' => 'Men Clothes', 'description' => 'Fashion for men', 'image_url' => '/storage/categories/men.jpg'],
            ['name' => 'Bags', 'description' => 'Stylish bags', 'image_url' => '/storage/categories/bags.jpg'],
            ['name' => 'Accessories', 'description' => 'Trendy accessories', 'image_url' => '/storage/categories/accessories.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

