<?php

namespace Database\Factories\Credit;

use App\Models\Car\CarModel;
use App\Models\Credit\CreditProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CreditProgram>
 */
class CreditProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word,
            "percent" => $this->faker->randomFloat(1, 0, 99)
        ];
    }
}
