<?php

namespace Database\Seeders;

use App\Models\Car\Car;
use App\Models\Credit\CreditProgram;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Car::factory()->count(5)->create();
        CreditProgram::factory()->count(5)->create();
    }
}
