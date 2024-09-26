<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CustomerProfile;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //CustomerProfile::factory(10)->create();


        Brand::factory(10)->create();

        Category::factory(10)->create();

        $this->call(ProductSeeder::class);

        ProductDetail::factory(20)->create();

        ProductReview::factory(40)->create();

        
    }
}
