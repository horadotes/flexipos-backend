<?php

use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Subscription\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/users/email/{email}', [AuthController::class, 'findUserByEmail']);
    Route::post('/register', [AdminController::class, 'store']);
    Route::get('/plans', [PlanController::class, 'getPlans']);
    Route::post('/process-plan', [PlanController::class, 'processPlanSelection']);
    Route::get('/payment-success', [PlanController::class, 'paymentSuccess']);
});
