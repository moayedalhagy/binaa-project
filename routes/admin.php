<?php

use App\Enums\Days;
use App\Models\Version;
use App\Services\LevelService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;

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



Route::controller(\App\Http\Controllers\StatisticsController::class)->group(function () {

    Route::get('users-status', 'usersStatus');

    // uncompleted
    Route::get('/levels-users-count', 'levelUsersCount');

    Route::get('/level-success-rate/{id}', 'versionsSuccessRate');
});
