<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


//modify the forcejson middleware if you want to use web



Route::get('/', function () {


    return response()->json(status: 204);
});
