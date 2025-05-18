<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_brand' => $this->faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Acer']),
            'computer_model' => $this->faker->unique()->bothify('Model-###??'),
            'computer_price' => $this->faker->randomFloat(2, 1000, 5000),
            'computer_ram_size' => $this->faker->optional()->randomElement([8, 16, 32]),
            'computer_is_laptop' => $this->faker->boolean(70),
            'fk_category_computer' => Category::factory(),
        ];
    }
}
