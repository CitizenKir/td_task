<?php

namespace Database\Factories\Car;

use App\Models\Car\Car;
use App\Models\Car\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            "car_model_id" => CarModel::factory(),
            "photo" => $this->faker->filePath(),
            "price" => $this->faker->randomFloat(2, 1000000, 10000000)
        ];
    }
}
