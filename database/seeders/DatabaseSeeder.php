<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     //UserSeeder::class,
        //     //CategoriesSeeder::class,
        //     ProdutcsSeeder::class
        // ]);

        User::factory(5)->create();
        
        $this->call(CategoriesSeeder::class);

        $this->call(ProductsSeeder::class);
    }
}
