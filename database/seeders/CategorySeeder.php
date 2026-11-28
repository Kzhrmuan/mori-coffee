<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Coffee',
                'description' => 'Menu minuman berbahan dasar kopi.',
            ],
            [
                'name' => 'Non-Coffee',
                'description' => 'Menu minuman tanpa kopi.',
            ],
            [
                'name' => 'Food',
                'description' => 'Menu makanan Mori Coffee.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}