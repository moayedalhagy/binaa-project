<?php

use App\Http\Controllers\ExceptionMessagesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('levels', LevelController::class);

Route::apiResource('users', UserController::class);

Route::get('roles', RolesController::class);

Route::get('exceptions-messages', ExceptionMessagesController::class);
