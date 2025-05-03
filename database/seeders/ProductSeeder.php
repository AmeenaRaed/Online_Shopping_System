<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

use App\Models\Supplier;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        
        $suppliers = Supplier::all();


        Product::factory()->count(20)->make()->each(function ($product) use ($suppliers) {
            $product->supplier_id = $suppliers->random()->id;
            $product->save();
        });
    }
}


