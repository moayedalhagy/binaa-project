<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// login route 
Route::post('/auth/login', [AuthController::class, 'login']);
