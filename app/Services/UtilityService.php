<?php

namespace App\Services;

use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
// DB::enableQueryLog();
// DB::disableQueryLog();
// return DB::getQueryLog();
class UtilityService
{

    private static function loadModel(string|User $_model)
    {
        return  $_model instanceof User ? $_model : User::find($_model);
    }


    public static function userCurrentLevel(string|User $_model)
    {
        $model = self::loadModel($_model);

        $version = self::ensureLevelAssignToUser($model);

        $level = $version->level()->select('label', 'id')->first();

        return [
            'id' => $level->id,
            'label' => $level->label,
            'value' => (float)$version->value,
        ];
    }


    public static function ensureLevelAssignToUser(string|User $_model): Version
    {
        $model = self::loadModel($_model);

        return $model->version ?? ExceptionService::noLevelAssignToUser();
    }


    //TODO: maybe we need to check if level is published 
    public static function levelQuestions(string|User $_model)
    {

        $model = self::loadModel($_model);

        return $model
            ->version
            // ->where('published', 0)
            ->questions()
            ->orderBy('day')
            ->orderBy('sort_order')
            ->get();
    }
}
