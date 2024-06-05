<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CurrentLevelController;
use App\Http\Controllers\CurrentLevelQuestionsController;
use App\Http\Controllers\HandleAnswersController;

use Illuminate\Support\Facades\Route;


// logout route
Route::post('/auth/logout', [AuthController::class, 'logout']);



Route::get('/me', MyAccountController::class);


Route::post('/change-password', ChangePasswordController::class);

Route::get('/current-level', CurrentLevelController::class);
Route::get('/current-level/questions', CurrentLevelQuestionsController::class);

Route::post('/answers', HandleAnswersController::class);
