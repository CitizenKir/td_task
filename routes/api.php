<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\CreditController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('cars', [CarController::class, 'all']);
    Route::get('cars/{id}', [CarController::class, 'show']);
    Route::get('credit/calculate', [CreditController::class, 'calculate']);
    Route::post('request', [CreditController::class, 'save']);
});
