<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path("database/data/products.json"));
        $products = json_decode($json, true);

        foreach ($products as $product) {
            Product::create([
                'title' => $product['title'],
                'short_des' => $product['short_des'],
                'price' => $product['price'],
                'image' => $product['image'],
                'discount' => $product['discount'],
                'discount_price' => $product['discount_price'],
                'stock' => $product['stock'],
                'star' => $product['star'],
                'remark' => $product['remark'],
                'category_id' => fake()->numberBetween(1, 10),
                'brand_id' => fake()->numberBetween(1, 10),
            ]);
        }

    }
}
