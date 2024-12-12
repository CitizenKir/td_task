<?php

namespace Database\Factories\Car;

use App\Models\Car\Brand;
use App\Models\Car\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CarModel>
 */
class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    public function definition(): array
    {
        return [
            "brand_id" => Brand::factory(),
            "name" => $this->faker->word()
        ];
    }
}
