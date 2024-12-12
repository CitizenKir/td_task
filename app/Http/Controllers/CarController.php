<?php

namespace App\Http\Controllers;

use App\DTO\CarDTO;
use App\Models\Car\Car;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    public function all(): JsonResponse
    {
        $cars = Car::all();
        $carsData = $cars->map(function ($car) {
            return CarDTO::fromModel($car);
        });

        return response()->json($carsData);
    }

    public function show($id): JsonResponse
    {
        $car = Car::findOrFail($id);

        return response()->json(CarDTO::fromModelFull($car));
    }
}
