<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices and gadgets'],
            ['name' => 'Clothing', 'description' => 'Men and Women Apparel'],
            ['name' => 'Books', 'description' => 'Educational and Entertainment'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}

