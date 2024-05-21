<?php


use Illuminate\Support\Facades\Route;


Route::apiResource('levels', App\Http\Controllers\LevelController::class);

Route::apiResource('users', App\Http\Controllers\UserController::class);

Route::apiResource('questions', App\Http\Controllers\QuestionController::class);




Route::get('roles', App\Http\Controllers\RolesController::class);

Route::get('exceptions-messages', App\Http\Controllers\ExceptionMessagesController::class);

Route::get('days', App\Http\Controllers\DaysController::class);

Route::get('question-types', App\Http\Controllers\QuestionTypeController::class);
