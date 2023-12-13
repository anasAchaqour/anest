<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ////////////////////////////////////////////////////////////////////////////////////

        // Call the SupplierFactory to create 5 suppliers
        \App\Models\Supplier::factory(5)->create();

        // Call the CategoryFactory to create 5 categories
         \App\Models\Category::factory(10)->create();

        // Call the ProductFactory to create 20 products (adjust the number based on your needs)
        \App\Models\Product::factory(20)->create();
    }
}
