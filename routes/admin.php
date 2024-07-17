<?php

use App\Enums\Days;
use Illuminate\Support\Facades\Route;


Route::apiResource('levels', App\Http\Controllers\LevelController::class);


Route::prefix('levels/{id}')
    ->controller(App\Http\Controllers\LevelController::class)
    ->group(function () {

        Route::post('versions', 'storeVersion');
        Route::get('versions', 'getVersions');
        Route::get('versions/{version_id}/questions', 'getVersionQuestions');

        Route::post('/publish', 'publishLevel');
    });


Route::apiResource('users', App\Http\Controllers\UserController::class);


Route::apiResource('questions', App\Http\Controllers\QuestionController::class);


Route::prefix('questions/{id}')
    ->controller(App\Http\Controllers\QuestionController::class)
    ->group(function () {

        Route::get('options', 'getOptions');
        Route::post('options', 'createOption');
        Route::put('options/{option_id}', 'updateOption');
    });


Route::get('roles', App\Http\Controllers\RolesController::class);

Route::get('statistics', \App\Http\Controllers\StatisticsController::class);


// Route::get('/test', function () {
// });

Route::get('/levels-users-count', \App\Http\Controllers\LevelUsersCount::class);
