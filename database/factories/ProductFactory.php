<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->unique()->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->optional()->paragraph(),
            'price' => $this->faker->randomNumber(5),
            'stock' => $this->faker->numberBetween(1, 50),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'image' => $this->faker->imageUrl(640, 480),
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
        ];
    }
}
