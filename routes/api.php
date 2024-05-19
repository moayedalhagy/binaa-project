<?php


use App\Http\Controllers\AuthController;
use App\Services\ExceptionService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// logout route
Route::post('/auth/logout', [AuthController::class, 'logout']);



Route::get('/me', function (Request $request) {


    ExceptionService::unauthorizedAction();

    return $request->user();
});
