<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/email/{email}', [UserController::class, 'showUserByEmail']);

// Route::prefix('superadmin')->group(function () {
//     require 'superadmin/authenticated.php';
//     require 'superadmin/unauthenticated.php';
// });

Route::prefix('admin')->group(function () {
    require 'admin/authenticated.php';
    require 'admin/unauthenticated.php';
});

Route::prefix('employee')->group(function () {
    require 'employee/authenticated.php';
    require 'employee/unauthenticated.php';
});
