<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of items you want to insert
        $numberOfItems = 100;

        // Use a loop to create and insert dummy data
        for ($i = 1; $i <= $numberOfItems; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'price' => 10000+$i,
                'description' => 'Lorem ipsum dolor sit amet',
                'tags' => 'tags ' . $i,
                'product_categories_id' => $i
            ]);
        }
    }
}
