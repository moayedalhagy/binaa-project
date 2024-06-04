<?php

namespace App\Services;

use App\Models\User;
use App\Models\Version;
use App\Services\Utilities\VersionPointsAggregatorService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UtilityService
{

    private static function loadModel(string|User $_model)
    {
        return  $_model instanceof User ? $_model : User::find($_model);
    }


    //TODO: must refactoring code
    public static function userCurrentLevel(string|User $_model)
    {

        $model = self::loadModel($_model);

        $version = self::ensureLevelAssignToUser($model);

        $level = $version->level()->select('label', 'id')->first();

        $summary = (new VersionPointsAggregatorService($version))();

        $percent =  (float)$version->value;

        return [
            'id' => $level->id,
            'label' => $level->label,
            'value' =>  $percent,
            'summary' => $summary,
            'target_calc_way' => sprintf('(%s / 100) * %s', $percent, $summary['questions_points']),
            'target' => ($percent / 100.0) * $summary['questions_points']
        ];
    }


    public static function ensureLevelAssignToUser(string|User $_model): Version
    {
        $model = self::loadModel($_model);

        return $model->version ?? ExceptionService::noLevelAssignToUser();
    }



    public static function levelQuestions(string|User $_model, $onlyPublished = false)
    {

        $model = self::loadModel($_model);

        $version =  $model
            ->version()
            ->when($onlyPublished, function ($query) {
                return $query->where('published', true);
            })->first();

        if ($onlyPublished && !$version) {
            ExceptionService::currentLevelNotPublished();
        }

        return $version
            ->questions()
            ->with('options')
            ->orderBy('day')
            ->orderBy('sort_order')
            ->get();
    }
}
