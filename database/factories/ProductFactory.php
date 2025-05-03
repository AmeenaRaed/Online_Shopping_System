<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */


use App\Models\Product;


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->randomElement(['Shoes', 'T-Shirt', 'ring', 'Watch', 'Bag']),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 300),  // Random price between $10 and $300
            'stock_quantity' => $this->faker->numberBetween(1, 100),  // Random stock between 1 and 100
            'supplier_id' => \App\Models\Supplier::all()->random()->id,  // Assign random supplier from existing suppliers
            'image_url' => null,
        ];
    }
}


