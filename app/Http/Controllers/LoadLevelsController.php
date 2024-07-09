<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoadLevelsResource;
use App\Http\Resources\WrapCollection;
use Illuminate\Http\Request;

class LoadLevelsController extends Controller
{

    public function __invoke(Request $request)
    {
        $levelService = new \App\Services\LevelService();

        return new WrapCollection($levelService->LoadLevels(), LoadLevelsResource::class);
    }
}
