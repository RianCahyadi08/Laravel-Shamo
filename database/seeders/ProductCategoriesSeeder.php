<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class ProductCategoriesSeeder extends Seeder
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
            ProductCategory::create([
                'name' => 'Categori ' . $i,
            ]);
        }
    }
}
