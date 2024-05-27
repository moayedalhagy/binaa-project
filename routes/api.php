<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\Level;
use Illuminate\Support\Facades\Route;


// logout route
Route::post('/auth/logout', [AuthController::class, 'logout']);



Route::get('/me', MyAccountController::class);


Route::post('/change-password', ChangePasswordController::class);

Route::get('/level', function () {
    return Level::find(1)->versions;
});
