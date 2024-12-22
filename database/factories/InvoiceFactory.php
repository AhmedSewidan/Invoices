<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['paid', 'unpaid', 'canceled']);

        return [
            'User_id' => User::inRandomOrder()->value('id'),
            'invoice_number' => strtoupper(Str::random(3)) . '/' . now()->format('d/m/Y'),
            'due_date' => fake()->dateTimeBetween('now', '+2 year')->format('Y-m-d H:i:s'),
            'invoice_date' => now()->format('Y-m-d H:i:s'),
            'description' => fake()->text(200),
            'discount' => fake()->randomFloat(5, 0, 0.4),
            'tax' => fake()->randomFloat(5, 0, 0.5),
            'amount' => fake()->randomFloat(2, 1, 10000),
            'status' => $status,
            'status_date' => $status != 'unpaid' ? $this->faker->dateTimeBetween('now', '+2 year')->format('Y-m-d H:i:s') : null,
        ];
    }
}
