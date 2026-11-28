<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $coffee = Category::where('name', 'Coffee')->first();
        $nonCoffee = Category::where('name', 'Non-Coffee')->first();
        $food = Category::where('name', 'Food')->first();

        $products = [
            [
                'category_id' => $coffee->id,
                'name' => 'Americano',
                'price' => 18000,
                'stock' => 20,
                'description' => 'Espresso dengan tambahan air.',
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Cafe Latte',
                'price' => 22000,
                'stock' => 20,
                'description' => 'Espresso dengan susu steamed.',
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Cappuccino',
                'price' => 22000,
                'stock' => 20,
                'description' => 'Espresso, susu, dan foam.',
            ],
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Matcha Latte',
                'price' => 23000,
                'stock' => 15,
                'description' => 'Matcha dengan susu.',
            ],
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Chocolate',
                'price' => 20000,
                'stock' => 15,
                'description' => 'Minuman cokelat dengan susu.',
            ],
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Red Velvet',
                'price' => 22000,
                'stock' => 15,
                'description' => 'Minuman red velvet creamy.',
            ],
            [
                'category_id' => $food->id,
                'name' => 'French Fries',
                'price' => 18000,
                'stock' => 15,
                'description' => 'Kentang goreng renyah.',
            ],
            [
                'category_id' => $food->id,
                'name' => 'Chicken Sandwich',
                'price' => 25000,
                'stock' => 10,
                'description' => 'Sandwich dengan isian ayam.',
            ],
            [
                'category_id' => $food->id,
                'name' => 'Croissant',
                'price' => 20000,
                'stock' => 10,
                'description' => 'Pastry dengan tekstur renyah.',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}