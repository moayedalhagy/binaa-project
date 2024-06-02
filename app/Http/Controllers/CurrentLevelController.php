<?php

namespace App\Http\Controllers;

use App\Services\UtilityService;
use Illuminate\Http\Request;

class CurrentLevelController extends Controller
{

    public function __invoke(Request $request)
    {
        return $this->successJson(UtilityService::userCurrentLevel(auth()->user()));
    }
}
