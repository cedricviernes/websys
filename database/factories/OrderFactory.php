<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'total' => $this->faker->randomFloat(2, 100, 1000),
            'status' => 'completed', // or $this->faker->randomElement(['pending', 'completed', 'cancelled'])
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
