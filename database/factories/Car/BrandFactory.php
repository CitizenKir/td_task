<?php

namespace Database\Factories\Car;

use App\Models\Car\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

    private static $brandNames = [
        "BMW",
        "Mercedes-Benz",
        "Lada",
        "Volkswagen",
        "Audi"
    ];
    public function definition(): array
    {
        return [
            "name" => $this->faker->unique()->randomElement(self::$brandNames)
        ];
    }
}
