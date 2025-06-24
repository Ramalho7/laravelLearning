<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str; // preciso para a classe `Str`
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name, 
            'qty' => $this->faker->numberBetween(1, 100), 
            'subdescription' => $this->faker->paragraph(), 
            'mainDescripstion' => $this->faker->text(200), 
            'price' => $this->faker->randomFloat(2, 10, 1000), 
            'slug' => Str::slug($name), 
            'image' => $this->faker->imageUrl(400, 400), 
            'id_user' => User::pluck('id')->random(), 
            'id_category' => Category::pluck('id')->random(), 
        ];
    }
}
