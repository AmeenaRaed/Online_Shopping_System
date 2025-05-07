<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

use App\Models\Supplier;

use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Sample product data for each category
        $sampleProducts = [
            'Women Clothes' => [
                ['name' => 'Elegant Dress', 'description' => 'Perfect for evening events.', 'image' => 'products/dress.jpg', 'price' => 59.99],
                ['name' => 'Casual Blouse', 'description' => 'Comfortable and stylish.', 'image' => 'products/blouse.jpg', 'price' => 29.99],
            ],
            'Men Clothes' => [
                ['name' => 'Formal Shirt', 'description' => 'Great for office wear.', 'image' => 'products/shirt.jpg', 'price' => 39.99],
                ['name' => 'Denim Jacket', 'description' => 'Classic and rugged.', 'image' => 'products/jacket.jpg', 'price' => 69.99],
            ],
            'Bags' => [
                ['name' => 'Leather Handbag', 'description' => 'Stylish everyday bag.', 'image' => 'products/handbag.jpg', 'price' => 89.99],
                ['name' => 'Backpack', 'description' => 'Perfect for travel.', 'image' => 'products/backpack.jpg', 'price' => 49.99],
            ],
            'Accessories' => [
                ['name' => 'Sunglasses', 'description' => 'UV protected.', 'image' => 'products/sunglasses.jpg', 'price' => 19.99],
                ['name' => 'Bracelet Set', 'description' => 'Modern accessories.', 'image' => 'products/bracelet.jpg', 'price' => 14.99],
            ]
        ];

        // Fetch suppliers and categories
        $suppliers = Supplier::all();
        $categories = Category::all()->keyBy('name');

        // Loop through categories and create products
        foreach ($sampleProducts as $categoryName => $products) {
            foreach ($products as $productData) {
                // Create product
                $product = Product::create([
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'image_url' => '/storage/' . $productData['image'],
                    'stock_quantity' => rand(10, 50),
                    'price' => $productData['price'],
                    'supplier_id' => $suppliers->random()->id,
                ]);

                // Attach the product to its category
                if (isset($categories[$categoryName])) {
                    $product->categories()->attach($categories[$categoryName]->id);
                }
            }
        }
    }
}


