<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// login route 
Route::post('/auth/login', [AuthController::class, 'login']);


Route::get('exceptions-messages', App\Http\Controllers\ExceptionMessagesController::class);

Route::get('days', App\Http\Controllers\DaysController::class);

Route::get('question-types', App\Http\Controllers\QuestionTypeController::class);
