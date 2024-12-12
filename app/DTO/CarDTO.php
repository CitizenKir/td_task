<?php

namespace App\DTO;

use App\Models\Car\Car;

class CarDTO
{
    public static function fromModel(Car $car)
    {
        return [
            "id" => $car->id,
            "brand" => [
                "id" => $car->brand->id,
                "name" => $car->brand->name
            ],
            "photo" => $car->photo,
            "price" => $car->price
        ];
    }

    public static function fromModelFull(Car $car)
    {
        return [
            "id" => $car->id,
            "brand" => [
                "id" => $car->brand->id,
                "name" => $car->brand->name
            ],
            "model" => [
                "id" => $car->carModel->id,
                "name" => $car->carModel->name,
            ],
            "photo" => $car->photo,
            "price" => $car->price
        ];
    }
}
