<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class CurrentLevelQuestionsController extends Controller
{

    public function __invoke(Request $request)
    {
        $resources = UtilityService::levelQuestions(auth()->user(), onlyPublished: true);

        return $this->successJson(QuestionResource::collection($resources)->groupBy('day'));
    }
}
