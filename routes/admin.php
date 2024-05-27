<?php


use Illuminate\Support\Facades\Route;


Route::apiResource('levels', App\Http\Controllers\LevelController::class);


Route::prefix('levels/{id}')
    ->controller(App\Http\Controllers\LevelController::class)
    ->group(function () {

        Route::post('versions', 'storeVersion');
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

Route::get('exceptions-messages', App\Http\Controllers\ExceptionMessagesController::class);

Route::get('days', App\Http\Controllers\DaysController::class);

Route::get('question-types', App\Http\Controllers\QuestionTypeController::class);
