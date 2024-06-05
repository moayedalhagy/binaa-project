<?php

namespace App\Http\Controllers;


use App\Http\Requests\ReceiveAnswersRequest;
use App\Services\HandleAnswersService;

class HandleAnswersController extends Controller
{

    public function __invoke(ReceiveAnswersRequest $request)
    {
        (new HandleAnswersService($request->validated()))->handler();

        return $this->successJson();
    }
}
