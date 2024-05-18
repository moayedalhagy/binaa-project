<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// login route route
Route::post('/auth/login', [AuthController::class, 'login']);

// logout route
Route::middleware('auth:sanctum')
    ->post('/auth/logout', [AuthController::class, 'logout']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
