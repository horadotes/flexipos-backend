<?php

use App\Http\Controllers\Api\Admin\EmployeeController;
use App\Http\Controllers\Api\Employee\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'employees' => EmployeeController::class,
    ]);

    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'unauthenticate']);
    });
});
